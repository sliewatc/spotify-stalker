<?php
include('setconnection.php');

session_reset();

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname']= $_POST['lastname'];

header("Location: reqauth.php");
