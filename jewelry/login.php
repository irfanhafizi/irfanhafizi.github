<style>
</style>
<?php
$page = basename(__FILE__);
session_start();
$error='';
include('header.php'); //load header content for public users
include "connection.php";

if(isset($_POST['btnlogin']))
{
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $passcode = md5($password); // Encrypted Password
    $sql = "SELECT * FROM user WHERE username='$username' and password='$passcode'";
    $query = mysqli_query($connection,$sql);
    $row = $query->fetch_array();
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    if ($count == 1)
    {
        $_SESSION['username']=$row['username'];
        $_SESSION['shop'] = $row['shop'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['level'] = $row['level'];

        if($row['level'] == "admin"){header("Location: index_user.php");}
        elseif($row['level'] == "manager"){ header("Location: index_user.php");}
        else{ header("Location: index_staff.php");}

    }
    else
    {
        $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username or Password is invalid !</div>";
    }
    $connection->close();
}
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Login &raquo;</h2>
<hr />
<!-- Form for collecting member data during login -->
<form class="form-horizontal" action="" method="post">
<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<label class="col-sm-3 control-label">Username</label>
<div class="col-sm-3">
<input type="text" name="username" class="form-control" placeholder="Username" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Password</label>
<div class="col-sm-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label"></label>
<div class="col-sm-3">
<button type="submit" class="btn btn-default" name="btnlogin">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
</button>
</div>
</div>
</form>
</div> <!-- /.content -->
</div> <!-- /.container -->
<?php
include('footer.php');
?>