<?php
include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
}
$user=$_SESSION['email'];
if(isset($_GET['edit']))
{
    $ob=array();
    $con=$_GET['edit'];
   $len= strlen($con);
   $i=0;
  
   for($j=0;$j<$len;$j++)
   {
       if($con[$j]!=" ")
       {
            if(!isset($ob[$i]))
        {
            $ob[$i]=NULL;
        }
       $ob[$i].=$con[$j];
       }
       else if($con[$j]===" ")
       {
           $i++;
       }
    
   }
   $m=$ob[0];
   $s=$ob[1];
   $fo=fopen("Data/$user/draft/$con","r");
		
$c=0;
$o=array();
while(!feof($fo))
{
    $f=fgetc($fo);
    if($f!='|')
    {
        if(!isset($o[$c]))
        {
            $o[$c]=NULL;
        }
        $o[$c].=$f;
    }
    else if($f==='|')
    {
        $c++;
    }

}
    $msg=$o[1];
}
if(isset($_POST['d_send']))
{
	$to=$_POST['to'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	if(file_exists("Data/$to"))
	{
	//for recever
	$subj=$user." ".$sub;
	$fo=fopen("Data/$to/inbox/$subj","w");
        $path="Data/$to/inbox/$subj";
	fwrite($fo, date("F d Y H:i:s", filemtime($path))."|".$msg);
	//for sender
	$subj1=$to." ".$sub;
	$fo1=fopen("Data/$user/sent/$subj1","w");
	fwrite($fo1, date("F d Y H:i:s", filemtime($path))."|".$msg);
	array_push($errors, '<script> type="text/javascript">alert("Email Sent Successfully");</script>');
	}
	else
	{
	/*
	$subj=$to." ".$sub."Message Failed";
	$fo=fopen("Data/$user/inbox/$subj","w");
	fwrite($fo,$msg);
	*/
	$subj1=$to." ".$sub."  Message Failed";
	$fo1=fopen("Data/$user/sent/$subj1","w");
	$path="Data/$user/sent/$subj1";
	fwrite($fo1, date("F d Y H:i:s", filemtime($path))."|".$msg);
	array_push($errors, '<script> type="text/javascript">alert("Message Failed");</script>');
        
	}
}
if(isset($_POST['d_save']))
{
        // $od=opendir("Data/$user/draft");
        // unlink("Data/$user/draft/$con");
        $to=$_POST['to'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	$subj=$to." ".$sub;
	$fo=fopen("Data/$user/draft/$subj","w");
	 $path="Data/$user/draft/$subj";
	fwrite($fo, date("F d Y H:i:s", filemtime($path))."|".$msg);
	array_push($errors, '<script> type="text/javascript">alert("Message Saved Successfully");</script>');
        echo "<meta http-equiv='refresh' content='0'>";
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
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php include('header.php');?>
<?php include('sidebar.php');?>

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">Compose</a> </div>
  <h1>Compose Mail</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon icon-plus"> </span>
          <h5>Compose Mail</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">To :</label>
              <div class="controls">
                  <input type="text" class="span11" value="<?php print $m;?>" name="to" autofocus required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Subject :</label>
              <div class="controls">
                  <input type="text" class="span11" value="<?php print $s;?>" name="sub" required />
              </div>
            </div>
       
            <div class="control-group">
              <label class="control-label">Message :</label>
              
              <div class="controls">
                  <textarea class="span11" rows="12" name="msg" placeholder="Enter Message here..."><?php print $msg;?></textarea>
            </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success icon-share-alt" name="d_send"> Send</button>
                <button type="submit" class="btn btn-success icon-save" name="d_save"> Save</button>
            </div>
              
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div></div>
<?php include('footer.php');?>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
