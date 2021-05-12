<?php
include('server.php');
if(!isset($_SESSION['us']))
{
     header("Location: login.php");
    
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
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php include('header.php');?>
<?php include('sidebar.php');?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span3"> <a href="index.php"> <i class="icon-home"></i>My Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="compose.php"> <i class="icon-plus"></i>Compose</a> </li>
        <li class="bg_ly span3"> <a href="inbox.php"> <i class="icon-envelope"></i>Inbox</a> </li>
        <li class="bg_lo span3"> <a href="sent.php"> <i class="icon-arrow-up"></i>Sent</a> </li>
        <li class="bg_ls span3"> <a href="draft.php"> <i class="icon-save"></i> Draft</a> </li>
        <li class="bg_lo span3"> <a href="spam.php"> <i class="icon-eye-close"></i>Spam</a> </li>
        <li class="bg_ls span3"> <a href="trash.php"> <i class="icon-trash"></i> Trash</a> </li>

      </ul>
    </div>
<!--End-Action boxes-->    


    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-bell"></i></span>
          <h5>Welcome</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
                <h1 style="text-align:center"><b>Welcome To C Mail</b></h1>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <hr/>
  </div>
</div>

<!--end-main-container-part-->

<?php include('footer.php');?>

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 


</body>
</html>
