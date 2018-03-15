<?php
session_start();
require '../vendor/autoload.php';
include('setconnection.php');

$username = $_SESSION['actUser'];
$password = $_SESSION['passUser'];
$accessToken = $_SESSION['accesstoken'];
$limit = $_POST['limit'];

// Fetch access token from database.

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$options = array('limit' => $limit);

$recentTrackAssoc = $api->getMyRecentTracks($options);

if (!isset($recentTrackAssoc)) {
    header('Location: tokenrefresh.php');
}

$jsonTracks = json_encode($recentTrackAssoc);

print_r(
    $jsonTracks
);
