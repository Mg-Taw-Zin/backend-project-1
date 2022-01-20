<?php
session_start();
require "db.php";

$login_errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        
        $user_qry = "SELECT * FROM `users` WHERE email = '$email'";
        $user_res = mysqli_query($db_connection, $user_qry);
        $fetch_user = mysqli_fetch_assoc($user_res);
        $fetch_email = $fetch_user['email'];
        $fetch_password = $fetch_user['password'];
        if ($email === $fetch_email && $password === $fetch_password) {
            $_SESSION['name'] = $fetch_user['name'];
            header("location:index.php");
        }
    }
}
require "partials/header.php";

?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form action="login.php" method="post">
                        <?php
                        if (count($login_errors) > 0) {
                            foreach ($login_errors as  $errors) {
                                echo "<b>$errors</b> <br>";
                            }
                        }

                        ?>
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Password" />

                        <button type="submit" name="login" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
<!--/form-->

<?php
include_once "partials/footer.php"
?>