<?php
$mysqli = new mysqli('localhost', 'root', '','webform');
$query = "SELECT json_data FROM users";
$Result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
?>
<table id="fullUsersTable">
    <tr>
        <th>Всі результати: </th>
    </tr>
    <?php
    foreach ($Result as $key=>$item){
        $decoded = json_decode($item['json_data']);
        ?>
        <tr>
            <td><? echo $decoded->name?></td>
            <td><? echo $decoded->phone?></td>
        </tr>
        <?php
    }
    $mysqli->close();
    ?>
</table>