<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($link, "select * from tb_user where username='$username', password='$password'");
$cek = mysqli_num_rows($query);
if ($chek) {
    header("location:home.php");
} else {
    header("location:login.php");
}
