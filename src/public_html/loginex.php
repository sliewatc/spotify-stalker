<?php
include('setconnection.php');

session_reset();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM `usertable` WHERE username = '$username' AND password = '$password'");
$rows = mysqli_num_rows($sql);

if ($rows == 1) {
    header('Location: index.php');
} else {
    header('Location: login.php');
}