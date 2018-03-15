<?php
session_start();
require '../vendor/autoload.php';
include('setconnection.php');

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];
$accessToken = $_SESSION['accesstoken'];
$type = $_POST['type'];
$time = $_POST['time_range'];

// Fetch access token from database.

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$options = array('time_range' => $time);

$top = $api->getMyTop($type, $options);

if (!isset($top)) {
    header('Location: tokenrefresh.php');
}

$jsonArtists = json_encode($top);

print_r(
    $jsonArtists
);