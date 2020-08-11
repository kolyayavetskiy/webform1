<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Web form</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>
    <script src="jquery/jquery-1.11.2.min.js"></script>
    <link href="form.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">NIKO</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item active">
                <a class="nav-link" href="main_page.html">Головна сторінка <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="C:\OSPanel\domains\localhost\webform\index.php">Форма</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="content">
        <button class="show_popup blue_btn" rel="popup1">Залишити заявку</button>
    </div>
    <div class="overlay_popup"></div>
    <div class="popup" id="popup1">
        <div class="object">
            <form method="post" id="ajax_form" action="" >
                <input type="text" class="form-control" name="name" id="name" placeholder="Введіть ім'я" /><br>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Введіть телефон" /><br>
                <input type="button" class="btn btn-primary" id="btn" value="Відправити" />
            </form>
        </div>
    </div>
</body>
</html>