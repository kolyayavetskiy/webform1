<?php

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

        $query = "INSERT INTO users VALUES (NULL, '$enc' )";
        mysqli_query($connect, $query);

    } else {
        echo "Connection error!";
    }
mysqli_close($connect);


