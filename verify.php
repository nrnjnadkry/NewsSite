<?php 
session_start();
$link = mysqli_connect("localhost","root","N1r2j3**","loginsystem");
 $un=$_POST['username'];
 $pw=$_POST['password'];
$q = "SELECT * FROM users WHERE user_email LIKE '".$un."' AND user_pwd LIKE '".$pw."'";
$result=mysqli_query($link,$q);
if(mysqli_num_rows($result)>0)
{
  
  $_SESSION['admin']=1;
  redirect ('dashboard.php');
}
else
{

redirect ('index.php?login=unsuccess');

}
function redirect($page)
{
	echo '<script type="text/javascript">
	
	window.location ="'.$page.'";
    </script>';
}
?>
