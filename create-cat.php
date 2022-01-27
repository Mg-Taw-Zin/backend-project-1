<?php
include "db.php";
include "partials/header.php";
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? "";
    $res = mysqli_query($db_connection, "INSERT INTO categories (name) VALUES ('$name')");
    header('location:index.php');
}

include "partials/header-banner.php";
?>
<div class="w-50 p-5 m-5 m-auto">
    <form action="create-cat.php" method="post" class="border p-4">
        <h2 class="text-center mb-3">Create Categories</h2>
        <input type="text" name="name" required placeholder="insert category" class="form-control mb-3">
        <input type="submit" value="Insert" name="submit" class="brn btn-primary">
    </form>
</div>

<?php
include "partials/footer.php";
?>