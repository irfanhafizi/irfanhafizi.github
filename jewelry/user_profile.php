<body>
<?php
    include('check_user.php');
    include("connection.php");
    $page = basename(__FILE__);
    include('header_user.php');
    
?>
<style>
    .btn-warning {
  border-radius: 5px;background-color: #fca146;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px !important;
  font-weight: 600;border:none;
  padding: 10px 20px;color:white;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}.btn-warning:hover {
  border-radius: 5px;background-color:  #fca146;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;font-weight: 600;border:none;
  padding: 10px 20px;color:white;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  opacity:0.5;
}
    </style>
<div class="container flex-wrapper">
<div class="content">
<h2>Administrator Profile &raquo;</h2>
<hr/>
<?php
        $userid = $_SESSION['user_id']; 
        // get selected ic number
        $sql = mysqli_query($connection, "SELECT * FROM user WHERE id='$userid'"); 

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
                    echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data removed.</div>'; 
                    // display data removed.'
                }
                else
                { 
                    // if query unsuccessfull
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot remove data.</div>'; 
                    // display message cannot remove data.'
                }
            }

        if(mysqli_num_rows($sql) == 0)
        {
            header("Location: index_user.php");
        }
        else
        {
            $row = mysqli_fetch_assoc($sql);
            }
            $shop = $row['shop'];
                                  
                        ?>
                        <table class="table table-striped table-condensed">
                            <tr>
                                <th width="20%">IC No</th>
                                <td>
                                    <?php echo $row['icno']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                    <?php echo $row['gender']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>
                                    <?php echo $row['dob']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <?php echo $row['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td>
                                    <?php echo $row['telephone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>
                                    <?php if(($row['level'])=='admin'){echo "Administrator";} ?>
                                </td>
                            </tr>
                        </table>
                        <a href="index_user.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back
                        </a>
                        <a href="update_user.php?userid=<?php echo $row['id']; ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data
                        </a>
                        <a href="index.php?action=delete&id=<?php echo $row['id']; ?>&shop=<?php echo $row['shop']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure remove data belong to <?php echo $row['name']; ?>. Remove the admin will automatically remove all the company\'s data')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Account
                        </a>
                        <a href="password.php" class="btn btn-warning">
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Change Password
                        </a>
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