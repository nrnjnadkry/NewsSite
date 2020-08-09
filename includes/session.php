<?php
session_start();
function redirect($page)
{
	echo '<script type="text/javascript">
	
	window.location ="'.$page.'";
    </script>';
}
  if(!isset($_SESSION['admin']))
  {
     redirect ('http://localhost/Test/Adminlogin/modules/pages/');
  }

?>