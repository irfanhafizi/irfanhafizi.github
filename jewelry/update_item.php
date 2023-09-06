<?php

//check if user has login
include('check_user.php'); //check if member logged in
include('header_user.php'); //load header content for member page
include("connection.php"); // connection to database
$stock_id =  $_GET['stock_id'];
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Update Product Data &raquo;</h2>
<hr />
<?php

if(isset($_POST['update']))
{ // if button Update clicked
    $name = $_POST['name'];
    $type = $_POST['type'];
    $jewel = $_POST['jewel'];
    $purity = $_POST['purity'];
    $weight = $_POST['weight'];
    $charge = $_POST['charge'];
    
    $update = mysqli_query($connection, "UPDATE inventory SET name='$name', type='$type', jewel='$jewel', purity='$purity', weight='$weight', charge='$charge' WHERE stock_id='$stock_id'") or die(mysqli_error()); // query for update data into database
    if($update)
    { // if query executed successfully
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Update successful...</div>'; // display message data updated successfully.'
    }else{ // if query unsuccessfull
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot update data! <a href="index_user.php"><- Back</a></div>'; // display message data unsuccessfull added!'
    }
}
$sqls = mysqli_query($connection, "SELECT * FROM inventory WHERE stock_id='$stock_id'");
$row = mysqli_fetch_assoc($sqls);
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post" >
<div class="form-group">
<label class="col-xs-3 control-label">Product Name</label>
<div class="col-xs-3">
<input type="text" name="name" class="form-control" value="<?php echo $row ['name']; ?>" placeholder="Name" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Type of Product</label>
<div class="col-sm-3">
<select name="type" class="form-control" required>
<option value="">- Select type of gold -</option>
<option <?php if($row['type']=="New") {echo "selected";}?>>New</option>
<option <?php if($row['type']=="Used") {echo "selected";}?>>Used</option> 
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Type of Jewelry</label>
<div class="col-sm-3">
<select name="jewel" class="form-control" required>
<option value="">- Select type of Jewelry -</option>
<?php 
            $shop= $_SESSION['shop'];
            $sqlcat = mysqli_query($connection, "SELECT * FROM category WHERE shop='$shop'");
            if(mysqli_num_rows($sqlcat) == 0){
                echo '<option value="0">No category...</option>';
             }else{
                while($row1 = mysqli_fetch_assoc($sqlcat)){
                    $jewel = $row1['id'];
                    echo '<option ';
                    if($row['jewel']=="$jewel") {echo "selected";}
                    echo ' value="'.$row1['id'].'" >'.$row1['category'].'</option>';
                }
             } ?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Purity of Gold</label>
<div class="col-sm-3">
<select name="purity" class="form-control" required>
<option value="">- Select purity of gold -</option>
<option <?php if($row['purity']=="916") {echo "selected";}?>>916</option>
<option <?php if($row['purity']=="750") {echo "selected";}?>>750</option> 
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Weight of Product</label>
<div class="col-sm-3">
<input type="text" name="weight" value="<?php echo $row ['weight']; ?>" class="form-control" placeholder="Weight of product" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Making charge</label>
<div class="col-sm-3">
<input type="text" name="charge" value="<?php echo $row ['charge']; ?>" class="form-control" placeholder="Making charge">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-3">
<input type="submit" href="update_item.php?stock_id=<?php echo $row['stock_id']?>" name="update" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update Data">
<a href="inventory.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Go Back</a>
</div>
</div>
</form>
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})

</script>
<?php
include('footer.php');
?>