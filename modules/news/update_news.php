<?php
include ('../../includes/session.php'); 
include ('../../includes/connect.php');
include ('../../includes/constant.php');

$link=linksql();
$n=uniqid();

$null==null;

$id=$_POST['id'];

$title =clean($link,$_POST['title']);
$highlights =clean($link,$_POST['highlights']);
$description =clean($link,$_POST['description']);
$imagedescription =clean($link,$_POST['imagedescription']);
$author =clean($link,$_POST['author']);
$category_id =$_POST['category_id'];

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

    if (in_array($fileactualext,$allowed)) {
      if ($fileerror===0) {
        if ($filesize < 1000000) {
          
          $test=move_uploaded_file($filetmpname, $filedestination);

          if(isset($test))
          {

          echo "File uploaded";
            
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
        echo "There was an error uploading your file!";
      }
    }
    else
    {
      echo "You cannot upload this type of file";
    }
}
  

if ($title==null || $author==null || $highlights==null || $description==null || $category_id==null) {
    echo "Please fill out the required field";

  
}
else
{
  if ($filename==null) {
  
  $q="UPDATE news  set title='$title',highlights='$highlights', description='$description', author='$author',image='$null',imagedescription='$imagedescription', category_id='$category_id' WHERE id=".$id ;

$res=sqlquery($link,$q);

if(isset($res))
{
  redirect($base_url.'modules/news?edit=success');
 
}else
{
  echo "Query not executed";
}

}
else
{
 
  $q="UPDATE news  set title='$title',highlights='$highlights', description='$description', author='$author',image='$filenamenew',imagedescription='$imagedescription', category_id='$category_id' WHERE id=".$id ;

$res=sqlquery($link,$q);

if(isset($res))
{
  redirect($base_url.'modules/news?edit=success');
 
}else
{
  echo "Query not executed";
}

}
}
?>