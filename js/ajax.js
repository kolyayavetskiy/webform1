$(document).ready(function () {
    let form = document.forms;
    $('.show_popup').click(function () {
        var popup_id = $('#' + $(this).attr("rel"));
        $(popup_id).show();
        $('.overlay_popup').show();
        /*setTimeout(function () {
            jQuery('.overlay_popup, .popup').hide();
        }, 10000);*/
        //$(".ajax_form").html(form[0]);
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
        success: function (data) {
            //data = JSON.parse(data);

            $('#' + ajax_form).html('Дякуємо, ' + $("#name").val() + ':) Очікуйте повідомлення.');

            //$('#'+ ajax_form ).html("Дякуємо, " + data["name"] + ':) Очікуйте повідомлення на номер ' + data["phone"]);
        },
        error: function () {
            $('#ajax_form').html('Помилка. Дані не відправлені.');
        }
    });
}



