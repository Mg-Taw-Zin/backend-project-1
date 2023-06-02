<?php
include "db.php";
$id = $_GET['id'];
mysqli_query($db_connection, "DELETE FROM users WHERE user_id = '$id'");
header('location:all-users.php?message=Delete Success');
