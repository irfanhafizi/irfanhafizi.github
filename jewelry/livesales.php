<?php 
    session_start();
    include ("connection.php");
    $shop= $_SESSION['shop'];
    $page = basename(__FILE__);

    
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["sales_cart"] as $keys => $values)  
           {  
                if($values["stock_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["sales_cart"][$keys]);
                }  
           }  
      }  
 }  
    
    if(!empty($_SESSION["sales_cart"]))  
    {  ?>
        
    <h2 class="text-center">Customer Sales Purchased List</h2><hr>
    <div class="table-responsive modal-content">
    <table class="table  table-striped table-hover table-responsive">
    <tr class="table-header">
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Action</th>
    </tr>
    <?php
        $total = 0;  
        $no = 0;
        foreach($_SESSION["sales_cart"] as $keys => $values)  
        {  $no++;
    ?> 
    <tr class="report table-row">  
        <td><?php echo $no; ?></td>  
        <td><?php echo $values["name"]; ?></td>  
        <td>RM <?php echo number_format($values["price"],2); ?></td>
        <td><a class="btn btn-danger btn-md" href="sales_staff.php?action=delete&id=<?php echo $values["stock_id"]; ?>"><span >Remove from List</span></a></td>  
    </tr>
    <?php  
                $total = $total + $values["price"];
        }  
    ?>  
    <tr class="report">  
        <td colspan="2" align="left" style="font-weight: bold;">Total</td>  
        <td  style="font-weight: bold;text-align:center;">RM <?php echo number_format($total, 2); ?></td>  
        <td style="text-align:center;"><a class="btn btn-primary btn-md" href="order_staff.php">Make a Receipt</a></td>  
    </tr>  
    <?php  
    }
   
    ?> 
</table>
</div>
