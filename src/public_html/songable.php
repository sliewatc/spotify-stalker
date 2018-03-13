
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
    <link href="assets/css/tables.css" rel="stylesheet">
    <link href="assets/css/sidebar.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="assets/js/stalker.js"></script>
</head>
<body>
<?php include('navhead.php'); ?>
<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>
            <li class="cd-label">STATS</li>
            <li class="overview">
                <a href="#">Overview</a>
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
            <table class="tbl-container">
                <thead>
                <tr>
                    <th><h5>Song</h5></th>
                    <th><h5>Artist(s)</h5></th>
                    <th><h5>Genre</h5></th>
                    <th><h5>Duration</h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Google</td>
                    <td>95obgoeiabgoebgo18</td>
                    <td>6369</td>
                    <td>01:32:50</td>
                </tr>
                <tr>
                    <td>Twitter</td>
                    <td>7326</td>
                    <td>104aoebgoeabgga37</td>
                    <td>00:51:22</td>
                </tr>
                <tr>
                    <td>Amazon</td>
                    <td>4162</td>
                    <td>5327</td>
                    <td>00:24:34</td>
                </tr>
                <tr>
                    <td>LinkedIn</td>
                    <td>3654</td>
                    <td>2961</td>
                    <td>00:12:10</td>
                </tr>
                <tr>
                    <td>CodePen</td>
                    <td>2002</td>
                    <td>4135</td>
                    <td>00:46:19</td>
                </tr>
                <tr>
                    <td>GitHub</td>
                    <td>4623</td>
                    <td>3486</td>
                    <td>00:31:52</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

<script src="assets/js/jquery.menu-aim.js"></script>
</body>

</html>