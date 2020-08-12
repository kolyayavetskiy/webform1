$(document).ready(function() {

    $.ajax({
        type: "POST",
        url: "all.php",
        success: function(response) {
            $(".displayAll").html(response).show();
        }
    });

    $("#searchAll").keyup(
        function () {
            let name = $('#searchAll').val();
            if (name === "" || name.length < 3) {
                $(".displayAll").html("Введіть мінімум 3 символи");
            } else {
                $.ajax({
                    url: "allUsers.php",
                    type: "POST",
                    data: {
                        searchAll: name
                    },
                    success: function (response) {
                        $(".displayAll").html(response).show();
                    }
                });

            }
        }
    );
});