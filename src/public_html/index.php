<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spotify Stalker</title>

    <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
     -->

    <link href="assets/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="assets/lib/bootstrap/bootstrap.min.js"></script>
    <script src="assets/lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/lib/popper/popper.min.js"></script>
    <script src="assets/lib/angularjs/angular.min.js"></script>

    <link href="assets/css/main.css" rel="stylesheet">


    <script src="assets/js/stalker.js"></script>

</head>
    <body>
        <div class="container-fluid contform">
            <div class="row nav-bar noselect">
                <div class="col-6">
                    <h4 class= "col stalk-title font-weight-light">
                        Stalkify
                    </h4>
                </div>
                <div class="row col-6 align-items-center justify-content-end">
                    <div class="menu-wrapper">
                        <img class="anim-fi img-fluid menu-icon" id="menu-burger" src="assets/img/menuham.png">
                        <a href="login.php">
                            <img class="anim-fi img-fluid menu-icon" id="menu-power" src="assets/img/pwrbtn.png">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row menu-view" id="menu-this" style="display: none">
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Home</a>
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Friends</a>
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Stats</a>
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Search</a>
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">About</a>
                <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Settings</a>
            </div>
            <div class="row">
                <div class="col-12 bg-view">
                    <div class="row align-items-center app-wrap">
                        <div class="col justify-content-center">
                            <div class="central-box text-center">
                                <h3 class="font-weight-light">Start Stalking!</h3>
                                <p>Make sure you know just exactly how your friends and family listen to their music</p>
                                <a href="register.php" class="s-btn btn-register">CONNECT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="left-sbar col-12 col-md-3">Left</div>
                        <div class="col-12 col-md-6">Applet</div>
                        <div class="right-sbar col-12 col-md-3">Right</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>