<body>
<?php
    include('check_staff.php');
    $page = basename(__FILE__);
    include('header_staff.php');
    include("connection.php");
?>
<div class="container flex-wrapper">
<div class="content">
<h2>Change Password &raquo;</h2>
<hr/>
<?php
    if(isset($_POST['change'])){ // if change button clicked
        $id= $_SESSION['user_id'];
        $password = md5($_POST['password']); // assign password with md5 encryption
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        $check = mysqli_query($connection, "SELECT * FROM user WHERE id='$id' AND password='$password'"); // select query ic number and password
        if(mysqli_num_rows($check) == 0){ // if password and ic number match
          echo' <div class="alert alert-danger alert-dismissable"><button
          type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Wrong password. Try again.</div>'; }
          else{if($password1 == $password2){ // if password 1 same as password2
            if(strlen($password1) >= 5){ // minimum 6 character
              $pass = md5($password1); // md5 encrytion
              $update = mysqli_query($connection, "UPDATE user SET password='$pass' WHERE id='$id'"); // query update password
              if($update){ // if update query successful
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password change successful.
                <a href="login.php"><-Login</a></div>'; }
                else{ // if updating failed
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot change password.</div>'; 
                }
            }
                  else{ // if password less than 6
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Minimum password length is 5 character.</div>'; 
                }
            }
                    else{ // if password 1 not same as password 2
                      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password not match</div>'; }
                    }
                }
?>
<!-- Form for collecting member data during signup -->

<form class="form-horizontal" action="" method="post">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Old Password</label>
                        <div class="col-sm-4">
<input type="password" name="password" class="form-control" placeholder="Old Password" required>
</div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label">New Password</label>
  <div class="col-sm-4">
    <input type="password" name="password1" class="form-control" placeholder="New Password" required>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label">Re-enter New Password</label>
  <div class="col-sm-4">
    <input type="password" name="password2" class="form-control" placeholder="Re-enter New Password" required>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label">&nbsp;</label>
  <div class="col-sm-6">
    <input type="submit" name="change" class="btn btn-primary" value="Change" data-toggle="tooltip" title="Change Password">
    <a href="javascript:history.back()" class="btn btn-danger" data-toggle="tooltip" title="Cancel">
      <b>Cancel</b>
    </a>
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