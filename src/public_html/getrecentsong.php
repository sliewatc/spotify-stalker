<?php
session_start();

require '../vendor/autoload.php';
include('setconnection.php');

// Fetch your access token from somewhere. A database for example.
$accessToken = $_SESSION['accessToken'];
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$recentTrackAssoc = $api->getMyRecentTracks();
$jsonTracks = json_encode($recentTrackAssoc);

print_r(
    $jsonTracks
);
