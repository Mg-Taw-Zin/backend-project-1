<?php
include "db.php";
include "partials/header.php";
if (isset($_POST['submit'])) {
    $cat_id = $_POST['category_id'] ?? '';
    $sub_id = $_POST['sub-category_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $image = $_FILES['image'];
    $img_name = $_FILES['image']['name'];
    $img_name = time() . $img_name;
    $img_tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($img_tmp_name, "images/shop/$img_name");
    $price = $_POST['price'] ?? '';
    $model = $_POST['model'] ?? '';
    $color = $_POST['color'] ?? '';
    $feature = $_POST['feature'] ?? '';
    $description = $_POST['description'] ?? '';
    $product_stock = $_POST['product_stock'] ?? '';
    $weight = $_POST['weight'] ?? '';
    $res = mysqli_query($db_connection, "INSERT INTO `products`( `category_id`, `sub_category_id`, `name`, `slug`, `image`, `price`, `model`, `color`, `feature`, `description`, `product_stock`, `weight`, `created_date`, `updated_date`) VALUES ('$cat_id','$sub_id','$name','$slug','$img_name','$price','$model','$color','$feature','$description','$product_stock','$weight',now(),now())");
    header('location:admin-dashboard.php');
}
include "partials/header-banner.php";
?>
<div class="w-50 p-5 m-5 m-auto">
    <form action="create-products.php" method="post" class="border p-4" enctype="multipart/form-data">
        <h2 class="text-center mb-3">Create Sub Categories</h2>
        <div class="mb-3">
            <select name="category_id" id="category_id" onchange="getSub()">
                <?php
$res = mysqli_query($db_connection, "SELECT id,name FROM categories");
while ($data = mysqli_fetch_assoc($res)):

?>
                <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                <?php endwhile?>
            </select>
        </div>
        <div class="mb-3">
            <select name="sub_category_id" id="sub_category_id">
                <option value="">Selected Item</option>
            </select>
        </div>
        <input type="text" name="name" placeholder="insert sub category name" class="form-control mb-3">
        <input type="text" name="slug" placeholder="insert sub category slug name" class="form-control mb-3">
        <input type="file" name="image" placeholder="insert sub category" class="form-control mb-3">
        <input type="text" name="price" placeholder="insert sub category price" class="form-control mb-3">
        <input type="text" name="model" placeholder="insert sub category model" class="form-control mb-3">
        <input type="text" name="color" placeholder="insert sub category color" class="form-control mb-3">
        <input type="number" name="feature" placeholder="feature or not" class="form-control mb-3">
        <input type="text" name="description" placeholder="insert sub category description" class="form-control mb-3">
        <input type="number" name="product_stock" placeholder="insert sub category count" class="form-control mb-3">
        <input type="text" name="weight" placeholder="insert sub category weight" class="form-control mb-3">
        <input type="submit" value="Insert" name="submit" class="brn btn-primary">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function getSub() {
    let val = $('#category_id').val();
    $.ajax({
        type: "POST",
        url: "get-sub.php",
        data: {
            val: val
        },

        success: function(response) {
            $('#sub_category_id').html(response)
        }
    });

}
</script>
<?php
include "partials/footer.php";
?>