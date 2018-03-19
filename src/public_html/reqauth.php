<?php

require '../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'a625c6b83e6b4643af1e51be60578d7d',
    '8a3f2d09810046308b6450f806784d5b',
    'http://stalkify.me/compauth.php'
);

$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
        'user-library-read',
        'user-top-read',
        'user-read-recently-played'
    ],
];

header('Location: ' . $session->getAuthorizeUrl($options) . '&show_dialog=true');
die();

