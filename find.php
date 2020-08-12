<?php


$mysqli = new mysqli('localhost', 'root', '','webform');
        $searchName =$_POST["search"];
        $query = "SELECT json_data FROM users WHERE json_data LIKE '%$searchName%'";

        echo '<ul>';
        $result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
        //var_dump($result);
        $countOfPeople = 0;
        foreach ($result as $key => $value){
            $decoded = json_decode($value['json_data']);
            ?>
            <li onclick = 'fill ("<?php echo $decoded->name; ?>")'>
                <i><b>
                    <?php echo $decoded->name; ?>
                    </b></i>
            </li>
            <?php
            $countOfPeople++;
            if ($countOfPeople < 3){
                continue;
            }
            ?>
            <link href="form.css" rel="stylesheet" type="text/css"/>
<a href = "allUsers.html" id = "allUsers">Побачити всіх</a>
<?php
            break;
        }


$mysqli->close();
?>
</ul>
