<?php
include('check_staff.php'); 
$page = basename(__FILE__);
include('header_staff.php');
include('goldprice.php');

$kt22 = mysqli_query($connection, "SELECT * FROM gold WHERE purity = '916'");
$row22 = mysqli_fetch_assoc($kt22);
$kt18 = mysqli_query($connection, "SELECT * FROM gold WHERE purity = '750'");
$row18 = mysqli_fetch_assoc($kt18);
$purity22 = $row22['price'];
$purity18 = $row18['price'];
$_SESSION['22kt']=$purity22;
$_SESSION['18kt']=$purity18;
?>
<!-- Content start here -->
<div class="container flex-wrapper" style=" text-align:center;">
<img src="assets/img/logo.png" width="500px" style="margin:0 auto;">
    <h2>Welcome to SmartJewel</h2>
    <h4>The ultimate tool for tracking gold prices and managing your jewelry collection. With real-time gold prices and easy inventory management, you'll always be on top of your game.</h4>
</div>
<?php
    include('footer.php');
?>