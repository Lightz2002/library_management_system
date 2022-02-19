require("./bootstrap");

import $ from "jQuery";
$.when($.ready).then(function () {
    function showModal() {
        $(".modal").removeClass("hidden");
        $(".modal").addClass("flex");
    }

    function closeModal() {
        $(".modal").addClass("hidden");
    }

    $("#title").on("change", function () {
        fetch("/dashboard/books/createSlug?title=" + $("#title").val())
            .then((res) => res.json())
            .then((data) => $("#slug").val(data.slug));
    });

    $(".btn-create-book").on("click", function () {
        showModal();
    });

    $(".modal, .modal__btn-close").on("click", function (e) {
        if (!e.target.classList.contains("close")) return;
        closeModal();
    });

    $.ajax("/dashboard/books/create")
        .done(function (res) {
            for (let authors of res.authors) {
                $("#author").append(
                    `<option value='${authors.id}'>${authors.firstname}</option>`
                );
            }

            for (let publishers of res.publishers) {
                $("#publisher").append(
                    `<option value='${publishers.id}'>${publishers.name}</option>`
                );
            }
        })
        .fail(function (res) {
            alert(res);
        });

    $(".form").on("submit", function (e) {
        e.preventDefault();

        let fd = new FormData(this);

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
});
