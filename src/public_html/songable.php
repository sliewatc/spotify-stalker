<html lang=>
<head>
    <meta charset="UTF-8">
    <title>Stalkify Dash</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-route.js"></script>
    <!--
    <link href="assets/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="assets/lib/bootstrap/bootstrap.min.js"></script>
    <script src="assets/lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/lib/angularjs/angular.min.js"></script>
    -->
    <link href="assets/css/tables.css" rel="stylesheet">
    <link href="assets/css/sidebar.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="assets/js/ngstalk.js"></script>
    <script src="assets/js/stalker.js"></script>
</head>
<body ng-app="stalkApp">
<?php include('navhead.php'); ?>
<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>
            <li class="cd-label">STATS</li>
            <li class="overview" data-active-link>
                <a href="#!/overall">Overview</a>
            </li>
            <li class="notifications" data-active-link="">
                <a href="#!/topsongs">Top Songs</a>
            </li>
            <li class="comments" data-active-link="">
                <a href="#!/topartists">Top Artists</a>
            </li>
            <li class="overview" data-active-link="">
                <a href="#!/recentsongs">Recent</a>
            </li>
        </ul>
        <ul>
            <li class="cd-label" data-active-link>FRIENDS</li>
            <li class="has-children bookmarks">
                <a href="#">List 'Em</a>

            </li>
            <li class="images" data-active-link>
                <a href="#">Top</a>
            </li>
            <li class="users" data-active-link>
                <a href="#">Add</a>
            </li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <div class="row align-items-center xoverflow">
            <ng-view style="width: 100%"></ng-view>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

</body>

</html>