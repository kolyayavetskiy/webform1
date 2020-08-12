<?php
$mysqli = new mysqli('localhost', 'root', '','webform');
$query = "SELECT json_data FROM users";
$Result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
?>
<table class="table" id="fullUsersTable">

    <thead>
    <tr>
        <th></th>
        <th>№</th>
        <th>Ім'я</th>
        <th>Телефон</>
    </tr>
    </thead>
    <?php
    foreach ($Result as $key=>$item){
        $decoded = json_decode($item['json_data']);
        ?>
        <tbody>
        <tr>
            <th scope="row"><?php $key ?></th>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $decoded->name; ?></td>
            <td><?php echo $decoded->phone . "<br>"; ?></td>
        </tr>
        </tbody>
        <?php
    }
    $mysqli->close();
    ?>
</table>