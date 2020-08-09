<?php 
include ('../../includes/pageheader.php'); 
      
   $link=linksql();
   $q ="SELECT * FROM news ORDER BY published_date DESC";
   $result=sqlquery($link,$q);
   $num = numrows($result);
   if($num>0)
   {
            
               while ($news =fetch($result)) 
                
               {

  ?>
    <p><b>
      <a href="indpage.php?id=<?php echo $news['id']; ?>" >
    
  <?php 
 
            echo $news['title'];?></a></b><br><br><?php
            echo "By: ".$news['author'];?><?php
            echo ", ".$news['published_date'];?><br><br><?php
            echo $news['highlights'];?><br><br><?php

  ?>
          </p><br><h1></h1><br>
  <?php
               }
   
   }

include ('../../includes/footer.php'); 

 ?>
    



