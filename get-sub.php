<?php
include "db.php";
$val = $_REQUEST['val'];
$res = mysqli_query($db_connection, "SELECT `id`, `name` FROM `sub_categories` WHERE category_id = '$val'");
while ($data = mysqli_fetch_assoc($res)) :
?>
<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
<?php endwhile ?>