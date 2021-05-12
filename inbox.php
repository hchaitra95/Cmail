<?php include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
}
$user=$_SESSION['email'];
$od=opendir("Data/$user/inbox");

if(isset($_GET['del']))
{
    $del=$_GET['del'];
	copy("Data/$user/inbox/$del","Data/$user/trash/$del");
	unlink("Data/$user/inbox/$del");
}
if(isset($_GET['spam']))
{
    $del=$_GET['spam'];
	copy("Data/$user/inbox/$del","Data/$user/spam/$del");
	unlink("Data/$user/inbox/$del");
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

<!--main-container-part-->
<div id="content">
  <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Inbox</a> </div>
    <h1>Inbox</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-envelope-alt"></i> </span>
            <h5>Recent Mails</h5>
          </div>
        <div class="widget-content nopadding">
              
                  <ul class="recent-posts">
                
       <?php 
       

    $path="Data/$user/inbox";
    $dir = opendir($path);
    $list = array();
    while($file = readdir($dir)){
        if ($file != '.' and $file != '..'){
            $pa=$path.'/'.$file;
            $ctime = date("F d Y H:i:s", filemtime($pa));
            $list[$ctime] = $file;
        }
    }
   closedir($dir);
   krsort($list);
  //print_r($list);
       foreach($list as $f=>$key)
	{
                  
         echo '<li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av2.jpg"> </div>
                <div class="article-post">
                   <div class="fr"><a href="inbox.php?del='.$key.'" class="btn btn-success btn-mini">Trash</a> <a href="inbox.php?spam='.$key.'" class="btn btn-danger btn-mini">Spam</a></div>
                  <span class="user-info">'.$f.'</span>
     
<h5><a href="viewmail.php?option='.$key.'">'.$key.'</a></h5>
              </div> </li>';
	 }
	//}
        ?>
                  </ul>   

          </div>
            
        </div>
       
        
       
      </div>
      
      </div>
    </div>
  </div>
<!--main-container-part-->

<?php include('footer.php');?>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/matrix.js"></script>
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script>  
<script src="js/matrix.tables.js"></script>
</body>
</html>
