<?php
session_start();
require '../vendor/autoload.php';
include('setconnection.php');

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];
$accessToken = $_SESSION['accesstoken'];
$ids = $_POST['addstr'];

// Fetch access token from database.

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$features = $api->getAudioFeatures($ids);

if (!isset($features)) {
    header('Location: tokenrefresh.php');
}

$jsonFeat = json_encode($features);

print_r(
    $jsonFeat
);
