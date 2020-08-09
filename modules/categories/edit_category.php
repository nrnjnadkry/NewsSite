<?php
include ('../../includes/session.php'); 
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
$id=$_GET['id'];
  $link=linksql();
   $q ="SELECT * FROM categories WHERE Id=".$id;
   $result=sqlquery($link,$q);
   $row=fetch($result);
?>
  <h1>Edit Category</h1>
  <form action="<?php echo $base_url; ?>/modules/categories/update_category.php" method="POST">
  	<input type="hidden" name="id"value="<?php echo $row['Id'] ?>">
  	<label for="ctg">Category Name</label><br>
  	<input type="text" name="Categories" value="<?php echo $row['Categories'] ?>" id="ctg" required><br>
  	<input type="submit" name="submit" value="Save"><br>

  </form>

<?php
 include ('../../includes/footer.php'); 
?>