<?php 
    session_start();
    include ("connection.php");
    $shop= $_SESSION['shop'];
    $page = basename(__FILE__);
    
   

    if(isset($_POST['input'])){
        $input = $_POST['input'];
        $query = "SELECT * FROM inventory JOIN category ON category.id = inventory.jewel WHERE inventory.name LIKE '%$input%'  AND inventory.shop = '$shop' AND inventory.status = 'Available' ORDER BY inventory.name ASC";
        $result = mysqli_query($connection,$query);


        
        if(mysqli_num_rows($result)>0){ ?>
        <div class="table-responsive" style="">
    <table class="table  table-striped table-hover table-responsive">
    <tr class="table-header">
    <th>No</th>
    <th>Product Name</th>
    <th>Type of Product</th>
    <th>Type of Jewelry</th>
    <th>Purity</th>
    <th>Weight(gram)</th>
    <th>Charge</th>
    <th>Product Price</th>
    <th>Action</th>
    </tr>
    <?php
    $sql1 = mysqli_query($connection, "SELECT * FROM gold");
    while($row = mysqli_fetch_assoc($sql1)){
    if($row['purity'] == 916){
    $kt22=$row['price'];
    }else{
    $kt18=$row['price'];
    }
    }
    $no = 1; 
    // start from number 1
    while($row = mysqli_fetch_assoc($result))
    { 
        // fetch query into array
        $weight = $row['weight'];
        $charge = $row['charge'];
        $stock_id = $row['stock_id'];
        if($row['purity'] == 916){
            $price=($weight * $kt22) + $charge;
            $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
        }else{
            $price=($weight * $kt18) + $charge;
            $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
        }
                    ?>
        <form method="" action="">
        <tr>
            <td><?php echo $no ?></td>
            <input type="hidden" name="stock_id" value="<?php echo $row["stock_id"]; ?>" />
            <td><?php echo $row['name']?><input type="hidden" id="prod_name" name="name" value="<?php echo $row["name"]; ?>" /></td>
            <td><?php echo $row['type']?> Jewelry</td>
            <td><?php echo $row['category']?></td>
            <td><?php echo $row['purity']?></td>
            <td><?php echo number_format($row['weight'],2)?></td>
            <td><?php echo number_format($row['charge'],2)?></td>
            <td>RM <?php echo number_format($row['price'],2)?><input type="hidden" name="price" id="prod_price" value="<?php echo $row["price"]; ?>" /></td>
            <td><button type="submit" name="add_to_cart" class="btn btn-sm btn-primary cartbutton" value="<?php echo $row["stock_id"]; ?>" data-toggle="tooltip">Add to Sales</button></td>
        </tr>
        </form>
                    <?php
                    $no++;
    }
        ?>
        
        </table>
    </div> 
<div id="saleslist"></div>
    
        <?php
        }else{
            echo "<h3 class='text-danger text-center mt-3'>No Product Found</h3>";
        }
    }
?>
<script>
    
                   
$('.cartbutton').click(function(e){
        e.preventDefault();

        var prod_id = $(this).val();
        var prod_name = $(this).closest('tr').find('#prod_name').val();
        var prod_price = $(this).closest('tr').find('#prod_price').val();
        //alert(prod_name);

        $.ajax({
                    url:"livecart.php",
                    method:"POST",
                    data:{
                        "id":prod_id,
                        "name":prod_name,
                        "price":prod_price,
                    },
                    success:function(data){
                        $("#saleslist").html(data);
                    }
                });
    })
    </script>

