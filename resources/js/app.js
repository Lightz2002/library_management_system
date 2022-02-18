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

        $.ajax({
            url: "/dashboard/books",
            method: "POST",
            data: $(".form").serialize(),
        })
            .done(function (data) {
                console.log(data.json());
            })
            .fail(function (err) {
                console.log(err);
            });
    });
});
