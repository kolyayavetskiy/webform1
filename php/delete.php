<?php
require_once "connection.php";
$name = ($_POST["name"]);
$phone = ($_POST["phone"]);
$arrInf = array(
    "name" => $name,
    "phone" => $phone
);
$enc = json_encode($arrInf);
echo $enc;
$query = "DELETE FROM users WHERE json_data = '$enc'";
$mysqli->query($query);
$mysqli->close();