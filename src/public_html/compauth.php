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

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);
$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();
$api->setAccessToken($accessToken);

$_SESSION['accessToken'] = $accessToken;

$return = $api->me();
$id = $return->id;

$sql = "INSERT INTO usertable (username, firstname, lastname, password, email, spotifyid, refreshtoken, accesstoken)
VALUES ('$username', '$fname', '$lname', '$psw', '$email', '$id', '$refreshToken', '$accessToken')";

if (mysqli_query($conn, $sql)) {
    echo "success";
    $_SESSION['actUser'] = $username;
    $_SESSION['passUser'] = $password;
    $_SESSION['state'] = true;
    header('Location: index.php');
} else {
    echo "Error that account is already linked";
    header('Location: register.php');
}

die();



