<?php

//check if user has login
include('check_staff.php'); //check if member logged in
include('header_staff.php'); //load header content for member page
include("connection.php"); // connection to database
$userid = $_SESSION['user_id'];
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Update Profile Data &raquo;</h2>
<hr />
<?php
$sql = mysqli_query($connection, "SELECT * FROM user 
                    JOIN shop ON shop.id = user.shop 
                    WHERE user.id='$userid'"); // query for select member by ic number


if(isset($_POST['update']))
{ // if button Update clicked
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $update = mysqli_query($connection, "UPDATE user SET name='$name', gender='$gender', dob='$dob', address='$address', telephone='$telephone', email='$email' WHERE id='$userid'") or die(mysqli_error()); // query for update data into database
    if($update)
    { // if query executed successfully
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Update successful...</div>';
    }else{ // if query unsuccessfull
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot update data!</div>'; // display message data unsuccessfull added!'
    }
}
$sql1 = mysqli_query($connection, "SELECT * FROM user 
                    JOIN shop ON shop.id = user.shop 
                    WHERE user.id='$userid'");
$row = mysqli_fetch_assoc($sql1);
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-3">
<input type="text" name="icno" class="form-control" value="<?php echo $row['icno']; ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Username</label>
<div class="col-sm-3">
<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-3">
<input type="text" name="name" class="form-control" value="<?php echo $row ['name']; ?>" placeholder="Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-3">
<select name="gender" class="form-control" required>
<option value="">- Select Gender -</option>
<option <?php if($row['gender']=="Male") {echo "selected";}?>>Male</option>
<option <?php if($row['gender']=="Female") {echo "selected";}?>>Female</option> </select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
<div class="col-sm-3">
<input type="text" name="dob" value="<?php echo $row ['dob']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control" placeholder="Address"><?php echo $row['address']; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Telephone No</label>
<div class="col-sm-3">
<input type="text" name="telephone" value="<?php echo $row ['telephone']; ?>" class="form-control" placeholder="Telephone No" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="update" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update Data">
<a href="javascript:history.back()" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</form> <!-- /form -->
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