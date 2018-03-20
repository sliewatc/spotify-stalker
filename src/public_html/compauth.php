<?php
session_start();

require '../vendor/autoload.php';
include('setconnection.php');
$user = $_SESSION['email'];

$username = $_SESSION['username'];
$psw = $_SESSION['password'];
$email = $_SESSION['email'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];

include('initapi.php');

if (!isset($_GET['code'])) {
    header('Location: register.php');
}

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);
$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();
$api->setAccessToken($accessToken);

$return = $api->me();
$id = $return->id;

$sql = "INSERT INTO usertable (username, firstname, lastname, password, email, spotifyid, refreshtoken, accesstoken)
VALUES ('$username', '$fname', '$lname', '$psw', '$email', '$id', '$refreshToken', '$accessToken')";

if (mysqli_query($conn, $sql)) {
    session_reset();
    echo "success";
    $_SESSION['actUser'] = $username;
    $_SESSION['passUser'] = $psw;
    $_SESSION['accesstoken'] = $accessToken;
    $_SESSION['state'] = true;

    header('Location: songable.php#!/overall');
} else {
    echo "Error that account is already linked";
    header('Location: register.php');
}

die();



