<?php
  session_start();
  if(isset($_SESSION['admin']))
  {
     redirect ('dashboard.php');
  }
  function redirect($page)
{
	echo '<script type="text/javascript">
	
	window.location ="'.$page.'";
    </script>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin_login</title>

  <link rel="stylesheet" type="text/css" href="stylesheet.css">


  
</head>
<body>
  <?php
   if (isset($_GET['login'])) {
      echo "You have entered wrong username or password.  Please try again!";
    }  
  ?>
  
    <h1>Admin Login</h1><br>
    <form method="POST" action="verify.php">
    	<label for="username">Username : </label>
    	<input type="text" name="username" id="username"><br><br>
    	<label for="pwd">Password : </label>
    	<input type="password" name="password" id="pwd"><br><br>
    	<input type="submit" value="Login" name="submit">

    </form>
</body>
</html>