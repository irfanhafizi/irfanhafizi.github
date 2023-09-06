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
<div class="container flex-wrapper">
<div class="content">
    <h2>Staff Report</h2>
    <hr />
    <?php
    $user_id = $_SESSION['user_id'];
    $shop = $_SESSION['shop'];
    ?>
    <!--filtering members based on class -->
    <form class="form-inline" method="get">
    <div class="form-group" >
    <input type="text" id="datepicker" class="form-control"name="filter3" onchange="form.submit()" autocomplete="off" placeholder="Select Month">
    <?php $filter3 = (isset($_GET['filter3']) ? strtolower($_GET['filter3']) : NULL); ?>
    </div>

            <div class="form-group">
            <select name="filter4" class="form-control" onchange="form.submit()">
            <option value="0"> Registered by User </option>
            <?php 
            $sqluser = mysqli_query($connection, "SELECT * FROM user 
            WHERE shop='$shop' AND level='manager' OR shop='$shop' AND level='admin'");
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
            <select name="filter" class="form-control" onchange="form.submit()">
            <option value="0"> Staff by Gender </option>
            <?php 
            $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  
            ?>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
            </div>

            <div class="form-group">
            <select name="filter2" class="form-control" onchange="form.submit()">
            <option value="0"> Date of Birth </option>
            <?php $filter2 = (isset($_GET['filter2']) ? strtolower($_GET['filter2']) : NULL); ?>
            <option value="-1-">January</option>
            <option value="-2-">February</option>
            <option value="-3-">March</option>
            <option value="-4-">April</option>
            <option value="-5-">May</option>
            <option value="-6-">June</option>
            <option value="-7-">July</option>
            <option value="-8-">August</option>
            <option value="-9-">September</option>
            <option value="-10-">October</option>
            <option value="-11-">November</option>
            <option value="-12-">December</option>
            </select>
            </div>

            <div class="form-group">
            <select name="filter1" class="form-control" onchange="form.submit()">
            <option value="0"> Filter Item by Position </option>
            <?php $filter1 = (isset($_GET['filter1']) ? strtolower($_GET['filter1']) : NULL); ?>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="supervisor">Supervisor</option>
            <option value="worker">Worker</option>
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
                        <th>Username</th>
                        <th>Name</th>
                        <th>IC No.</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Telephone No.</th>
                        <th>Email</th>
                        <th>Position</th>
                        </tr>
                        <?php
                        if($filter){$sql = mysqli_query($connection, "SELECT * FROM user 
                        WHERE gender='$filter' AND shop = '$shop' 
                        ORDER BY name ASC");
                             // query -filter
                            }

                        else if($filter1){$sql = mysqli_query($connection, "SELECT * FROM user 
                        WHERE level='$filter1' AND shop = '$shop' 
                        ORDER BY name ASC");}

                        else if($filter2){$sql = mysqli_query($connection, "SELECT * FROM user 
                            WHERE dob LIKE '%$filter2%' AND shop = '$shop' 
                            ORDER BY name ASC");}

                        else if($filter3){$sql = mysqli_query($connection, "SELECT * FROM user 
                        WHERE datetime LIKE '%$filter3%' AND shop = '$shop'
                        ORDER BY name ASC");}

                        else if($filter4){$sql = mysqli_query($connection, "SELECT * FROM staff
                        JOIN user ON user.id = staff.id
                            WHERE staff.adminid = '$filter4'
                            ORDER BY user.name ASC");}

                        else{
                            $sql = mysqli_query($connection, "SELECT * FROM user 
                            WHERE shop = '$shop' "); 
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
                                            
                                            echo '<tr class="report"><td>'.$no.'</td><td>'.$row['datetime'].'</td><td>'.$row['username'].'</td><td>'.$row['name'].'</td><td>'.$row['icno'].'</td><td>'.$row['gender'].'</td><td>'.$row['dob'].'</td><td>'.$row['address'].'</td><td>'.$row['telephone'].'</td><td>'.$row['email'].'</td><td>'.$row['level'].'</td></tr>';
                                            
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