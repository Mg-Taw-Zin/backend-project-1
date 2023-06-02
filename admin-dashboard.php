<?php
session_start();
include "db.php";
include "partials/header.php";
$admin = isset($_SESSION['auth']);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Two Page</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>

    </style>
</head>

<body>

    <?php
    $message = $_GET['message'];

    ?>
    <?php if ($admin) : ?>

    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;Admin PAGE</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">See Website</a></li>
                        <li><a href="login.php">login</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <h1 class="mes"><?php echo $message; ?></h1>
        <h1 class="mes"><?php echo "hello"; ?></h1>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />

                    </li>


                    <li>
                        <a href="index.php"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Insert Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="create-cat.php">Insert Categories</a>
                            </li>
                            <li>
                                <a href="create-sub-cat.php">Insert Sub Categories</a>
                            </li>
                            <li>
                                <a href="create-products.php">Insert Products</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="all-users.php"><i class="fa fa-table "></i>All Users</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>Tabs & Panels</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>Mettis Charts</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Last Link </a>
                    </li>
                    <li>
                        <a href="blank.php"><i class="fa fa-table "></i>Blank Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <table border="1">
                                        <h2>All Categories List</h2>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $qry = "SELECT * FROM categories";
                                                $res = mysqli_query($db_connection, $qry);
                                                $i = 1;
                                                while ($data = mysqli_fetch_assoc($res)) :

                                                ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data['name'] ?></td>
                                                <td>
                                                    <a href="edit_cat.php?id=<?php echo $data['id'] ?>"><span
                                                            class="glyphicon glyphicon-pencil"> Edit
                                                        </span></a>
                                                </td>
                                                <td>
                                                    <a href="delete-cat.php?id=<?php echo $data['id'] ?>"><span
                                                            class="glyphicon glyphicon-trash">
                                                            Delete</span></a>
                                                </td>
                                            </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h1>Sub Categories List</h1>
                            </div>
                        </div>
                    </div>

                </div>






            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?php else : ?>
    <?php
        header('location:index.php')
        ?>
    <?php endif ?>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>