<?php
include_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $update_qry = "UPDATE `users` SET `name`='$name',`phone`='$phone',`address`='$address',`create_date`= now(),`updated_date`= now() WHERE user_id = '$user_id'";
        $results = mysqli_query($db_connection, $update_qry);
        if ($results) {
            header('location:all-users.php?message=edit user success');
        }
    }
}
include_once "partials/header.php";

?>


<?php
include_once "partials/footer.php"
?>