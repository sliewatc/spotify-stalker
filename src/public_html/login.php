
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
    <link href="assets/css/authform.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="assets/js/stalker.js"></script>
</head>
<body>
<div class="row align-items-center login-wrap noverflow">
    <div class="register-form c-did">
        <div class="form">
            <div id="signup">
                <h5>Log In</h5>
                <form action="loginex.php" method="post">
                    <div class="field-wrap">
                        <input name="username" placeholder="Username" required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <input name="password" placeholder="Password" type="password" required autocomplete="off"/>
                    </div>
                    <button type="submit" class="button button-block">Go!</button>
                </form>
            </div>
        </div> <!-- /formm -->
    </div>
</div>
</body>

</html>