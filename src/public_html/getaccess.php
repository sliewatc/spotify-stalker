<?php
include('setconnection.php');
require '../vendor/autoload.php';

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];

echo $username;
echo $password;

$sql = mysqli_query($conn, "SELECT accesstoken FROM `usertable` WHERE username = '$username' AND password = '$password'");
if ($sql) {
    echo "yes";
    $ar = (array) $sql;
    print_r($ar);

    /*
     * ADD DATABASE INTERACTION TO SET TOKEN
     * $accessToken = $session->getAccessToken();
     * $api->setAccessToken($accessToken);
    */

    echo "success";

} else {
    echo 'Oops an error occurred.';
}