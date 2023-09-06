<?php 
include('check_user.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_user.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
?>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery UI library -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<div class="container flex-wrapper" style="">
<div class="content">
    <h2>Vendor Report</h2>
    <hr />
    <?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    
    ?>
    <!--filtering members based on class -->
    <form class="form-inline" method="get" >

    <div class="form-group" >
    <input type="text" id="datepicker" class="form-control"name="filter3" onchange="form.submit()" autocomplete="off" placeholder="Select Month">
    <?php $filter3 = (isset($_GET['filter3']) ? strtolower($_GET['filter3']) : NULL); ?>
    </div>

            <div class="form-group">
            <select name="filter4" class="form-control" onchange="form.submit()">
            <option value="0"> Register by User </option>
            <?php 
            $sqluser = mysqli_query($connection, "SELECT * FROM user WHERE shop='$shop' AND level='admin' OR shop='$shop' and level='manager'");
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

            </form> 
            
            <!--end filter -->
            
            <br />
            <!--start responsive table-->
            <div class="table-responsive" style="">
                <table class="table  table-striped table-hover table-responsive">
                    <tr class="table-header" style="">
                        <th>No</th>
                        <th>Register time</th>
                        <th>Vendor Name</th>
                        <th>Telephone No.</th>
                        <th>Email</th>
                        </tr>
                        <?php

                        if($filter3){$sql = mysqli_query($connection, "SELECT * FROM vendor 
                            WHERE v_datetime LIKE '%$filter3%' AND shop_id = '$shop'");}
    
                            else if($filter4){$sql = mysqli_query($connection, "SELECT * FROM vendor
                            WHERE adminid = '$filter4' AND shop_id = '$shop' ");}

                            else{
                            $sql = mysqli_query($connection, "SELECT * FROM vendor WHERE shop_id = '$shop' "); 
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
                                            echo '<tr class="report"><td>'.$no.'</td><td>'.$row['v_datetime'].'</td><td>'.$row['vendor'].'</td><td>'.$row['telephone'].'</td><td>'.$row['email'].'</td></tr>';
                                            
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