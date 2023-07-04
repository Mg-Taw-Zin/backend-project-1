<?php
include "db.php";
include "partials/header.php";

if (isset($_POST['submit'])) {
    $cat_id = $_POST['category_id'];
    $name = $_POST['name'];
    $res = mysqli_query($db_connection, "INSERT INTO `sub_categories`( `category_id`, `name`) VALUES ('$cat_id','$name')");
    header('location:index.php');
}

include "partials/header-banner.php";
?>
<div class="w-50 p-5 m-5 m-auto">
    <form action="create-sub-cat.php" method="post" class="border p-4">
        <h2 class="text-center mb-3">Create Sub Categories</h2>
        <div class="mb-3">
            <select name="category_id" id="">
                <?php
$res = mysqli_query($db_connection, "SELECT id,name FROM categories");
while ($data = mysqli_fetch_assoc($res)):

?>
                <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                <?php endwhile?>
            </select>
        </div>
        <input type="text" name="name" placeholder="insert sub category" class="form-control mb-3">
        <input type="submit" value="Insert" name="submit" class="brn btn-primary">
    </form>
</div>

<?php
include "partials/footer.php";
?>