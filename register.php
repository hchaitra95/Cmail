<?php $errors=array();
if(isset($_POST['u_register']))
{
	$fname=$_POST['fname'];
        $lname=$_POST['lname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pass1=$_POST['password_1'];
	$pass2=$_POST['password_2'];
         if($pass1 != $pass2)
    {
        array_push($errors, '<script> type="text/javascript">alert("Two Passwords do not match");</script>');
    }
	$regexemail="/^([a-z0-9_\-\.]+)@(cmail)\.com$/";
if(!preg_match($regexemail, $email)){
     array_push($errors, '<script> type="text/javascript">alert("Invalid Email");</script>');
}
if(strlen($phone)!=10)
{
    array_push($errors, '<script> type="text/javascript">alert("Invalid Phone Number");</script>');
}
    if(count($errors)==0)
    {
    if(file_exists('Data/$email'))
	{
	array_push($errors, '<script> type="text/javascript">alert("User Already Exists");</script>');
	}
	else
	{
	mkdir("Data/$email");
	mkdir("Data/$email/inbox");
	mkdir("Data/$email/sent");
	mkdir("Data/$email/draft");
	mkdir("Data/$email/spam");
	mkdir("Data/$email/trash");
	$password= md5($pass1);
	$fo=fopen("Data/$email/$password","w");
	$fo1=fopen("Data/$email/profile","w");
	fwrite($fo1,"$fname|$lname|$email|$phone|");
	array_push($errors, '<script> type="text/javascript">alert("Registered Successfully... Please Login");</script>');
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>C-Mail</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
         
        <div id="loginbox">            
            <form class="form-vertical" action="" method="post">
				 <div class="control-group normal_text"> <h3>C-Mail Register</h3><!--<h3><img src="img/logo.png" alt="Logo" /></h3>--></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="First Name" name="fname" autofocus required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Last Name" name="lname" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                 <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="example@cmail.com" name="email" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-phone"> </i></span><input type="tel" placeholder="Phone" name="phone" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password_1" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Confirm Password" name="password_2" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                   <span class="pull-left"><a href="login.php" class="btn btn-info">Already Registered? Login</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success" name="u_register"/>Register</button></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
		<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
         
  </div>
<?php  endif ?>
    </body>

</html>
