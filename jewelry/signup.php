<style>
   .btn-default a {
    color: white;
}.btn-default a:hover {
    color: white;
}
    </style>
<?php
$page = basename(__FILE__);
    include('header.php');
    include("connection.php");
?>
<div class="container flex-wrapper" style="">
<div class="content">
<h2>Sign Up &raquo;</h2>
<hr />
<?php
    if(isset($_POST['btnsignup'])) {
        $icno=mysqli_real_escape_string($connection,$_POST['icno']);
        $username=mysqli_real_escape_string($connection,$_POST['username']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);
        $password=md5($password);
        $name=mysqli_real_escape_string($connection,$_POST['name']);
        $gender=mysqli_real_escape_string($connection,$_POST['gender']);
        $dob=mysqli_real_escape_string($connection,$_POST['dob']);
        $address=mysqli_real_escape_string($connection,$_POST['address']);
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $telephone=mysqli_real_escape_string($connection,$_POST['telephone']);
        $shop=mysqli_real_escape_string($connection,$_POST['shop']);
        $level="admin";
        $companytel=mysqli_real_escape_string($connection,$_POST['companytel']);
        $companyadd=mysqli_real_escape_string($connection,$_POST['companyadd']);
        $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
        
        
        $check_icno = $connection->query("SELECT icno FROM user WHERE icno='$icno'");
        $countic = $check_icno->num_rows;
        $check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
        $countun = $check_username->num_rows;
        $check_shop = $connection->query("SELECT * FROM shop WHERE shop_name='$shop'");
        $countsh = $check_shop->num_rows;

        if (($countic==0) && ($countun==0) && ($countsh==0)){
            $query = "INSERT INTO user(icno, username, name, gender, dob, address, telephone, email, password, level,datetime) VALUES('$icno','$username','$name', '$gender', '$dob', '$address', '$telephone', '$email', '$password', '$level','$datetime')";
            
            if ($connection->query($query)) {
                $sql = mysqli_query($connection, "SELECT * FROM user WHERE icno='$icno'"); 
                while($row = mysqli_fetch_assoc($sql)){ $userid = $row['id'];}
                $query1 = "INSERT INTO shop(shop_name, user_id, shop_telephone, shop_address,shop_datetime) VALUES('$shop','$userid', '$companytel', '$companyadd','$datetime')";
                
                if ($connection->query($query1)){
                    $sql1 = mysqli_query($connection, "SELECT * FROM shop WHERE user_id='$userid'"); 
                    while($row = mysqli_fetch_assoc($sql1)){ $shopid = $row['id'];}
                    $update = mysqli_query($connection, "UPDATE user SET shop='$shopid' WHERE id='$userid'");
                    $msg = "<div class='alert alert-success'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered !</div>";
                }
                else{
                    $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry.. Company already exist!</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry.. Username, IC Number already exist!</div>";
        }
        $connection->close();
    }
?>

<!-- Form for collecting member data during signup -->
<form class="form-horizontal" action="" method="post">
<?php

if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
    <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-3">
        <input type="text" name="name" class="form-control"
        placeholder="Name" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">IC No</label>
    <div class="col-sm-3">
        <input type="text" name="icno" class="form-control"
        placeholder="IC No" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Telephone No</label>
    <div class="col-sm-3">
        <input type="text" name="telephone" class="form-control"
        placeholder="Telephone No" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Email</label>
    <div class="col-sm-3">
        <input type="email" name="email" class="form-control"
        placeholder="Email" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-3">
        <select name="gender" class="form-control" required>
            <option value="">- Select Gender -</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Date of Birth</label>
    <div class="col-sm-3">
        <input type="date" name="dob" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-3">
        <textarea name="address" class="form-control"
        placeholder="Address"></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Username</label>
    <div class="col-sm-3">
        <input type="text" name="username" class="form-control"
        placeholder="Username" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Password</label>
    <div class="col-sm-3">
        <input type="password" name="password" class="form-control"
        placeholder="Password" required>
    </div>
</div>
<hr>
<div class="form-group">
    <label class="col-sm-3 control-label">Company Name</label>
    <div class="col-sm-3">
        <input type="text" name="shop" class="form-control" placeholder="Shop Name" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Company Phone No</label>
    <div class="col-sm-3">
        <input type="text" name="companytel" class="form-control"
        placeholder="Company Telephone No" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Company Address</label>
    <div class="col-sm-3">
        <textarea name="companyadd" class="form-control"
        placeholder="Company Address"></textarea>
    </div>
</div>
<input type="hidden" id="datetime" name="datetime">
<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
        <button type="submit" class="btn btn-primary" name="btnsignup">Create Account</button>
        <button class="btn btn-default"><a href="login.php" >Log In Here</a></button>
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