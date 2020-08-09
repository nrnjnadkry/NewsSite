<?php
include ('../../includes/session.php'); 
include ('../../includes/connect.php');
include ('../../includes/constant.php');

$link=linksql();

$n=uniqid();
$title =clean($link,$_POST['title']);
$highlights =clean($link,$_POST['highlights']);
$imagedescription =clean($link,$_POST['imagedescription']);
$description =clean($link,$_POST['description']);
$author =clean($link,$_POST['author']);
$category_id =clean($link,$_POST['category_id']);
$published_date=date('Y-m-d');

$null=null;




    $file= $_FILES['file'];
    
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileext=explode('.',$filename);
    $fileactualext=strtolower(end($fileext));

    $allowed = array('jpg','jpeg','png');    
    $filenamenew = "profile".$n.".".$fileactualext;


          $filedestination= 'Uploads/'.$filenamenew;

          if($filename!=null){
            

    if ($fileerror===0) {
      if ( in_array($fileactualext,$allowed)) {
        if ($filesize < 1000000) {
          
          $test=move_uploaded_file($filetmpname, $filedestination);

          if(isset($test))
          {

          
            
          }
          else
          {
            echo "File not uploaded!";
          }
          
        }
        else
        {
          echo "Your file size is too big";
        }
      }
      else
      {
        echo "You cannot upload this type of file!";
      }
    }
    else
    {
      echo "There was an error uploading your file!";
      echo $fileerror;
    }
  }
  
  
  

if ($title==null || $author==null || $highlights==null || $description==null || $category_id==null) {
  

  redirect($base_url.'modules/news/add_news.php?empty=yes');

 
}
else
{

  if ($filename==null) {
    
$q="INSERT INTO news (title,highlights,description,published_date,author,image,imagedescription,category_id) VALUES ('$title','$highlights','$description','$published_date','$author','$null','$imagedescription','$category_id')";
   if (sqlquery($link,$q)){

   redirect($base_url.'modules/news?insert=success');
  }}
  else{

$q="INSERT INTO news (title,highlights,description,published_date,author,image,imagedescription,category_id) VALUES ('$title','$highlights','$description','$published_date','$author','$filenamenew','$imagedescription','$category_id')";
   if (sqlquery($link,$q)){

   redirect($base_url.'modules/news?insert=success');
   }
 }

}
?>