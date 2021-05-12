<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2019 &copy; C-Mail. Designed by : Chaithra Hombady alias Kulli</div>
</div>
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
         
  </div>
<?php  endif ?>
<!--end-Footer-part-->