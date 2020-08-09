<?php
include ('../../includes/session.php'); 
include ('../../includes/connect.php');
include ('../../includes/constant.php');
$id=$_GET['id'];
//$name =$_POST['Categories'];
$q="DELETE FROM categories WHERE id=".$id;
$link=linksql();
sqlquery($link,$q);
redirect($base_url.'modules/categories?delete=success');
?>