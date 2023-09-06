<body>
<?php
    include('check_user.php');
    $page = basename(__FILE__);
    include('header_user.php');
    include("connection.php");
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Add Staff &raquo;</h2>
<hr/>
<?php

    if(isset($_POST['btnadd'])) {
        $adminid = $_SESSION['user_id'];
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
        $shop=$_SESSION['shop'];
        $level=mysqli_real_escape_string($connection,$_POST['level']);
        $datetime=mysqli_real_escape_string($connection,$_POST['datetime']);
        
        $check_icno = $connection->query("SELECT icno FROM user WHERE icno='$icno'");
        $countic = $check_icno->num_rows;
        $check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
        $countun = $check_username->num_rows;
        
        if (($countic==0) && ($countun==0)){
            $query = "INSERT INTO user(icno, username, name, gender, dob, address, telephone, email, shop, password, level, datetime) VALUES('$icno','$username','$name', '$gender', '$dob', '$address', '$telephone', '$email', '$shop', '$password', '$level','$datetime')"; 
            if ($connection->query($query)) {
                $sql1 = mysqli_query($connection, "SELECT id FROM user WHERE username='$username'"); 
                $row1 = mysqli_fetch_assoc($sql1);
                $staffid = $row1['id'];
                $query1 = "INSERT INTO staff(id, staff_username, staff_password, adminid,s_datetime) VALUES('$staffid','$username', '$password','$adminid','$datetime')";
                if($connection->query($query1)){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Register Successful...</div>'; // display message data updated successfully.'
                }
                
            } else {
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Cannot Register Staff! <a href="index_user.php"><- Back</a></div>'; // display message data unsuccessfull added!'
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Username Already Existed! <a href="index_user.php"><- Back</a></div>'; // display message data unsuccessfull added!'
        }
        $connection->close();
    }
?>
<!-- Form for collecting member data during signup -->
<form class="form-horizontal" action="" method="post">
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
<input type="hidden" id="datetime" name="datetime">
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
<div class="form-group">
    <label class="col-sm-3 control-label">Staff level</label>
    <div class="col-sm-3">
        <select name="level" class="form-control" required>
            <option value="">- Select Level -</option>
            <option value="manager">Manager</option>
            <option value="supervisor">Supervisor</option>
            <option value="worker">Worker</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-sm btn-primary" name="btnadd"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Add Staff</button>
    </div>
</div>
</form>
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