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

$api = new SpotifyWebAPI\SpotifyWebAPI();
$session = new SpotifyWebAPI\Session(
    'a625c6b83e6b4643af1e51be60578d7d',
    '8a3f2d09810046308b6450f806784d5b',
    'http://165.227.45.166/compauth.php'
);

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);
$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();
$api->setAccessToken($accessToken);

$return = $api->me();
$id = $return->id;

$sql = "INSERT INTO usertable (username, firstname, lastname, password, email, spotifyid, refreshtoken)
VALUES ('$username', '$fname', '$lname', '$psw', '$email', '$id', '$refreshToken')";

if (mysqli_query($conn, $sql)) {
    echo "success";
    header('Location: index.php');
} else {
    echo "fail";
    header('Location: register.php');
}
die();

/*
$sql = "UPDATE usertable
SET refreshtoken = '$refreshToken', spotifyid = '$id'
WHERE email='$user'";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "fail";
}
*/



