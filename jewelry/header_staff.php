<!-- Header for public unprotected pages -->
<?php
include ("connection.php");
$userid = $_SESSION['user_id'];
 $sql = mysqli_query($connection, "SELECT * FROM user WHERE id='$userid'"); 
 $row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>SmartJewel</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tooltip.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" >
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });

    </script>
</head>
<script>
	var date = new Date();
	document.getElementById("datetime").innerHTML = date;
</script>
<style>
        body {
  background-image: url('assets/img/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
<!-- top navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#ffffff;font-weight:500;">
    <div class="navbar-header brand-container">
            <a class="navbar-brand hidden-xs hidden-sm" href="index_staff.php" style="color:#2F4F4F;">SmartJewel.</a>
        </div>
    <div class="container">
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" style="color:black;">
                <li class="<?php if ($page == "index_staff.php"){echo 'active';} ?>"><a href="index_staff.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="<?php if ($page == "today_staff.php"){echo 'active';} ?>"><a href="today_staff.php" data-toggle="tooltip" data-placement="bottom" title="Today Price"><span class="glyphicon glyphicon-usd"></span> Gold Price</a></li>
                <li class="<?php if ($page == "inventory_staff.php"){echo 'active';} ?>"><a href="inventory_staff.php" data-toggle="tooltip" data-placement="bottom" title="Product Inventory"><span class="glyphicon glyphicon-gift"></span> Product Inventory</a></li>
                <li class="<?php if (($page == "sales_staff.php")or ($page == "order_staff.php")or($page == "receipt_staff.php") ){echo 'active';} ?>"><a href="sales_staff.php" data-toggle="tooltip" data-placement="bottom" title="Sales"><span class="glyphicon glyphicon-tag"></span> Sales</a></li>
                <li class="<?php if (($page == "salesreport_staff.php")){echo 'active';} ?>"><a href="salesreport_staff.php" data-toggle="tooltip" data-placement="bottom" title="Sales Report"><span class="glyphicon glyphicon-folder-open"></span> Sales Report </a></li>
                <li class="<?php if ($page == "staff_profile.php"){echo 'active';} ?>"><a href="staff_profile.php?userid=<?php echo $row['id']; ?>&shop=<?php echo $row['shop']; ?>" data-toggle="tooltip" data-placement="bottom" title="View Profile"><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
            </ul>
        </div>
    </div>
    
    <div class="container">
<div class="pull-left">
Welcome, <i><?php echo $_SESSION['username']; ?></i>
</div>
<div class="pull-right">
<a class="navbar-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>
</div>
</nav>
</body>
</html>
