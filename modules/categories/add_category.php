<?php
include ('../../includes/session.php'); 
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
?>
  <h1>Add Category</h1>
  <form action="<?php echo $base_url; ?>/modules/categories/insert_category.php" method="POST">
  	<label for="ctg">Category Name</label><br>
  	<input type="text" name="Categories" id="ctg" required><br>
  	<input type="submit" name="submit" value="Add"><br>

  </form>

<?php
 include ('../../includes/footer.php'); 
?>