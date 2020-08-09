<?php
include ('../../includes/session.php'); 
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
$id=$_GET['id'];
   $link=linksql();
   $q ="SELECT * FROM categories";
   $result=sqlquery($link,$q);

   $r ="SELECT * FROM news WHERE id=".$id;

   $res=sqlquery($link,$r);
   $news = fetch($res);

?>
  <h1>Edit News</h1>
  <form action="<?php echo $base_url; ?>/modules/news/update_news.php" method="POST" enctype='multipart/form-data'>
    <input type="hidden" name="id"value="<?php echo $news['id'] ?>">

    <label for="ttl">Title</label><br>
    <input type="text" name="title" value="<?php echo $news['title'] ?>" id="ttl" required><br><br>


    <label for="ttl">Author:</label>
    <input type="text" name="author" id="ttl" value="<?php echo $news['author'] ?>" required>&nbsp &nbsp &nbsp &nbsp

    <label for="ctg">Category:</label>
    <select name="category_id" id="ctg" autocomplete="off" required>
      <option value="">Choose Category</option>
      <?php
          if (numrows($result)>0) {
            while ($row=fetch($result)) 
            {
              ?>
              <option value="<?php echo $row['Id'];?>" <?php if ($news['category_id']==$row['Id']) {echo "selected" ;} ?> > 
                   <?php echo $row['Categories']; ?>   
              </option> 
              <?php
            }
          }
      ?>
    </select>
    <br><br>



    <label for="img">Cover Image</label><br>
    <input type="file" name="file" value="<?php echo $news['image'] ?>" id="img" ><br><br>

    <label for="imgdscr">Description for cover image</label><br>
    <textarea name="imagedescription" id="imgdscr" rows="1" cols="150" ><?php echo $news['imagedescription'] ?></textarea><br><br>

    <label for="hgt">Highlights</label><br>
    <textarea name="highlights" id="hgt" rows="5" cols="150" ><?php echo $news['highlights'] ?></textarea><br>

    <label for="dsc">Description</label><br>
    <textarea name="description" id="dsc" rows="10" cols="150"><?php echo $news['description'] ?></textarea><br>

    

    <input type="submit" name="submit" value="Save"><br>

  </form>

<?php
 include ('../../includes/footer.php'); 
?>