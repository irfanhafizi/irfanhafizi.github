<?php 
include('check_user.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_user.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
?>

<?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["sales_cart"] as $keys => $values)  
           {  
                if($values["stock_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["sales_cart"][$keys]);
                     echo '<script>window.location="sales.php"</script>';  
                }  
           }  
      }  
 }  

 
    ?>

<body>
<div class="container flex-wrapper" style="margin-top:50px; ">
<div class="content">
<h1 class="text-center">Search for Product</h1>
    <form name="search" method="post" action="searchsales.php" role="search" class="form-horizontal" style=""> 
        <div class="input-group input-group-lg" style=""> 
        <input type="text" name="search" placeholder="Search Product by Category" class="form-control "> 
        <span class="input-group-btn">
        <button type="submit" name="submit" id="submit" value="search" class="btn btn-default "data-toggle="tooltip" data-placement="bottom" title="Search Product">Search</button>
        </span>
        </div> 
    </form>
 <br />
    <h2 class="text-center">Customer Sales Purchased List</h2>
    <div class="table-responsive  modal-content" style="">
    <table class="table  table-striped table-hover table-responsive ">
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
            <td><a  class="btn btn-danger btn-md" href="sales.php?action=delete&id=<?php echo $values["stock_id"]; ?>"><span>Remove from List</span></a></td>  
        </tr>
        <?php  
                    $total = $total + $values["price"];
            }  
        ?>  
        <tr class="info">  
            <td colspan="2" align="left" style="font-weight: bold;">Total</td>  
            <td align="left" style="font-weight: bold;">RM <?php echo number_format($total, 2); ?></td>  
            <td><a class="btn btn-primary btn-md" href="order.php">Go to Sales</a></td>  
        </tr>  
        <?php  
        }  else{
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