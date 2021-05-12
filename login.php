<?php
session_start();
$errors=array();
if(isset($_POST['u_login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
        $pass= md5($password);
	if(file_exists("Data/$email") && file_exists("Data/$email/$pass"))
	{
	$_SESSION['email']=$email;
        $_SESSION['user']=TRUE;
	header("Location: index.php");
	}
	else
	{
	array_push($errors, '<script> type="text/javascript">alert("Wrong Email/Password Combination");</script>');
	}
	
}
if(isset($_POST['recover']))
{
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    if(file_exists("Data/$mail"))
	{
            $fo=fopen("Data/$mail/profile","r");
		
$i=0;
$ob=array();
while(!feof($fo))
{
    $f=fgetc($fo);
    if($f!='|')
    {
        if(!isset($ob[$i]))
        {
            $ob[$i]=NULL;
        }
        $ob[$i].=$f;
    }
    else if($f==='|')
    {
        $i++;
    }

}
     $oldphone=$ob[3];
     if($phone===$oldphone)
     {
         header("Location: changepass.php?mail=".$mail."");
     }
 else {
         array_push($errors, '<script> type="text/javascript">alert("Wrong Email/Phone Combination");</script>');
     }
	}
        else {
         array_push($errors, '<script> type="text/javascript">alert("Wrong Email/Phone Combination");</script>');
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
            <form class="form-vertical" action="" method="post" id="myform">

                <div class="control-group normal_text"> <h3>C-Mail Login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" placeholder="Email"  name="email" autofocus required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                   <span class="pull-left"><a href="register.php" class="btn btn-info">New User? Register</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success" name="u_login"/> Login</button></span>
                </div>
                 <div class="form-actions">
                     <span class="pull-left"><a id="add-event" data-toggle="modal" href="#recover" class="btn btn-danger">Lost Password?</a></span>
                </div>
            </form>
        </div>
      <div class="modal hide" id="recover">
          <form method="post" action="" class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h3>Recover Password</h3>
                </div>
                <div class="modal-body">
                    
               <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                  <input type="email" placeholder="Email" name="mail" required autofocus />
              </div>
            </div> 
                    <div class="control-group">
              <label class="control-label">Phone :</label>
              <div class="controls">
                  <input type="text" placeholder="Phone" name="phone" required/>
              </div>
            </div>
                </div>
          <div class="modal-footer"><button type="submit" class="btn btn-primary" name="recover">Recover</button> </div>
      </form>       
      </div>
       <script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script> 
		<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
         
  </div>
<?php  endif ?>
    </body>

</html>
