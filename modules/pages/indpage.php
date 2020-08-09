<?php
include ('../../includes/pageheader.php'); 
   $id=$_GET['id'];   
  $link=linksql();
   $q ="SELECT * FROM news WHERE id='$id'";
   $result=sqlquery($link,$q);
   $num = numrows($result);
   if($num>0)
   {
            
               while ($news =fetch($result)) 
                
               {

  ?>
    <p><b>
      
    
  <?php 
 
            echo $news['title'];
            
  ?></b><br><br>
  <?php if($news['image']!=null){ ?>
<img src="<?php echo $base_url.'modules/news/Uploads/'.$news['image']; ?>" width='800' height='400'>
  <br>
  <?php 
     echo "File Photo: ".$news['imagedescription'];}
  ?>
  <br><br>
  <?php
            echo "By: ".$news['author'];
            echo ", ".$news['published_date'];
  ?><br><br>
  <?php
            echo $news['description'];
  ?><br><br>


  
          </p><br><h1></h1><br>
  <?php
               }
   
   }

include ('../../includes/footer.php'); 

  ?>
    
