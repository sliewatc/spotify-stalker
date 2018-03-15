<?php
include('setconnection.php');
require '../vendor/autoload.php';

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];

$sql = mysqli_query($conn, "SELECT refreshtoken FROM `usertable` WHERE username = '$username' AND password = '$password'");
if ($sql) {
    echo "fine";
    while ($row = mysqli_fetch_assoc($sql)){
        $refreshToken = $row['refreshtoken'];
    }
    echo $refreshToken;

    include('initapi.php');

    $session->refreshAccessToken($refreshToken);
    $accessToken = $session->getAccessToken();
    $api->setAccessToken($accessToken);

    $r = mysqli_query($conn, "UPDATE 'usertable' SET accesstoken = '$accessToken' WHERE username = '$username' AND password = '$password'");
    $_SESSION['accesstoken'] = $accessToken;
    header('Location: songable.php#!/overall');
} else {
    echo 'Oops an error occurred.';
}
