<?php 
include('check_user.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_user.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
?>

<div class="container flex-wrapper">
<div class="content">
    <h2>Products Report</h2>
    <hr />
    <?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    
    ?>
    <head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery UI library -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
    <!--filtering members based on class -->
    <form class="form-inline" method="get">

    <div class="form-group" >
    <input type="text" id="datepicker" class="form-control"name="filter3" onchange="form.submit()" autocomplete="off" placeholder="Select Month">
    <?php $filter3 = (isset($_GET['filter3']) ? strtolower($_GET['filter3']) : NULL); ?>
    </div>

            <div class="form-group">
            <select name="filter4" class="form-control" onchange="form.submit()">
            <option value="0"> Register by User </option>
            <?php 
            $sqluser = mysqli_query($connection, "SELECT * FROM user WHERE shop='$shop'");
            $filter4 = (isset($_GET['filter4']) ? strtolower($_GET['filter4']) : NULL);  
            if(mysqli_num_rows($sqluser) == 0){
                echo '<option value="0">No User</option>';
             }else{
                while($row = mysqli_fetch_assoc($sqluser)){
                    echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
                }
             } ?>
            </select>
            </div>

            <div class="form-group">
            <select name="filter6" class="form-control" onchange="form.submit()">
            <option value="0"> Register by Vendor </option>
            <?php 
            $sqlven = mysqli_query($connection, "SELECT * FROM vendor WHERE shop_id='$shop'");
            $filter6 = (isset($_GET['filter6']) ? strtolower($_GET['filter6']) : NULL);  
            if(mysqli_num_rows($sqlven) == 0){
                echo '<option value="0">No Vendor...</option>';
             }else{
                while($row = mysqli_fetch_assoc($sqlven)){
                    echo '<option value="'.$row['id'].'">'.$row['vendor'].'</option>';
                }
             } ?>
            </select>
            </div>

        <div class="form-group">
            <select name="filter" class="form-control" onchange="form.submit()">
            <option value="0"> Product by Type </option>
            <?php 
            $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  
            ?>
            <option value="New">New</option>
            <option value="Used">Used</option>
            </select>
            </div>

            <div class="form-group">
            <select name="filter5" class="form-control" onchange="form.submit()">
            <option value="0"> Register by Category </option>
            <?php 
            $sqlcat = mysqli_query($connection, "SELECT * FROM category WHERE shop='$shop'");
            $filter5 = (isset($_GET['filter5']) ? strtolower($_GET['filter5']) : NULL);  
            if(mysqli_num_rows($sqlcat) == 0){
                echo '<option value="0">No category...</option>';
             }else{
                while($row = mysqli_fetch_assoc($sqlcat)){
                    echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                }
             } ?>
            </select>
            </div>

            <div class="form-group">
            <select name="filter2" class="form-control" onchange="form.submit()">
            <option value="0"> Product by Purity </option>
            <?php $filter2 = (isset($_GET['filter2']) ? strtolower($_GET['filter2']) : NULL); ?>
            <option value="916">916</option>
            <option value="750">750</option>
            </select>
            </div>

            <div class="form-group">
            <select name="filter1" class="form-control" onchange="form.submit()">
            <option value="0"> Product by Status </option>
            <?php $filter1 = (isset($_GET['filter1']) ? strtolower($_GET['filter1']) : NULL); ?>
            <option value="Available">Available</option>
            <option value="Sold">Sold</option>
            </select>
            </div>
            
            

            </form> 
            <!--end filter -->
            
            <br />
            <!--start responsive table-->
            <div class="table-responsive" style="">
                <table class="table  table-striped table-hover table-responsive">
                    <tr class="table-header">
                        <th>No</th>
                        <th>Register time</th>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Vendor</th>
                        <th>Type of Product</th>
                        <th>Category</th>
                        <th>Purity</th>
                        <th>Weight</th>
                        <th>Charge</th>
                        <th>Price</th>
                        <th>Status</th>
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

                        if($filter){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.type='$filter' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");
                             // query -filter
                            }
                        else if($filter1){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.status='$filter1' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else if($filter2){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.purity='$filter2' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else if($filter3){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.datetime LIKE '%$filter3%' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else if($filter4){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.user_id = '$filter4' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else if($filter5){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.jewel = '$filter5' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else if($filter6){$sql = mysqli_query($connection, "SELECT * FROM inventory 
                        JOIN category ON category.id = inventory.jewel 
                        JOIN vendor ON vendor.id = inventory.vendor_id
                        WHERE inventory.vendor_id = '$filter6' AND inventory.shop = '$shop' 
                        ORDER BY inventory.name ASC");}

                        else{
                            $sql = mysqli_query($connection, "SELECT * FROM inventory 
                            JOIN category ON category.id = inventory.jewel 
                            JOIN vendor ON vendor.id = inventory.vendor_id
                            WHERE inventory.shop = '$shop' 
                            ORDER BY inventory.name ASC"); 
                            // if no filter
                            }
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
                                            if($row['status'] == 'Available'){
                                            echo '<tr class="report"><td>'.$no.'</td><td>'.$row['datetime'].'</td><td>'.$row['stock_id'].'</td><td>'.$row['name'].'</td><td>'.$row['vendor'].'</td><td>'.$row['type'].' Jewelry</td><td>';
                                            
                                            echo $row['category'];

                                            echo '</td><td>'.$row['purity'].'</td><td>'.number_format($row['weight'],2).'</td><td>RM '.number_format($row['charge'],2).'</td><td>RM '.number_format($row['price'],2).'</td><td style=" color:#33cc33;">'.$row['status'].'</td></tr>';
                                            }else{
                                                echo '<tr class="report"><td>'.$no.'</td><td>'.$row['datetime'].'</td><td>'.$row['stock_id'].'</td><td>'.$row['name'].'</td><td>'.$row['vendor'].'</td><td>'.$row['type'].' Jewelry</td><td>'.$row['category'].'</td><td>'.$row['purity'].'</td><td>'.number_format($row['weight'],2).'</td><td>RM '.number_format($row['charge'],2).'</td><td>RM '.number_format($row['price'],2).'</td><td style=" color:red;">'.$row['status'].'</td></tr>';
                                            }
                                            $no++; 
                                            // next number
                                            }
                                            }
                                            ?>
                                            </table>
                                        </div> 
                                        <!--/.table-responsive -->
                                    </div> 
                                    <!--/.content -->
                                </div> 
                                <!--/.container -->
                                <?php 
                                include('footer.php');
                                ?>
                                </body>
                                <script>
$("#datepicker").datepicker({
    dateFormat: "yy-mm",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    beforeShowDay: function(date) {
        return [false];
    },
    showMonthAfterYear: true,
    showAnim: 'slideDown',
    
    onClose: function(input, inst) {
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        var date = new Date(year, month, 1);
        var monthIndex = date.getMonth() + 1;
        $(this).val(year + "-" + monthIndex);
        $(this).closest("form").submit();
    }
});
</script>