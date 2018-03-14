<html lang=>
<head>
    <meta charset="UTF-8">
    <title>Stalkify Login</title>

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
    <script src="assets/lib/angularjs/angular.min.js"></script>
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
            <li class="overview">
                <a href="#!/recentsongs">Overview</a>
            </li>
            <li class="notifications active">
                <a href="#">Recent<span class="count">3</span></a>
            </li>
            <li class="comments">
                <a href="#">Profile</a>
            </li>
        </ul>
        <ul>
            <li class="cd-label">FRIENDS</li>
            <li class="has-children bookmarks">
                <a href="#">List 'Em</a>
                <ul>
                    <li><a href="#">All Bookmarks</a></li>
                    <li><a href="#">Edit Bookmark</a></li>
                    <li><a href="#">Import Bookmark</a></li>
                </ul>
            </li>
            <li class="images">
                <a href="#">Top</a>
            </li>
            <li class="users">
                <a href="#">Add</a>
            </li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <div class="row align-items-center xoverflow">
            <table class="tbl-container" ng-controller="RecentSongs">
                <thead>
                <tr>
                    <th></th>
                    <th><h5>Song</h5></th>
                    <th></th>
                    <th><h5>Album</h5></th>
                    <th><h5>Artist</h5></th>
                    <th><h5>Duration</h5></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="song in songs" name="{{song.track.id}}">
                    <td class="tableindex">{{$index + 1}}</td>
                    <td>{{song.track.name}}</td>
                    <td><a href={{song.track.external_urls.spotify}} target="_#"><img class="tableplay" src="assets/img/playicon.png"></a></td>
                    <td>{{song.track.album.name}}</td>
                    <td><span ng-repeat="artist in song.track.artists">{{artist.name}} {{$last ? '' : ', '}}</span></td>
                    <td>{{song.track.duration_ms | songTime}}</td>
                </tr>
                </tbody>
            </table>
            <table class="tbl-container" ng-controller="TopSongs">
                <thead>
                <tr>
                    <th></th>
                    <th><h5>Song</h5></th>
                    <th></th>
                    <th><h5>Album</h5></th>
                    <th><h5>Artist</h5></th>
                    <th><h5>Duration</h5></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="song in songs" name="{{song.id}}">
                    <td class="tableindex">{{$index + 1}}</td>
                    <td>{{song.name}}</td>
                    <td><a href={{song.external_urls.spotify}} target="_#"><img class="tableplay" src="assets/img/playicon.png"></a></td>
                    <td>{{song.album.name}}</td>
                    <td><span ng-repeat="artist in song.artists">{{artist.name}} {{$last ? '' : ', '}}</span></td>
                    <td>{{song.duration_ms | songTime}}</td>
                </tr>
                </tbody>
            </table>
            <table class="tbl-container" ng-controller="TopArtists">
                <thead>
                <tr>
                    <th></th>
                    <th><h5>Artist</h5></th>
                    <th></th>
                    <th><h5>Genres</h5></th>
                    <th><h5>Popularity</h5></th>
                    <th><h5>Followers</h5></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="artist in artists" name={{artist.id}}>
                    <td class="tableindex">{{$index + 1}}</td>
                    <td>{{artist.name}}</td>
                    <td><a href={{artist.external_urls.spotify}} target="_#"><img class="tableplay" src="assets/img/playicon.png"></a></td>
                    <td><span ng-repeat="genre in artist.genres">{{genre}} {{$last ? '' : ', '}}</span></td>
                    <td>{{artist.popularity}}</td>
                    <td>{{artist.followers.total}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

</body>

</html>