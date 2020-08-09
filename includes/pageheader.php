<?php
include ('../../includes/pagesession.php'); 
include ('../../includes/constant.php');
include ('../../includes/connect.php');





?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>stylesheet.css">

</head>
<body>
	
  <div style="text-align: left;">
	<a href="<?php echo $base_url; ?>/modules/pages" >Home&nbsp</a>

	<?php 
   $link=linksql();
   $q ="SELECT * FROM categories";
   $result=sqlquery($link,$q);
   $num = numrows($result);
   if($num>0)
   {
               while ($cat =fetch($result)) 
               {
                ?>
                <a href="ctgpage.php?category_id= <?php echo $cat['Id']; ?>" >
                    <?php
                     echo $cat['Categories']; 

                    ?>
                </a>&nbsp


                 <?php
               }
   
   }
 ?>
    </div>

      <h1>THE HEADLINERS</h1>
    <p>
      <?php
       echo date("D,M d,Y"); 
      ?>
    </p><h1></h1><br>