$(document).ready(function () {
    $('.show_popup').click(function () {
        var popup_id = $('#' + $(this).attr("rel"));
        $(popup_id).show();
        $('.overlay_popup').show();
        $("#ajax_form").removeClass("hidden");
        $("#name").val("");
        $("#phone").val("");
        $(".alert").addClass("hidden");
        setTimeout(function () {
            jQuery('.overlay_popup, .popup').hide();
        }, 25000);

    });
    $('.overlay_popup').click(function () {
        $('.overlay_popup, .popup').hide();
    });
    $("#btn").click(
        function () {
            sendAjaxForm('ajax_form', '../php/action_ajax_form.php');
        }
    );

    $("#search").keyup(
        function () {
            let name = $('#search').val();
            if (name === "" || name.length < 3) {
                $("#display").html("Введіть мінімум 3 символи");
            } else {
                localStorage.setItem('searchAll', $('#search').val());
                $.ajax({
                    url: "../php/find.php",
                    type: "POST",
                    data: {
                        search: name
                    },
                    success: function (response) {
                        $("#display").html(response).show();
                    }
                });

            }
        }
    );
});

function sendAjaxForm(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        data: $("#" + ajax_form).serialize(),
        success: function () {

            $("#" + ajax_form).addClass("hidden");
            let tmp = document.createElement('p');
            tmp.className = "alert";
            let message = document.createTextNode('Дякуємо, ' + $("#name").val() + ':) Очікуйте повідомлення.');
            tmp.appendChild(message);
            $(".object").append(tmp);
        }
    });
}