<?php
  include ('includes/session.php');
   

  unset($_SESSION['admin']);
  //session_destroy(); //destroys all the session
  
  redirect('http://localhost/Test/Adminlogin/modules/pages/');


?>