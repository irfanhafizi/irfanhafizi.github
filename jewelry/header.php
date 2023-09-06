<!-- Header for public unprotected pages -->
<!DOCTYPE html>
<html>
<head>
    <title>SmartJewel</title>
    <link rel="icon" href="assets/img/head.jpg" type="image/jpg">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css" >
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tooltip.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" >
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <style>
.container.flex-wrapper {
    padding-top: 60px;
}
.navbar-brand {
 font-size: 1.5em;
 letter-spacing: 2px;
  line-height: 1;
}body {
  background-image: url('assets/img/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#ffffff;font-weight:500;">
        <div class="navbar-header brand-container">
            <a class="navbar-brand hidden-xs hidden-sm" href="index.php" style="color:#2F4F4F;">SmartJewel.</a>
        </div>
    <div class="container">
            <ul class="nav navbar-nav" >
                <li class="<?php if ($page == "index.php"){echo 'active';} ?>"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="<?php if ($page == "today.php"){echo 'active';} ?>"><a href="today.php"><span class="glyphicon glyphicon-usd"></span> Gold Price</a></li>
                <li class="<?php if ($page == "signup.php"){echo 'active';} ?>"><a href="signup.php" data-toggle="tooltip" data-placement="bottom" title="Sign up"><span class="glyphicon glyphicon-pencil"></span> Sign up</a></li>
                <li class="<?php if ($page == "login.php"){echo 'active';} ?>"><a class="navbar-right" href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
    </div>
</nav>
