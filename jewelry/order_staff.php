<?php

//check if user has login
include('check_staff.php'); //check if member logged in
include('header_staff.php'); //load header content for member page
include("connection.php"); // connection to database
$page = basename(__FILE__);
if(isset($_POST['btnadd'])) {
    $userid = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    $orderno=mysqli_real_escape_string($connection,$_POST['order_no']);
	$_SESSION['orderno']=$orderno;
    $note=mysqli_real_escape_string($connection,$_POST['note']);
    $total=mysqli_real_escape_string($connection,$_POST['totalprice']);
	$total = str_replace(',', '', $total);
    $name=mysqli_real_escape_string($connection,$_POST['clientname']);
    $telephone=mysqli_real_escape_string($connection,$_POST['client_telno']);
    $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
    
    foreach($_SESSION["sales_cart"] as $keys => $values)  
	            {
                    $stock_id=$values["stock_id"];
                    $price = $values["price"];
                    $query = "INSERT INTO sales(stock_id,price,shop, order_no, note, totalprice, user_id, clientname, client_telno, sales_datetime) VALUES('$stock_id','$price','$shop','$orderno', '$note', '$total','$userid','$name','$telephone', '$datetime')";
                    $update = mysqli_query($connection, "UPDATE inventory SET status='Sold' WHERE stock_id='$stock_id'");
                    $connection->query($query);
                }
                
                unset($_SESSION['sales_cart']);
				if($query){
					echo "<script>location.href='receipt_staff.php';</script>";
				}
}
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Sales Purchased Detail &raquo;</h2>
<hr />

<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<input type="hidden" name="order_no" id="order_no" >

<input type="hidden" id="datetime" name="datetime">

<div class="form-group">
<label class="col-sm-3 control-label">Product Purchased</label>
<div class="col-sm-5">
<div class=" table-responsive" style="border-radius: 0.5em;">
<table class="table table-responsive" style="">
	<tr class="table-header">
		<th>Product ID</th>
        <th>Product Name</th>
		<th>Product Price</th>
	</tr>
<?php   
    $no=0;
	if(!empty($_SESSION["sales_cart"]))  
	{  
	$total = 0;  
	foreach($_SESSION["sales_cart"] as $keys => $values)  
	{  
?> 
<tr class="report table-row">  
    <td><?php echo $values["stock_id"]; ?></td>  
	<td><?php echo $values["name"]; ?></td>  
	<td>RM <?php echo number_format($values["price"], 2); ?></td> 
</tr>
<?php  
	$total = $total + $values["price"];
    $no++;
    }  
?>  
<tr class="report table-row">  
	<td colspan="2" align="left" style="font-weight: bold;">Total</td>  
	<td align="left" style="font-weight: bold;">RM <?php echo number_format($total, 2); ?></td>  
</tr>  
<?php
    
	}  
?> 
</table>
</div>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Product Quantity</label>
<div class="col-sm-3">
<input type="text" class="form-control" value="<?php echo $no; ?>" placeholder="Quantity" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Total Price</label>
<div class="col-sm-3">
<input type="text" name="totalprice" class="form-control" value="<?php echo number_format($total, 2); ?>" placeholder="Total price">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Customer Name</label>
<div class="col-sm-3">
<input type="text" name="clientname" class="form-control"  placeholder="Required" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Customer Telephone No</label>
<div class="col-sm-3">
<input type="text" name="client_telno"  class="form-control" placeholder="Optional">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Note</label>
<div class="col-sm-3">
<textarea name="note" class="form-control" placeholder="Optional"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<button type="submit" class="btn btn-sm btn-primary" name="btnadd"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Make Receipt</button>
</div>
</div>

</form> <!-- /form -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
	var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	var date_time = current_date+" "+current_time;	
	document.getElementById("datetime").value = date_time;

          // Generate a random 12-digit UPC code
          var upc = Math.floor(100000000000 + Math.random() * 90000000000);
          document.getElementById("order_no").value = upc;
</script>
<?php
include('footer.php');
?>