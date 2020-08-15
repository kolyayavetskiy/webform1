$(document).ready(function () {
    $('#searchAll').val(localStorage.getItem('searchAll'));
    let name = $('#searchAll').val();
    findingByName(name);

    $("#searchAll").keyup(
        function () {
            let name = $('#searchAll').val();
            if (name === "" || name.length < 3) {
                $(".displayAll").html("Введіть мінімум 3 символи");
            } else {
                findingByName(name);
            }
        }
    );
});

function findingByName (name) {
    $.ajax({
        type: "POST",
        url: "../php/allUsers.php",
        data: {
            searchAll: name
        },
        success: function(response) {
            $(".displayAll").html(response).show();
        }
    });
}

function delete_ (name, phone)
{
    $.ajax({
        type: "POST",
        url: "../php/delete.php",
        data: {
            name: name,
            phone: phone
        },
        success: function () {
            findingByName(name);
        }
    });
}
