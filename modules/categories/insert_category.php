<?php
include ('../../includes/session.php'); 
include ('../../includes/connect.php');
include ('../../includes/constant.php');
$name =$_POST['Categories'];
$q="INSERT INTO categories (Categories) VALUES ('".$name."')";
$link=linksql();
sqlquery($link,$q);
redirect($base_url.'modules/categories?insert=success');
?>