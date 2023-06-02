<?php
include "db.php";
include "partials/header.php";
$id = $_GET['id'];
$res = mysqli_query($db_connection, "SELECT * FROM users WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($res);
// print_r($data);
include "partials/header-banner.php";
?>
<div class="w-50 p-5 m-5 m-auto">
    <form action="update-user.php" method="post">
        <h1 class="my-title">Edit User Form</h1>
        <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>">
        <input type="text" class="mb-3" placeholder="name" name="name" value="<?php echo $data['name'] ?? '' ?>">


        <input type="number" class="mb-3" placeholder="phone" name="phone" value="<?php echo $data['phone'] ?? '' ?>">
        <input type="text" class="mb-3" placeholder="address" name="address" value="<?php echo $data['address'] ?? '' ?>">
        <input type="submit" name="update" value="Edit User" class="mb-3">
    </form>
</div>

<?php
include "partials/footer.php";
?>