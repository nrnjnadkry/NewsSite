<?php
  function linksql()
  {
  	return mysqli_connect("localhost","root","N1r2j3**","loginsystem");
  } 
  function sqlquery($link,$q)
  {
  	return mysqli_query($link,$q);
  }
  function numrows($result)
  {
    return mysqli_num_rows($result);
  }
  function fetch($result)
  {
    return mysqli_fetch_assoc($result);
  }
  function clean($link,$value)
  {
    return mysqli_real_escape_string($link,$value);
  }
?>