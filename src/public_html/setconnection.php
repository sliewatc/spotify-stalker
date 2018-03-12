<?php
session_start(); // Starting Session

$server_name = "localhost";
$username = "root";
$password = "barleywheat";
$db_name = "stalkifydb";

$conn = mysqli_connect($server_name, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
