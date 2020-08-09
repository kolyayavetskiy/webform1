<?php

if (isset($_POST["name"]) && isset($_POST["phone"]) ) {
    $connect = mysqli_connect('localhost', 'root', '','webform');
    if ($connect){
        $name = ($_POST["name"]);
        $phone = ($_POST["phone"]);

        $arrInf = array(
            "name" => $name,
            "phone" => $phone
        );

        $enc = json_encode($arrInf);
        echo $enc;

        $query = "INSERT INTO users VALUES (NULL, '$name', '$phone')";
        $result = mysqli_query($connect, $query);
        mysqli_close();
    } else {
        echo "Connection error!";
    }
}

