<?php


$mysqli = new mysqli('localhost', 'root', '','webform');
        $searchName =$_POST["searchAll"];
        $query = "SELECT json_data FROM users WHERE json_data LIKE '%$searchName%'";


        $result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
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
        foreach ($result as $key => $value){
            $decoded = json_decode($value['json_data']);
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

