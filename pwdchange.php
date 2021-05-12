<?php include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
}
$user=$_SESSION['email'];
$od=opendir("Data/$user");
if(isset($_POST['u_change']))
{
    
    $oldpwd=$_POST['oldpwd'];
    $pass1=$_POST['pwd'];
    $pass2=$_POST['pwd2'];
    $oldpwd= md5($oldpwd);
    if(file_exists("Data/$user/$oldpwd")){
    if($pass1===$pass2)
    {
        $password= md5($pass1);
	unlink("Data/$user/$oldpwd");
        $fo=fopen("Data/$user/$password","w");
        if($fo)
        {
            array_push($errors, '<script> type="text/javascript">alert("Password Changed Successfully");</script>');
        }
    }
 else {
        array_push($errors, '<script> type="text/javascript">alert("Two New Password do not match");</script>');
    }
    }
    else {
        array_push($errors, '<script> type="text/javascript">alert("Current Password do not match");</script>');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>C-Mail</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php include('header.php');?>
<?php include('sidebar.php');?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">Change Password</a> </div>
    <h1>Change Password</h1>
  </div>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Password Change</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="#" name="password_validate" id="password_validate" novalidate="novalidate">
               <div class="control-group">
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="oldpwd" required />
                  </div>
                </div>
			   <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="pwd" id="pwd" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm New password</label>
                  <div class="controls">
                    <input type="password" name="pwd2" id="pwd2" required />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Change"  name="u_change" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php';?>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_validation.js"></script>
</body>
</html>
