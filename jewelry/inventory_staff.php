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
    <h2>List of Products</h2>
    
    <hr />
    <?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    if(isset($_GET['action']) == 'delete')
    { 
        // if remove button clicked
        $stock_id = $_GET['stock_id']; 
        // get icno value
        $check = mysqli_query($connection, "SELECT * FROM inventory WHERE stock_id='$stock_id'"); 
        // query for selected ic number
        if(mysqli_num_rows($check) == 0)
        {
            // if no icno selected
            echo '<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..
            </div>'; 
            // display message no data found.'
        }
        else
        { 
            // if there are data found
            $delete = mysqli_query($connection, "DELETE FROM inventory WHERE stock_id='$stock_id'");
            // query for removing data
            if($delete)
            { 
                // if delete query succesfull
                echo '<div class="alert alert-primary alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.
                </div>'; 
                // display message data removed'
            }
            else
            { 
                // if delete query unsuccesfull
                echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.
                </div>'; 
                // display message cannot remove data'
            }
        }
    }
    ?>
    <!--filtering members based on class -->
    
            
            <!--end filter -->
            
            <br />
            <!--start responsive table-->
    <div class="table-responsive" id="live_price" style="">

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
    function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("live_price").innerHTML =
        this.responseText;
        }
    };
    xhttp.open("GET", "inventory_server.php", true);
    xhttp.send();
    }

    setInterval(function(){
        loadXMLDoc();
        //1sec
    },1000);

    windows.onload = loadXMLDoc;
</script>
                                