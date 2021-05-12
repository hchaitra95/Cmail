<?php include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
}
$user=$_SESSION['email'];

			if(isset($_GET['option']))
		{
                    $mail=$_GET['option'];
		$fo=fopen("Data/$user/trash/$mail","r");
		
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
     $time=$ob[0];
    $msg=$ob[1];
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
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<?php include('header.php');
include('sidebar.php');?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Trash</a> </div>
    <h1><?php print $mail;?></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-star"></i> </span>
            <h5>Time: <?php print $time;?></h5>
          </div>
          <div class="widget-content"><?php echo $msg;?> </div>
        </div>
      </div>
    </div>
   
    </div>
  </div>

<?php include('footer.php');?>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
</body>
</html>