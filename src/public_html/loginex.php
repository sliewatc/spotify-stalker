<?php
session_reset();

include('setconnection.php');
require '../vendor/autoload.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM `usertable` WHERE username = '$username' AND password = '$password'");
$rows = mysqli_num_rows($sql);

if ($rows == 1) {
    $_SESSION['actUser'] = $username;
    $_SESSION['passUser'] = $password;
    $_SESSION['state'] = true;

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $session = new SpotifyWebAPI\Session(
        'a625c6b83e6b4643af1e51be60578d7d',
        '8a3f2d09810046308b6450f806784d5b',
        'http://165.227.45.166/compauth.php'
    );
    include('tokenrefresh.php');
} else {
    echo 'error';
    header('Location: login.php');
}