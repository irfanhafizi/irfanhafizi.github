<body>
<?php
    include('check_user.php');
    include("connection.php");
    $page = basename(__FILE__);
    include('header_user.php');
    
    $shop = $_SESSION['shop'];
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Company&raquo; <?php  $sqls = mysqli_query($connection, "SELECT * FROM shop WHERE id='$shop'");
$row1 = mysqli_fetch_assoc($sqls); echo $row1['shop_name'];
?></h2>

<hr/>
<?php

        // query for selecting ic number from db
        if(isset($_GET['action']) == 'delete')
            { 
                // if delete button clicked
                $id = $_GET['id'];
                $delete = mysqli_query($connection, "DELETE FROM user WHERE id='$id'"); 
                // query for deleting data based on ic number
                if($delete)
                { 
                    // if query executed successfully
                    echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Staff removed.</div>'; 
                    // display data removed.'
                }
                else
                { 
                    // if query unsuccessfull
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot remove Staff.</div>'; 
                    // display message cannot remove data.'
                }
            }
            if(isset($_POST['update']))
            { // if button Update clicked
                $name = $_POST['name'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                
                $update = mysqli_query($connection, "UPDATE shop SET shop_name='$name', shop_telephone='$tel', shop_address='$address' WHERE id='$shop'") or die(mysqli_error()); // query for update data into database
                if($update)
                { // if query executed successfully
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Update successful...</div>'; // display message data updated successfully.'
                }else{ // if query unsuccessfull
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot update data! <a href="index_user.php"><- Back</a></div>'; // display message data unsuccessfull added!'
                }
            }            
            $sql1 = mysqli_query($connection, "SELECT * FROM shop WHERE id='$shop'");
            $row = mysqli_fetch_assoc($sql1);    
         ?>

<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-xs-3 control-label">Company Name</label>
<div class="col-xs-3">
<input type="text" name="name" class="form-control" value="<?php echo $row ['shop_name']; ?>" placeholder="Name" required>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 control-label">Company Telephone No.</label>
<div class="col-xs-3">
<input type="text" name="tel" class="form-control" value="<?php echo $row ['shop_telephone']; ?>" placeholder="Name" required>
</div>
</div>
<div class="form-group">
<label class="col-xs-3 control-label">Company Address</label>
<div class="col-xs-3">
<textarea name="address" class="form-control" placeholder="Name" required><?php echo $row ['shop_address']; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-3">
<input type="submit" href="" name="update" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update Data">
<a href="inventory.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</form>
                    <br>
                    <h2>Company Staff</h2><hr/>
                    <div class="table-responsive" style="">
                <table class="table  table-striped table-hover table-responsive">
                    <tr class="table-header">
                        <th>No</th>
                        <th>Username</th>
                        <th>IC No</th>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Tools</th>
                        </tr>
                        <?php

                        
                            $sql = mysqli_query($connection, "SELECT * FROM user WHERE shop = '$shop'"); 
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
                                            echo '<tr><td>'.$no.'</td><td>'.$row['username'].'</td><td>'.$row['icno'].'</a></td><td>'.$row['name'].'</td><td>'.$row['telephone'].'</td><td>'.$row['email'].'</td><td>'.$row['level'].'</td><td><a href="update_user.php?userid='.$row['id'].'" title="Update Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a href="company.php?action=delete&id='.$row['id'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                                            $no++; 
                                            // next number
                                            }
                                            }
                                            ?>
                                            </table>
                                        </div> 

                    </div> 
                    
                    <!--/.content -->
                </div> 
                
                <!--/.container -->
                <script>
                $('.datepicker').datepicker({format: 'dd-mm-yyyy',})
                </script>
                <?php 
                include('footer.php');
                ?>
</body>