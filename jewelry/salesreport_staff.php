<?php 
include('check_staff.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_staff.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
?>

<div class="container flex-wrapper">
<div class="content">
    <h2>Sales Report</h2>
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
            <select name="filter6" class="form-control" onchange="form.submit()">
            <option value="0"> Product Sales by Vendor </option>
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
            <option value="0"> Product Sales by Type </option>
            <?php 
            $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  
            ?>
            <option value="New">New</option>
            <option value="Used">Used</option>
            </select>
            </div>

            <div class="form-group">
            <select name="filter5" class="form-control" onchange="form.submit()">
            <option value="0"> Product Sales by Category </option>
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
            <option value="0"> Product Sales by Purity </option>
            <?php $filter2 = (isset($_GET['filter2']) ? strtolower($_GET['filter2']) : NULL); ?>
            <option value="916">916</option>
            <option value="750">750</option>
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
                        <th>Sales time</th>
                        <th>Sales ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Purity</th>
                        <th>Weight</th>
                        <th>Charge</th>
                        <th>Sales Price</th>
                        <th>Customer Name</th>
                        </tr>
                        <?php

                        if($filter){$sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            WHERE inventory.type='$filter' AND sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY inventory.name ASC");
                                 // query -filter
                                }
    
                            else if($filter2){$sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            WHERE inventory.purity='$filter2' AND sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY inventory.name ASC");}
    
                            else if($filter3){$sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            WHERE sales.sales_datetime LIKE '%$filter3%' AND sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY sales.sales_datetime ASC");}
    
                            else if($filter5){$sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            WHERE inventory.jewel = '$filter5' AND sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY inventory.name ASC");}

                            else if($filter6){$sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            JOIN vendor ON vendor.id = inventory.vendor_id
                            WHERE inventory.vendor_id = '$filter6' AND sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY inventory.name ASC");}

                            else{
                            $sql = mysqli_query($connection, "SELECT * FROM sales 
                            JOIN inventory ON inventory.stock_id = sales.stock_id
                            WHERE sales.shop = '$shop' AND sales.user_id='$user_id'
                            ORDER BY sales.sales_datetime ASC"); 
                            }
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
                                            echo '<tr class="report"><td>'.$no.'</td><td>'.$row['sales_datetime'].'</td><td>'.$row['order_no'].'</td><td>'.$row['stock_id'].'</td><td>'.$row['name'].'</td>
                                            <td>'.$row['purity'].'</td><td>'.number_format($row['weight'],2).'</td><td>'.number_format($row['charge'],2).'</td><td>RM '.number_format($row['price'],2).'</td><td>'.$row['clientname'].'</td></tr>';
                                            
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