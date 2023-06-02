<?php
session_start();
$id = $_GET['id'];
$res = $_SESSION['cart'][$id]--;
if ($res < 2) {
    unset($_SESSION['cart'][$id]);
}
header("location:cart.php");