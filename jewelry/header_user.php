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
    <link rel="icon" href="assets/img/head.jpg" type="image/jpg">
    <title>SmartJewel</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
        body {
  background-image: url('assets/img/bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<body>
<script>
	var date = new Date();
	document.getElementById("datetime").innerHTML = date;
</script>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#ffffff;font-weight:500;">
    <div class="navbar-header brand-container">
            <a class="navbar-brand hidden-xs hidden-sm" href="index_user.php" style="color:#2F4F4F;">SmartJewel.</a>
        </div>
    <div class="container">
            <ul class="nav navbar-nav" style="color:black;">
                <li class="<?php if ($page == "index_user.php"){echo 'active';} ?>"><a href="index_user.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="<?php if ($page == "today_user.php"){echo 'active';} ?>"><a href="today_user.php" data-toggle="tooltip" data-placement="bottom" title="Today Price"><span class="glyphicon glyphicon-usd"></span> Gold Price</a></li>
                <li class="dropdown <?php if (($page == "inventory.php")or($page == "additem.php")or($page == "addvendor.php")){echo 'active';} ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-gift"></span> Product<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="inventory.php" data-toggle="tooltip" data-placement="bottom">List of Products</a></li>
                    <li><a href="additem.php" data-toggle="tooltip" dataplacement="bottom">Add Product</a></li>
                    <li><a href="addvendor.php" data-toggle="tooltip" dataplacement="bottom">Add Product Vendor</a></li>
                    <li><a href="addcategory.php" data-toggle="tooltip" dataplacement="bottom">Add Product Category</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if (($page == "salesreport.php")or($page == "vendorreport.php")or($page == "categoryreport.php")or($page == "inventoryreport.php") or ($page == "staffreport.php")){echo 'active';} ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-folder-open"></span>  Report <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="salesreport.php" data-toggle="tooltip" data-placement="bottom">Sales Report</a></li>
                    <li><a href="inventoryreport.php" data-toggle="tooltip" dataplacement="bottom">Inventory Report</a></li>
                    <li><a href="staffreport.php" data-toggle="tooltip" dataplacement="bottom">Staff Report</a></li>
                    <li><a href="vendorreport.php" data-toggle="tooltip" dataplacement="bottom">Vendor Report</a></li>
                    <li><a href="categoryreport.php" data-toggle="tooltip" dataplacement="bottom">Category Report</a></li>
                    </ul>
                </li>
                <li class="<?php if ($page == "salestrend.php"){echo 'active';} ?>"><a href="salestrend.php" data-toggle="tooltip" data-placement="bottom" title="Sales Xhart"><span class="glyphicon glyphicon-object-align-bottom"></span> Business Insights</a></li>
                <li class="dropdown <?php if (($page == "company.php")or($page == "addstaff.php")){echo 'active';} ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-list"></span> Company Profile <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="company.php" data-toggle="tooltip" data-placement="bottom">View Profile</a></li>
                    <li><a href="addstaff.php" data-toggle="tooltip" dataplacement="bottom">Add Staff</a></li>
                    
                    </ul>
                </li>
                
                <li class="<?php if ($page == "user_profile.php"){echo 'active';} ?>"><a href="user_profile.php?userid=<?php echo $row['id']; ?>&shop=<?php echo $row['shop']; ?>" data-toggle="tooltip" data-placement="bottom" title="View details"><span class="glyphicon glyphicon-user"></span> View Profile</a></li>                
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
