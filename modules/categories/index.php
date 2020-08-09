<?php
include ('../../includes/session.php');
include ('../../includes/constant.php');
include ('../../includes/header.php');
include ('../../includes/connect.php');
?>
 <h1>Category Manager</h1>
 <?php
   if (isset($_GET['insert'])) {
      echo "Category added successfully!";
    } 
       if (isset($_GET['edit'])) {
      echo "Category edited successfully!";
    }    if (isset($_GET['delete'])) {
      echo "Category deleted successfully!";
    } 
 ?>
 <br><br>
 <div><a href="<?php echo $base_url; ?>/modules/categories/add_category.php" >Add New Category</a></div><br><br>
 <?php 
   $i=0;
   $link=linksql();
   $q ="SELECT * FROM categories ";
   $result=sqlquery($link,$q);
   $num = numrows($result);
   if($num>0)
   {
   		?>
   		<table border="2" align="center">

   			<tr>
          <td><b>S.N.</b></td><td><b>Categories</b></td><td><b>Modify</b></td>
        </tr>
   			<?php 
            
               while ($cat =fetch($result)) {
                $i++;
               	?>
   			     <tr>
                   <td><?php echo $i;; ?></td>
                   <td><?php echo $cat['Categories']; ?></td>
                   <td><a href="<?php echo $base_url; ?>/modules/categories/edit_category.php?id=<?php echo $cat['Id']; ?>" >Edit</a>
                       <a href="<?php echo $base_url; ?>/modules/categories/delete_category.php?id=<?php echo $cat['Id']; ?>" >Delete</a>
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

    echo "No Categories found";
   }
 ?>
<?php
 include ('../../includes/footer.php'); 
?>