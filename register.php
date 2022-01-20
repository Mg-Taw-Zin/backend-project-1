<?php
include_once  "db.php";
$register_errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
    }
    if (!$name) {
        $register_errors[] = "name required";
    }
    if (!$email) {
        $register_errors[] = "email required";
    }
    if (!$phone) {
        $register_errors[] = "phone required";
    }
    $e_check = "SELECT * FROM users WHERE email = '$email'";
    $res_email = mysqli_query($db_connection, $e_check);
    if (mysqli_num_rows($res_email) > 0) {
        $register_errors[] = "email already exist!";
    }
    if (count($register_errors) == 0) {
        $register_qry = "INSERT INTO `users`(`user_id`, `name`, `email`, `password`, `phone`, `address`, `create_date`, `updated_date`) VALUES ('','$name','$email','$password','$phone','$address',now(),now())";
        $results = mysqli_query($db_connection, $register_qry);
        if ($results) {
            header('location:login.php');
        }
    }
}
include_once "partials/header.php";

?>
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="m-auto">
                <div class="col-sm-8">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="register.php" method="post">

                            <?php
                            if (count($register_errors) > 0) {
                                foreach ($register_errors as $errors) {
                                    echo "<b>$errors</b> <br>";
                                }
                            }
                            ?>
                            <input type="text" name="name" placeholder="Name" />
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="number" name="phone" placeholder="Phone Number" />
                            <textarea style="outline:none" name="address" placeholder="Your Address"> </textarea>
                            <button type="submit" name="register" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/form-->

<?php
include_once "partials/footer.php"
?>