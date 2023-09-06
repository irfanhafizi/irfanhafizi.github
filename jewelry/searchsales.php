<?php 
include('check_user.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_user.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
$search = "";
if(isset($_POST["search"])){
    $search = $_POST['search'];
}

?>

<body style="background:GhostWhite;">
<div class="container flex-wrapper" style="margin-top:50px ">
<div class="content">

    <h1 class="text-center">Search for Product Category&raquo; <?php echo $search; // ic number ?></h1>
    <form name="search" method="post" action="searchsales.php" role="search" class="form-horizontal" style=""> 
        <div class="input-group input-group-lg" style=""> 
        <input type="text" name="search" placeholder="Search Product by Category" class="form-control "> 
        <span class="input-group-btn">
        <button type="submit" name="submit" id="submit" value="search" class="btn btn-default "data-toggle="tooltip" data-placement="bottom" title="Search Product">Search</button>
        </span>
        </div> 
    </form>
    <hr />
    <?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    
	if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["sales_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["sales_cart"], "stock_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["sales_cart"]);  
                $item_array = array(  
                     'stock_id'               =>     $_GET["id"],  
                     'name'               =>     $_POST["name"],  
                     'price'          =>     $_POST["price"],  
                );  
                $_SESSION["sales_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="searchsales.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'stock_id'               =>     $_GET["id"],  
                'name'               =>     $_POST["name"],  
                'price'          =>     $_POST["price"],
           );  
           $_SESSION["sales_cart"][0] = $item_array;  
      }  
 }  

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["sales_cart"] as $keys => $values)  
           {  
                if($values["stock_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["sales_cart"][$keys]);
                     echo '<script>window.location="searchsales.php"</script>';  
                }  
           }  
      }  
 }  

?>
<!--filtering members based on class -->


<!--end filter -->

<br />
<!--start responsive table-->
<div class="table-responsive" style="">
<table class="table  table-striped table-hover table-responsive">
<tr style="background:LightGray; color:black;">
<th>No</th>
<th>Product ID</th>
<th>Product Name</th>
<th>Type of Product</th>
<th>Type of Jewelry</th>
<th>Purity</th>
<th>Weight per gram</th>
<th>Product Price</th>
<th>Action</th>
</tr>
<?php
$sql1 = mysqli_query($connection, "SELECT * FROM gold");
while($row = mysqli_fetch_assoc($sql1)){
if($row['purity'] == 22){
$kt22=$row['price'];
}else{
$kt18=$row['price'];
}
}

$sql = mysqli_query($connection, "SELECT * FROM inventory JOIN category ON category.id = inventory.jewel WHERE inventory.name LIKE '%$search%'  AND inventory.shop = '$shop' AND inventory.status = 'Available' ORDER BY inventory.name ASC");

// if no filter

if(mysqli_num_rows($sql) == 0)
{ 
echo '<tr><td colspan="14">No data retrieved..</td></tr>';
// if no data retrieved from database
}
else
{ 
// if there are data
$no = 1; 
// start from number 1
while($row = mysqli_fetch_assoc($sql))
{ 
    // fetch query into array
    $weight = $row['weight'];
    $charge = $row['charge'];
    $stock_id = $row['stock_id'];
    if($row['purity'] == 22){
        $price=($weight * $kt22) + $charge;
        $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
    }else{
        $price=($weight * $kt18) + $charge;
        $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
    }

    
            
                ?>
    <form method="post" action="searchsales.php?action=add&id=<?php echo $row["stock_id"]; ?>">
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['stock_id']?><input type="hidden" name="stock_id" value="<?php echo $row["stock_id"]; ?>" /></td>
        <td><?php echo $row['name']?><input type="hidden" name="name" value="<?php echo $row["name"]; ?>" /></td>
        <td><?php echo $row['type']?> Jewelry</td>
        <td><?php echo $row['category']?></td>
        <td><?php echo $row['purity']?>k</td>
        <td><?php echo $row['weight']?></td>
        <td>RM <?php echo number_format($row['price'],2)?><input type="hidden" name="price" value="<?php echo $row["price"]; ?>" /></td>
        <td><input type="submit" name="add_to_cart" class="btn btn-sm btn-primary" value="Add to Sales List" data-toggle="tooltip"></td>
    </tr>
    </form>
                <?php
}
    }
    
    ?>
    
    </table>
</div> 
<!--/.table-responsive -->
<hr>
<h2 class="text-center">Customer Sales Purchased List</h2>
<div class="table-responsive modal-content" style="">
<table class="table  table-striped table-hover table-responsive">
    <tr style="background:LightGray; color:black;">
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Action</th>
    </tr>
    <?php   
    
    if(!empty($_SESSION["sales_cart"]))  
    {  
        $total = 0;  
        foreach($_SESSION["sales_cart"] as $keys => $values)  
        {  
    ?> 
    <tr>  
        <td><?php echo $values["stock_id"]; ?></td>  
        <td><?php echo $values["name"]; ?></td>  
        <td>RM <?php echo number_format($values["price"],2); ?></td>
        <td><a class="btn btn-danger btn-md" href="searchsales.php?action=delete&id=<?php echo $values["stock_id"]; ?>"><span >Remove from List</span></a></td>  
    </tr>
    <?php  
                $total = $total + $values["price"];
        }  
    ?>  
    <tr class="info">  
        <td colspan="2" align="left" style="font-weight: bold;">Total</td>  
        <td align="left" style="font-weight: bold;">RM <?php echo number_format($total, 2); ?></td>  
        <td><a class="btn btn-primary btn-md" href="order.php">Make a Receipt</a></td>  
    </tr>  
    <?php  
    }else{
        echo '<tr><td colspan="14">No data retrieved..</td></tr>';
    }
   
    ?> 
</table>
</div>

</div> 
<!--/.content -->
</div> 
<!--/.container -->
<?php 
include('footer.php');
?>
</body>