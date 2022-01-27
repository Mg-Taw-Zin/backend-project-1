<?php
include('db.php');
$text = $_REQUEST['text'];
$res_id = substr($text, 1);
$sql = mysqli_query($db_connection, "SELECT * FROM `sub_categories` WHERE category_id = '$res_id'");
?>
<?php while ($sql_fetch = mysqli_fetch_assoc($sql)) { ?>
<li><a href=""><?php echo $sql_fetch['name'] ?></a></li>

<?php  } ?>