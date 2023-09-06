<style>

</style>
<?php
$page = basename(__FILE__);
include('connection.php');

session_start();

if(isset($_GET['action']) == 'delete')
            { 
                $userid = $_GET['id'];
                // if delete button clicked
                $delete = mysqli_query($connection, "DELETE FROM user WHERE id='$userid'"); 
                $delete1 = mysqli_query($connection, "DELETE FROM shop WHERE user_id='$userid'");
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
session_destroy(); // Destroying All Sessions

include('header.php');
?>
<!-- Content start here -->
<div class="container flex-wrapper" style=" text-align:center;">
<img src="assets/img/logo.png" width="500px" style="margin:0 auto;">
    <h2>Welcome to JEWELRY MANAGEMENT SYSTEM</h2>
    <h4>The ultimate tool for tracking gold prices and managing your jewelry collection. With real-time gold prices and easy inventory management, you'll always be on top of your game.</h4>
</div>

<?php
    include('footer.php');
?>