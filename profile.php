<?php include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
}
$user=$_SESSION['email'];
     
$fo=fopen("Data/$user/profile","r");
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
     $fname=$ob[0];
    $lname=$ob[1];
    $email=$ob[2];
     $phone=$ob[3];
  
   
    if(isset($_POST['p_update']))
{
	$finame=$_POST['fname'];
        $laname=$_POST['lname'];
	$call=$_POST['phone'];
        $email=$user;
   

if(strlen($call)!=10)
{
    array_push($errors, '<script> type="text/javascript">alert("Invalid Phone Number");</script>');
}
    if(count($errors)==0)
	{
       
	$fo1=fopen("Data/$user/profile","w");
	$fd=fwrite($fo1,"$finame|$laname|$email|$call");
        if($fd)
        {
	array_push($errors, '<script> type="text/javascript">alert("Updated Successfully");</script>');
	}
              echo "<meta http-equiv='refresh' content='0'>";
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
<?php include('sidebar.php');
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">My Profile</a> </div>
    <h1>Profile</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span10">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>My Profile</h5>
            <a id="add-event" data-toggle="modal" href="#update" class="btn label label-info icon-edit">Update</a></div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <td>First Name</td>
                  <td><?php  print $fname;?></td> 
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><?php  print $lname;?></td> 
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php  print $email;?></td> 
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php  print $phone;?></td> 
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      <div class="modal hide" id="update">
          <form method="post" action="" class="form-horizontal">
              <?php if(isset($_GET['option']))
              {
                  $fname=$_GET['option'];
              }
?>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h3>Update Profile</h3>
                </div>
                <div class="modal-body">
                    
               <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                  <input type="text" value="<?php  print $fname;?>" name="fname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                  <input type="text" value="<?php  print $lname;?>" name="lname" />
              </div>
            </div>
                    <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                  <input type="email" value="<?php  print $email;?>" name="mail" disabled />
              </div>
            </div>
                    <div class="control-group">
              <label class="control-label">Phone :</label>
              <div class="controls">
                  <input type="text" value="<?php  print $phone;?>" name="phone"/>
              </div>
            </div>
                   
                </div>
          <div class="modal-footer"><button type="submit" class="btn btn-primary" name="p_update">Update</button> </div>
      </form>       
      </div>
           
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>

