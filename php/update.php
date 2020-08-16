<?php
require_once "connection.php";

$oldName = ($_POST["oldName"]);
$oldPhone = ($_POST["oldPhone"]);
$newName = ($_POST["newName"]);
$newPhone = ($_POST["newPhone"]);

$oldInf = array(
    "name" => $oldName,
    "phone" => $oldPhone
);
$oldEnc = json_encode($oldInf);

$newInf = array(
    "name" => $newName,
    "phone" => $newPhone
);
$newEnc = json_encode($newInf);


$query = "UPDATE users SET json_data = '$newEnc' WHERE json_data = '$oldEnc'";
$mysqli->query($query);
$mysqli->close();
