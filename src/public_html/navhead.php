<?php
session_start();
?>

<div class="row nav-bar noselect">
    <div class="col-6">
        <h4 class= "col stalk-title font-weight-light">
            Stalkify
        </h4>
    </div>
    <div class="row col-6 align-items-center justify-content-end">
        <div class="menu-wrapper">
            <img class="anim-fi img-fluid menu-icon" id="menu-burger" src="assets/img/menuham.png">
            <?php if($_SESSION["state"] !== true): ?>
                <a href="login.php">
                    <img class="anim-fi img-fluid menu-icon" id="menu-power" src="assets/img/pwrbtn.png">
                </a>
            <?php elseif ($_SESSION["state"] == true): ?>
                <a href="http://stalkify.me/songable.php#!/overall">
                    <img class="anim-fi img-fluid menu-icon" id="menu-power" src="assets/img/pwrbtn-g.png">
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row menu-view" id="menu-this" style="display: none">
    <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Home</a>
    <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Friends</a>
    <a href="http://stalkify.me/songable.php#!/overall" class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Stats</a>
    <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Search</a>
    <a href="http://seanliew.me/" class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">About</a>
    <a class="anim-fi menu-item col-lg-2 col-md-3 col-sm-4 text-center">Settings</a>
</div>