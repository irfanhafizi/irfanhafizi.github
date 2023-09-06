<?php

//check if user has login
include('check_staff.php'); //check if member logged in
include('header_staff.php'); //load header content for member page
include("connection.php"); // connection to database
$page = basename(__FILE__);
$shop = $_SESSION['shop'];
$orderno = $_SESSION['orderno'];
?>
<style>
      .receipt {
        width:300px;
  background-color: #fafafa;
  padding: 20px;
  border: 1px solid #ccc;
  font-family: Arial, sans-serif;
  margin:auto;
}

.receipt-header {
  text-align: center;
  margin-bottom: 20px;
}

.receipt-header h1 {
  margin: 0;
  font-size: 24px;
}

.receipt-header p {
  margin: 0;
  font-size: 14px;
}
.receipt-table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
}

.receipt-table th,
.receipt-table td {
  padding: 10px;
  border: none; /* remove the border */
  text-align: left;
}

.receipt-table th {
  background-color: #fafafa;
  font-weight: bold;
}

.receipt-footer {
  text-align: right;
  margin-top: 20px;
  font-weight: bold;
}

.upc {
  margin-top: 20px;
  text-align: center;
}

.upc .bar {
  height: 10px;
  width: 100%;
  background-color: #ccc;
  margin-bottom: 5px;
}

.upc .code {
  font-size: 16px;
  font-weight: bold;
}@media print {
  /* hide elements on the page that you do not want to print */
  .no-print {
    display: none;
  }.receipt{
    transform: scale(1.5);
  }
}@page {
  size: portrait;
  margin-top: 0cm;
}
    </style>

<div class="container flex-wrapper">
<div class="content">
<?php

?>
<!-- Form for collecting member data -->
<?php
 $sql1 = mysqli_query($connection, "SELECT * FROM shop WHERE id = '$shop'"); 
 $row1 = mysqli_fetch_assoc($sql1);

 $sql2 = mysqli_query($connection, "SELECT * FROM sales WHERE order_no = '$orderno' AND shop = '$shop' LIMIT 1"); 
 $row2 = mysqli_fetch_assoc($sql2);
?>

<div class="receipt">
      <div class="receipt-header">
        <h1><?php echo $row1['shop_name'] ?></h1>
        <p><?php echo $row1['shop_address'] ?></p>
      </div>
      <table class="receipt-table">
  <thead>
    <tr>
      <th style="text-align:left;">Name</th>
      <th style="text-align:right;">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php $sql = mysqli_query($connection, "SELECT * FROM sales 
      JOIN inventory ON inventory.stock_id = sales.stock_id
      WHERE sales.shop = '$shop' AND sales.order_no = '$orderno'"); 

      if(mysqli_num_rows($sql) == 0)
      { 
          echo '<tr><td colspan="14">Error..</td></tr>';
          }else{
            $no = 1;
            while($row = mysqli_fetch_assoc($sql)){
              ?>
              <tr>
              <td style="text-align:left;"><?php echo $row['name']; ?></td>
<td style="text-align:right;">RM <?php echo number_format($row['price'],2) ?></td>
              </tr>
              <?php
              $no++;  
            }
    }
    ?>
  </tbody>
</table>
      <div class="receipt-footer">
        <p>Total: RM <?php echo number_format($row2['totalprice'],2) ?></p>
      </div>
      
      <div class="upc">
      <div class="bar"></div>
      <div class="code">
        <?php echo $orderno ?>
      </div>
      <div class="bar"></div>
    </div>
    </div><br>
    <button class="btn btn-primary " style="display: block; margin: 0 auto;"onclick="printReceipt()"><span class="no-print">Print Receipt</span></button>
</div> <!-- /.content -->
</div> <!-- /.container -->

<script>
	var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	var date_time = current_date+" "+current_time;	
	document.getElementById("datetime").value = date_time;
  function printReceipt() {
  window.print();
}
</script>
<?php
include('footer.php');
?>