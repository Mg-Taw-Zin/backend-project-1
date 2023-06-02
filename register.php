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
        $register_errors[] = "Name required";
    }
    if (!$email) {
        $register_errors[] = "Email required";
    }
    if (!$phone) {
        $register_errors[] = "Phone required";
    }
    $e_check = "SELECT * FROM users WHERE email = '$email'";
    $res_email = mysqli_query($db_connection, $e_check);
    // print_r($res_email);
    // die();
    if (mysqli_num_rows($res_email) > 0) {
        $register_errors[] = "email already exist!";
    }
    if (count($register_errors) == 0) {
        $register_qry = "INSERT INTO `users`( `name`, `email`, `password`, `phone`, `address`, `create_date`, `updated_date`) VALUES ('$name','$email','$password','$phone','$address',now(),now())";
        $results = mysqli_query($db_connection, $register_qry);
        if ($results) {
            header('location:login.php');
        }
    }
}
include_once "partials/header.php";

?>
<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="../images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                            <li> <a> </a> </li>
                            <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>


                            <li><a href="register.php"><i class="fa fa-lock"></i> register</a></li>
                            <li><a href="logout.php"><i class="fa fa-lock"></i> logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.php">Products</a></li>
                                    <li><a href="product-details.php">Product Details</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.php">Blog List</a></li>
                                    <li><a href="blog-single.php">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="404.php">404</a></li>
                            <li><a href="contact-us.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
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