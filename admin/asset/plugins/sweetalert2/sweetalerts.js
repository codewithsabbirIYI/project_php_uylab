/*---------------------------------------------
Template name :  Dashmin
Version       :  1.0
Author        :  ThemeLooks
Author url    :  http://themelooks.com


** Custom Sweetalert JS

----------------------------------------------*/

$(function() {
    'use strict';

    $(document).ready(function () {
        $("#basic-alert").on("click", function () {
            Swal.fire({ title: "Any fool can use a computer", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#with-title").on("click", function () {
            Swal.fire({ title: "The Internet?,", text: "That thing is still around?", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#footer-alert").on("click", function () {
            Swal.fire({ type: "error", title: "Oops...", text: "Something went wrong!", footer: "<a href>Why do I have this issue?</a>", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#html-alert").on("click", function () {
            Swal.fire({
                title: "<strong>HTML <u>example</u></strong>",
                type: "info",
                html: 'You can use <b>bold text</b>, <a href="https://pixinvent.com/" target="_blank">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                focusConfirm: !1,
                confirmButtonText: '<i class="icofont-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="icofont-thumbs-down"></i>',
                cancelButtonAriaLabel: "Thumbs down",
                confirmButtonClass: "btn long",
                buttonsStyling: !1,
                cancelButtonClass: "btn long bg-danger ml-1",
            });
        }),
        $("#bounce-in-animation").on("click", function () {
            Swal.fire({ title: "Bounce In Animation", animation: !1, customClass: "animated bounceIn", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#fade-in-animation").on("click", function () {
            Swal.fire({ title: "Fade In Animation", animation: !1, customClass: "animated fadeIn", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#flip-x-animation").on("click", function () {
            Swal.fire({ title: "Flip In Animation", animation: !1, customClass: "animated flipInX", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#tada-animation").on("click", function () {
            Swal.fire({ title: "Tada Animation", animation: !1, customClass: "animated tada", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#shake-animation").on("click", function () {
            Swal.fire({ title: "Shake Animation", animation: !1, customClass: "animated shake", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#position-top-start").on("click", function () {
            Swal.fire({ position: "top-start", type: "success", title: "Your work has been saved", showConfirmButton: !1, timer: 1500, confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#position-top-end").on("click", function () {
            Swal.fire({ position: "top-end", type: "success", title: "Your work has been saved", showConfirmButton: !1, timer: 1500, confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#position-bottom-start").on("click", function () {
            Swal.fire({ position: "bottom-start", type: "success", title: "Your work has been saved", showConfirmButton: !1, timer: 1500, confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#position-bottom-end").on("click", function () {
            Swal.fire({ position: "bottom-end", type: "success", title: "Your work has been saved", showConfirmButton: !1, timer: 1500, confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#type-success").on("click", function () {
            Swal.fire({ title: "Good job!", text: "You clicked the button!", type: "success", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#type-info").on("click", function () {
            Swal.fire({ title: "Info!", text: "You clicked the button!", type: "info", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#type-warning").on("click", function () {
            Swal.fire({ title: "Warning!", text: " You clicked the button!", type: "warning", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#type-error").on("click", function () {
            Swal.fire({ title: "Error!", text: " You clicked the button!", type: "error", confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#custom-icon").on("click", function () {
            Swal.fire({
                title: "Sweet!",
                text: "Modal with a custom image.",
                imageUrl: "../../assets/img/media/04.jpg",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Custom image",
                animation: !1,
                confirmButtonClass: "btn long",
                buttonsStyling: !1,
            });
        }),
        $("#auto-close").on("click", function () {
            var t;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <strong></strong> seconds.",
                timer: 2e3,
                confirmButtonClass: "btn long",
                buttonsStyling: !1,
                onBeforeOpen: function () {
                    Swal.showLoading(),
                        (t = setInterval(function () {
                            Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft();
                        }, 100));
                },
                onClose: function () {
                    clearInterval(t);
                },
            }).then(function (t) {
                t.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer");
            });
        }),
        $("#outside-click").on("click", function () {
            Swal.fire({ title: "Click outside to close!", text: "This is a cool message!", allowOutsideClick: !0, confirmButtonClass: "btn long", buttonsStyling: !1 });
        }),
        $("#prompt-function").on("click", function () {
            Swal.mixin({ input: "text", confirmButtonText: "Next &rarr;", showCancelButton: !0, progressSteps: ["1", "2", "3"], confirmButtonClass: "btn long", buttonsStyling: !1, cancelButtonClass: "btn long bg-danger ml-1" })
                .queue([{ title: "Question 1", text: "Chaining swal2 modals is easy" }, "Question 2", "Question 3"])
                .then(function (t) {
                    t.value && Swal.fire({ title: "All done!", html: "Your answers: <pre><code>" + JSON.stringify(t.value) + "</code></pre>", confirmButtonText: "Lovely!" });
                });
        }),
        $("#ajax-request").on("click", function () {
            Swal.fire({
                title: "Search for a user",
                input: "text",
                confirmButtonClass: "btn long",
                buttonsStyling: !1,
                inputAttributes: { autocapitalize: "off" },
                showCancelButton: !0,
                confirmButtonText: "Look up",
                showLoaderOnConfirm: !0,
                cancelButtonClass: "btn long bg-danger ml-1",
                preConfirm: function (t) {
                    return fetch("//api.github.com/users/" + t)
                        .then(function (t) {
                            if (!t.ok) throw (console.log(t), new Error(t.statusText));
                            return t.json();
                        })
                        .catch(function (t) {
                            Swal.showValidationMessage("Request failed:  " + t);
                        });
                },
                allowOutsideClick: function () {
                    Swal.isLoading();
                },
            }).then(function (t) {
                t.value && Swal.fire({ title: t.value.login + "'s avatar", imageUrl: t.value.avatar_url });
            });
        }),
        $("#confirm-text").on("click", function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: "btn long",
                cancelButtonClass: "btn long bg-danger ml-1",
                buttonsStyling: !1,
            }).then(function (t) {
                t.value && Swal.fire({ type: "success", title: "Deleted!", text: "Your file has been deleted.", confirmButtonClass: "btn btn-success" });
            });
        }),
        $("#confirm-color").on("click", function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: "btn long",
                cancelButtonClass: "btn long bg-danger ml-1",
                buttonsStyling: !1,
            }).then(function (t) {
                t.value
                    ? Swal.fire({ type: "success", title: "Deleted!", text: "Your file has been deleted.", confirmButtonClass: "btn btn-success" })
                    : t.dismiss === Swal.DismissReason.cancel && Swal.fire({ title: "Cancelled", text: "Your imaginary file is safe :)", type: "error", confirmButtonClass: "btn btn-success" });
            });
        });
    });
});
