<?php
include ('../../includes/session.php'); 
include ('../../includes/connect.php');
include ('../../includes/constant.php');
$id=$_POST['id'];
$name =$_POST['Categories'];
$q="UPDATE categories  set Categories='".$name."' WHERE id=".$id ;
$link=linksql();
sqlquery($link,$q);
redirect($base_url.'modules/categories?edit=success');
?>