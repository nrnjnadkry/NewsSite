<?php
include ('../../includes/constant.php');
session_start();
  if(!isset($_SESSION['admin']))
  {
?>

     <div style="text-align: right;">
     	<a href="<?php echo $base_url; ?>index.php" >Login</a>
     </div>
<?php
  }
  else
  {
   include ('../../includes/header.php');


    include ('../../includes/footer.php'); 

  }

?>
