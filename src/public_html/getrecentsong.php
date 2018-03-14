<?php
session_start();
require '../vendor/autoload.php';
include('setconnection.php');

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];
$accessToken = $_SESSION['accesstoken'];

// Fetch access token from database.

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$options = array('limit' => 50);

$recentTrackAssoc = $api->getMyRecentTracks($options);
$jsonTracks = json_encode($recentTrackAssoc);

print_r(
    $jsonTracks
);
