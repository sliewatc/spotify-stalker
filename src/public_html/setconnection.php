<?php
session_start(); // Starting Session

$server_name = "localhost";
$db_username = "root";
$db_password = "barleywheat";
$db_name = "stalkifydb";

$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
