<?php
include ('../../includes/session.php'); 
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
   $link=linksql();
   $q ="SELECT * FROM categories";
   $result=sqlquery($link,$q);
?>


  

  <h1>Add News</h1>

  <?php 
  if(isset($_GET['empty']))
{
  echo "Please fill out the required field!";
}
?>

  <div>
  <form action="<?php echo $base_url; ?>/modules/news/insert_news.php" method="POST" enctype='multipart/form-data' >
  	<label for="ttl">Title</label><br>
  	<input type="text" name="title" id="ttl" required ><br><br>

    <label for="ttl">Author:</label>
    <input type="text" name="author" id="ttl" required >
    &nbsp    &nbsp    &nbsp    &nbsp

    <label for="ctg">Category:</label>
    <select name="category_id" id="ctg" required>
      <option value="">Choose Category</option>
      <?php
          if (numrows($result)>0) {
            while ($row=fetch($result)) 
            {
              ?>
              <option value="<?php echo $row['Id']; ?>"><?php echo $row['Categories']; ?></option> 
              <?php
            }
          }
      ?>
    </select>
    <br><br>

    <label for="img">Cover Image</label><br>
    <input type="file" name="file" id="img" ><br><br>

    <label for="imgdscr">Description for cover image</label><br>
    <textarea name="imagedescription" id="imgdscr" rows="1" cols="150" ></textarea><br><br>

    <label for="hgt">Highlights</label><br>
    <textarea name="highlights" id="hgt" rows="5" cols="150" ></textarea><br>

  	<label for="dsc">Description</label><br>
  	<textarea name="description" id="dsc" rows="10" cols="150"></textarea><br>

  	

  	

  	<input type="submit" name="submit" value="Add" class="btn btn-dark" ><br>

  </form>
  </div>

<?php
 include ('../../includes/footer.php'); 
?>