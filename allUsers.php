<?php


$mysqli = new mysqli('localhost', 'root', '','webform');
        $searchName =$_POST["searchAll"];
        $query = "SELECT json_data FROM users WHERE json_data LIKE '%$searchName%'";


        $result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
        ?>
<table id="fullUsersTable">
        <tr>
            <th>Всі результати: </th>
        </tr>
    <?php
        foreach ($result as $key => $value){
            $decoded = json_decode($value['json_data']);
            ?>

                <tr>
                    <td> <?php echo $decoded->name; ?></td>
                    <td><?php echo $decoded->phone . "<br>"; ?></td>
                </tr>

            <?php
        }
$mysqli->close();
?>
</table>

