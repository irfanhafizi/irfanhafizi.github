<body>
<?php
    include('check_user.php');
    $page = basename(__FILE__);
    include('header_user.php');
    include("connection.php");
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Add Product &raquo;</h2>
<hr/>
<?php
    if(isset($_POST['btnadd'])) {
        $user_id = $_SESSION['user_id'];
        $shop= $_SESSION['shop'];
        $itemname=mysqli_real_escape_string($connection,$_POST['itemname']);
        
        $type=mysqli_real_escape_string($connection,$_POST['type']);
        $jewelry=mysqli_real_escape_string($connection,$_POST['jewelry']);
        $purity=mysqli_real_escape_string($connection,$_POST['purity']);
        $weight=mysqli_real_escape_string($connection,$_POST['weight']);
        $charges=mysqli_real_escape_string($connection,$_POST['charges']);
        $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
        $status = "Available";
        $vendor = mysqli_real_escape_string($connection,$_POST['vendor']);
        $kt22 = $_SESSION['22kt'];
        $kt18 = $_SESSION['18kt'];

        if($purity =='916'){
            $price=($weight * $kt22) + (float)$charges;
        }elseif($purity =='750'){
            $price=($weight * $kt18) + (float)$charges;
        }

        $query = "INSERT INTO inventory(user_id,shop, name, type,jewel, purity, weight, charge, datetime,status,vendor_id,price) VALUES('$user_id','$shop','$itemname', '$type','$jewelry', '$purity', '$weight','$charges','$datetime','$status','$vendor','$price')";
        if ($connection->query($query)) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Product Added...</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot Add Product! <a href="index_user.php"><- Back</a></div>';
        }
    }
?>
<!-- Form for collecting member data during signup -->

<form class="form-horizontal" action="" method="post">

<div class="form-group">
    <label class="col-sm-3 control-label">Product Name</label>
    <div class="col-sm-3">
        <input type="text" name="itemname" class="form-control" placeholder="Product Name" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Type of Product</label>
    <div class="col-sm-3">
        <select name="type" class="form-control" required>
            <option value="">- Select Type -</option>
            <option value="New">New</option>
            <option value="Used">Used</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Category of Product</label>
    <div class="col-sm-3">
        <select name="jewelry" class="form-control" required>
            <option value="">- Select Category -</option>
            <?php 
            $shop= $_SESSION['shop'];
            $sqlcat = mysqli_query($connection, "SELECT * FROM category WHERE shop='$shop'");
            if(mysqli_num_rows($sqlcat) == 0){
                echo '<option value="0">No category...</option>';
             }else{
                while($row = mysqli_fetch_assoc($sqlcat)){
                    echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                }
             } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Purity</label>
    <div class="col-sm-3">
        <select name="purity" class="form-control" required>
            <option value="">- Select Purity -</option>
            <option value="916">916</option>
            <option value="750">750</option>
        </select>
    </div>
</div>
<input type="hidden" id="datetime" name="datetime">
<div class="form-group">
    <label class="col-sm-3 control-label">Weight per gram</label>
    <div class="col-sm-3">
        <input type="text" name="weight" class="form-control" placeholder="Item weight" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Making charges</label>
    <div class="col-sm-3">
        <input type="text" name="charges" class="form-control" placeholder="Optional">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Vendor</label>
    <div class="col-sm-3">
        <select name="vendor" class="form-control">
            <option value="">- Select Vendor -</option><?php
            $shop= $_SESSION['shop'];
             $sql1 = mysqli_query($connection, "SELECT * FROM vendor WHERE shop_id='$shop'");
             if(mysqli_num_rows($sql1) == 0){
                echo '<option value="0">No Vendor registered</option>';
             }else{
                while($row = mysqli_fetch_assoc($sql1)){
                    echo '<option value="'.$row['id'].'">'.$row['vendor'].'</option>';
                }
             } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-sm btn-primary" name="btnadd"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Add Product</button>
    </div>
</div>
</form>
</div> <!-- /.content -->
</div> <!-- /.container -->
<?php
include('footer.php');
?>
<script>
	var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	var date_time = current_date+" "+current_time;	
	document.getElementById("datetime").value = date_time;

    
</script>