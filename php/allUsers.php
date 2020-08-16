<?php
require_once "connection.php";
$searchName = $_POST["searchAll"];
$query = "SELECT json_data FROM users WHERE json_data LIKE '%$searchName%'";
$result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
if (empty($result)){
    ?>
    <b><br>Збігів не знайдено</b>
<?php }
else {
?>
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
        <tbody>
        <tr>
            <th scope="row"><?php $key ?></th>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $decoded->name; ?></td>
            <td><?php echo $decoded->phone . "<br>"; ?></td>
            <td><input type="button" id="update_btn" class = "btn btn-warning font-weight-bold text-dark" value="Редагувати" onclick='update("<?php echo $decoded->name; ?>", "<?php echo $decoded->phone; ?>")'/></td>
            <td><input type="button" id="delete_btn" class = "btn btn-danger font-weight-bold text-dark" value="Видалити" onclick='delete_("<?php echo $decoded->name; ?>", "<?php echo $decoded->phone; ?>")'/></td>
        </tr>
        </tbody>
        <?php
    }
    }
    $mysqli->close();
    ?>
</table>