<?php
require_once "connection.php";
$searchName = $_POST["search"];
$query = "SELECT json_data FROM users WHERE json_data LIKE '%$searchName%'";
$result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
$countOfPeople = 0;
if (empty($result)) {
    ?>
    <b><br>Збігів не знайдено</b>
    <?php
} else {
    ?>
    <link href="../css/form.css" rel="stylesheet" type="text/css"/>
    <table class="table" id="fullUsersTable">
        <?php
        foreach ($result as $key => $value) {
            $decoded = json_decode($value['json_data']);
            if (!stristr($decoded->name, $searchName)){?>
                <b><br>Збігів не знайдено</b>
                <?php
                break;
            }
            ?>
            <i><b>
                    <tbody>
                    <tr>
                        <th scope="row"><?php $key ?></th>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $decoded->name; ?></td>
                    </tr>
                    </tbody>
                </b></i>
            <?php
            $countOfPeople++;
            if ($countOfPeople < 3) {
                continue;
            }
            ?>
            <?php
            break;
        }
        ?>
    </table>
    <?php
    if ($countOfPeople >= 3) {
        ?>
        <a href="../html/allUsers.html" id="allUsers">Побачити всіх</a>
        <?php
    }
}
$mysqli->close();
?>




