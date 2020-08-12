<?php
$mysqli = new mysqli('localhost', 'root', '', 'webform');
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
    <link href="form.css" rel="stylesheet" type="text/css"/>
    <table class="table" id="fullUsersTable">
        <thead>
        <tr>
            <th></th>
            <th>№</th>
            <th>Ім'я</th>
        </tr>
        </thead>
        <?php
        foreach ($result as $key => $value) {
            $decoded = json_decode($value['json_data']);
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
        <a href="allUsers.html" id="allUsers">Побачити всіх</a>
        <?php
    }
}
$mysqli->close();
?>




