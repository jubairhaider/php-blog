<?php 
  include('./config/db_config.php');


  $sql = "SELECT * FROM blogs ORDER BY id";

  $result = mysqli_query($conn, $sql);

  $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

  

  mysqli_free_result($result);
  
  mysqli_close($conn);

  
?>


<!DOCTYPE html>
<html lang="en">
<?php include('./templates/header.php') ?>
<body>
  <h1>Blogs</h1>
  
  <a href="add.php">Create</a>
  <?php foreach($blogs as $blog) {?>
    <h3><?php echo $blog['title']; ?></h3>
    <h3><?php echo $blog['email']; ?></h3>
    <a class="brand-text" href="details.php?id=<?php echo $blog['id'] ?>">more info</a>

  <?php } ?>
  
  
</body>
</html>