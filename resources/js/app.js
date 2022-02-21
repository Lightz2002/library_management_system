require("./bootstrap");

import $ from "jQuery";
$.when($.ready).then(function () {
    function showModal(cl) {
        $(cl).removeClass("hidden");
        $(cl).addClass("flex");
    }

    function closeModal(cl) {
        $(cl).addClass("hidden");
    }

    /* Nav Dropdown */
    $(".nav-dropdown").on("click", function (e) {
        $(".dropdown-item").toggleClass("hidden");
    });

    /* Generate Slug */
    $("#title").on("change", function () {
        fetch("/dashboard/books/createSlug?title=" + $("#title").val())
            .then((res) => res.json())
            .then((data) => $("#slug").val(data.slug));
    });

    $(".btn-create-book").on("click", function (e) {
        showModal(".create__modal");
    });

    $(".modal, .modal__btn-close").on("click", function (e) {
        if (!e.target.classList.contains("close")) return;
        closeModal(".create__modal");
        closeModal(".update__modal");
        closeModal(".delete__modal");
    });

    $.ajax("/dashboard/books/create")
        .done(function (res) {
            for (let authors of res.authors) {
                $("#author, .update-book-from #author").append(
                    `<option value='${authors.id}'>${authors.firstname}</option>`
                );
            }

            for (let publishers of res.publishers) {
                $("#publisher , .update-book-from #publisher").append(
                    `<option value='${publishers.id}'>${publishers.name}</option>`
                );
            }
        })
        .fail(function (res) {
            alert(res);
        });

    $(".create-book-form").on("submit", function (e) {
        e.preventDefault();

        let fd = new FormData();

        fd.append("cover", $("#cover")[0].files[0]);
        fd.append("title", $("#title").val());
        fd.append("author", $("#author").val());
        fd.append("publisher", $("#publisher").val());
        fd.append("pages", $("#pages").val());
        fd.append("publish_year", $("#publish_year").val());
        fd.append("slug", $("#slug").val());

        $.ajax({
            url: "/dashboard/books",
            method: "POST",
            data: fd,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })
            .done(function (res) {
                if (res.status === 200) {
                    $(".modal").addClass("hidden");

                    $(".btn-create-book").before(`
                    <div class="alert bg-green-100 text-green-600 font-bold px-4 py-2 mb-4">
                        ${res.message}
                    </div>
                    `);

                    $(".form")[0].reset();

                    setTimeout(() => {
                        $(".alert").remove();
                    }, 3000);
                }
            })
            .fail(function (res) {
                if (res.status === 422) {
                    $("small.text-red-600").remove();
                    $("input.border-red-500").removeClass("border-red-500");

                    let { errors } = res.responseJSON;

                    for (let error in errors) {
                        errors[error].forEach((message) => {
                            $(`input[name=${error}]`).addClass(
                                "border-red-500"
                            );

                            $(`input[name=${error}]`).after(
                                `<small class="text-red-600">${message}</small>`
                            );
                        });
                    }
                }
            });
    });

    $(".btn-delete-book").on("click", function (e) {
        e.preventDefault();
        showModal(".delete__modal");
        let btnDelete = e.currentTarget;

        $(".btn-cancel").on("click", function () {
            closeModal(".delete__modal");
        });

        $(".delete-book-form").on("submit", function (e) {
            e.preventDefault();

            let slug = btnDelete.dataset.slug;

            $.ajax({
                url: `/dashboard/books/${slug}`,
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            })
                .done(function (res) {
                    if (res.status === 200) {
                        $(".btn-create-book").before(`
                        <div class="alert bg-green-100 text-green-600 font-bold px-4 py-2 mb-4">
                            ${res.message}
                        </div>
                        `);

                        closeModal(".delete__modal");

                        btnDelete.closest("tr").remove();
                    }
                })
                .fail(function (data) {
                    console.log(data);
                });
        });
    });

    $(".btn-update-book").on("click", function (e) {
        e.preventDefault();

        let slug = e.currentTarget.dataset.slug;

        showModal(".update__modal");

        $.ajax({
            url: `/dashboard/books/${slug}/edit`,
            method: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })
            .done(function (res) {
                if (res.status === 200) {
                    $(".update-book-form #title").val(res.book.title);
                    $(".update-book-form #slug").val(res.book.slug);
                    $(".update-book-form #pages").val(res.book.pages);
                    $(".update-book-form #publish_year").val(
                        res.book.publish_year
                    );

                    $(`.update-book-form #publisher`).val(
                        res.book.publisher_id
                    );

                    $(".update-book-form #author").val(res.book.author_id);
                }
            })
            .fail(function (res) {
                console.log(res);
            });

        /* Submit update book form */
        $(".update-book-form").on("submit", function (e) {
            e.preventDefault();

            let fd = new FormData(this);

            fd.append("cover", $(".update-book-form #cover")[0].files[0]);
            fd.append("title", $(".update-book-form #title").val());
            fd.append("author", $(".update-book-form #author").val());
            fd.append("publisher", $(".update-book-form #publisher").val());
            fd.append("pages", $(".update-book-form #pages").val());
            fd.append(
                "publish_year",
                $(".update-book-form #publish_year").val()
            );
            fd.append("slug", $(".update-book-form #slug").val());

            $.ajax({
                url: `/dashboard/books/${slug}`,
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            })
                .done(function (res) {
                    if (res.status === 200) {
                        $(".modal").addClass("hidden");

                        $(".btn-create-book").before(`
                        <div class="alert bg-green-100 text-green-600 font-bold px-4 py-2 mb-4">
                            ${res.message}
                        </div>
                        `);

                        $(".form")[0].reset();

                        setTimeout(() => {
                            $(".alert").remove();
                        }, 3000);
                    }
                })
                .fail(function (res) {
                    console.log(res.responseText);
                    if (res.status === 422) {
                        $("small.text-red-600").remove();
                        $("input.border-red-500").removeClass("border-red-500");

                        let { errors } = res.responseJSON;

                        for (let error in errors) {
                            errors[error].forEach((message) => {
                                $(`input[name=${error}]`).addClass(
                                    "border-red-500"
                                );

                                $(`input[name=${error}]`).after(
                                    `<small class="text-red-600">${message}</small>`
                                );
                            });
                        }
                    }
                });
        });
    });
});
