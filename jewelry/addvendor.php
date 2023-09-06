<body>
<?php
    include('check_user.php');
    $page = basename(__FILE__);
    include('header_user.php');
    include("connection.php");
    $shop=$_SESSION['shop'];
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Add Vendor &raquo;</h2>
<hr/>
<?php

if(isset($_POST['btnadd'])) {
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $telephone=mysqli_real_escape_string($connection,$_POST['telno']);
    $adminid=$_SESSION['user_id'];
    $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
    
    $check_vendor = $connection->query("SELECT * FROM vendor WHERE vendor='$name'");
    $countvendor = $check_vendor->num_rows;
    
    if ($countvendor==0){
        $query = "INSERT INTO vendor(vendor, email, telephone, adminid, shop_id, v_datetime) VALUES('$name','$email','$telephone', '$adminid', '$shop', '$datetime')"; 
        if ($connection->query($query)) {
            
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Vendor Added...</div>';
            
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot Add Vendor! <a href="index_user.php"><- Back</a></div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Vendor Already Existed! <a href="index_user.php"><- Back</a></div>';
    }
}
if(isset($_GET['action']) == 'delete'){
    $vendor=$_GET['id'];
    $delete = mysqli_query($connection, "DELETE FROM vendor WHERE id='$vendor'");
}
?>
<!-- Form for collecting member data during signup -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
    <label class="col-sm-3 control-label">Vendor Name</label>
    <div class="col-sm-3">
        <input type="text" name="name" class="form-control" placeholder="Vendor Name..." required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Vendor Email</label>
    <div class="col-sm-3">
        <input type="email" name="email" class="form-control"
        placeholder="Vendor Email..." required>
    </div>
</div>
<input type="hidden" id="datetime" name="datetime">
<div class="form-group">
    <label class="col-sm-3 control-label">Vendor Telephone No.</label>
    <div class="col-sm-3">
        <input type="text" name="telno" class="form-control" placeholder="Vendor Telephone Number..." required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-sm btn-primary" name="btnadd"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Add Vendor</button>
    </div>
</div>
</form>
<div class="" style="margin-left: auto;margin-right: auto;width: 50%;">
<table class="table  table-striped table-hover">
<tr class="table-header">
<th>No</th>
<th>Vendor Name</th>
<th>Tool</th>
</tr>
<?php

$sql = mysqli_query($connection, "SELECT * FROM vendor WHERE shop_id = '$shop' "); 
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

echo '<tr class="table-row"><td>'.$no.'</td><td>'.$row['vendor'].'</td>';
echo '<td><a href="addvendor.php?action=delete&id='.$row['id'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['vendor'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
$no++; 
// next number
}
}
?>
</table>
</div>
</div> <!-- /.content -->
</div> <!-- /.container -->
<?php
include('footer.php');
?>
</body>
<script>
	var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	var date_time = current_date+" "+current_time;	
	document.getElementById("datetime").value = date_time;
</script>