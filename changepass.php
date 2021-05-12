<?php
$errors=array();
if(isset($_GET['mail']))
{
    $email=$_GET['mail'];
}
if(isset($_POST['p_change']))
{
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    if($pass1===$pass2)
    {
        $password= md5($pass1);
    $od=opendir("Data/$email");
    while($file= readdir($od))
    {
        if($file!="profile")
        {
            unlink("Data/$email/$file");
            $fo=fopen("Data/$email/$password","w");
    if($fo)
    {
    header("Location:login.php");
    }
    else
    {
        array_push($errors, '<script> type="text/javascript">alert("Failed...");</script>');
    }
        }
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
            <form class="form-vertical" action="" method="post" id="myform">

                <div class="control-group normal_text"> <h3>Change Password</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-lock"> </i></span><input type="password" placeholder="Password"  name="pass1" autofocus required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Confirm Password" name="pass2" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success" name="p_change"/> Change</button></span>
                </div>
             
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
