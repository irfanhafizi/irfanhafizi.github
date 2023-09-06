<body>
<?php
    include('check_user.php');
    $page = basename(__FILE__);
    include('header_user.php');
    include("connection.php");
    $shop = $_SESSION['shop'];
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Add New Category &raquo;</h2>
<hr/>
<?php

if(isset($_POST['btnadd'])) {
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $adminid=$_SESSION['user_id'];
    $shop=$_SESSION['shop'];
    $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
    
    $check_category = $connection->query("SELECT * FROM category WHERE category='$name'");
    $countcategory = $check_category->num_rows;
    
    if ($countcategory==0){
        $query = "INSERT INTO category(category, c_user_id, shop, c_datetime) VALUES('$name', '$adminid', '$shop', '$datetime')"; 
        if ($connection->query($query)) {
            
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Category Added...</div>';
            
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot Add Category! <a href="index_user.php"><- Back</a></div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Category Already Existed! <a href="index_user.php"><- Back</a></div>';
    }
}

if(isset($_GET['action']) == 'delete'){
    $category=$_GET['id'];
    $delete = mysqli_query($connection, "DELETE FROM category WHERE id='$category'");
}
?>
<!-- Form for collecting member data during signup -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
    <label class="col-sm-3 control-label">Category Name</label>
    <div class="col-sm-3">
        <input type="text" name="name" class="form-control" placeholder="Category Name..." required>
    </div>
</div>

<input type="hidden" id="datetime" name="datetime">

<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-sm btn-primary" name="btnadd"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Add Category</button>
    </div>
</div>
</form>
</br>
<div class="" style="margin-left: auto;margin-right: auto;width: 50%;">
<table class="table  table-striped table-hover">
<tr class="table-header">
<th>No</th>
<th>Category</th>
<th>Tool</th>
</tr>
<?php

$sql = mysqli_query($connection, "SELECT * FROM category WHERE shop = '$shop' "); 
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

echo '<tr class="table-row"><td>'.$no.'</td><td>'.$row['category'].'</td>';
echo '<td><a href="addcategory.php?action=delete&id='.$row['id'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['category'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
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