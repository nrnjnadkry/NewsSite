<?php
include ('../../includes/session.php'); 
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
?>
 <h1>News Manager</h1>
 <?php
   if (isset($_GET['insert'])) {
      echo "News added successfully!";
    } 
       if (isset($_GET['edit'])) {
      echo "News updated successfully!";
    }    if (isset($_GET['delete'])) {
      echo "News deleted successfully!";
    } 
 ?>
 <br><br>
 <div><a href="<?php echo $base_url; ?>/modules/news/add_news.php" >Add New News</a></div><br><br>
 <?php 
   $i=0;
   $link=linksql();
   $q ="SELECT * FROM news ORDER BY published_date DESC";
   $result=sqlquery($link,$q);
   $num = numrows($result);
   if($num>0)
   {
   		?>
   		<table border="2" align="center">

   			<tr>
          <td><b>S.N.</b></td><td><b>Title</b></td><td><b>Modify</b></td>
        </tr>
   			<?php 
            
               while ($news =fetch($result)) {
                $i++;
               	?>
   			     <tr>
                   <td><?php echo $i;; ?></td>
                   <td><?php echo $news['title']; ?></td>
                   <td><a href="<?php echo $base_url; ?>/modules/news/edit_news.php?id=<?php echo $news['id']; ?>">Edit</a>
                       <a href="<?php echo $base_url; ?>/modules/news/delete_news.php?id=<?php echo $news['id']; ?>">Delete</a>
                   </td>
                </tr>
               	<?php
               }
   			?>
   		</table>
   		<?php
   
   }
   else
   {

    echo "No News found";
   }
 ?>
<?php
 include ('../../includes/footer.php'); 
?>