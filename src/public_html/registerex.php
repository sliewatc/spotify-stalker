<?php
include('setconnection.php');
session_destroy();
session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname']= $_POST['lastname'];

header("Location: reqauth.php");

/*
if (mysqli_query($conn, $sql)) {
    header("Location: reqauth.php");
    $_SESSION['curUserEmail'] = $email;
} else {
    header("Location: register.php");
}
*/