<?php 
  
  include('./config/db_config.php');

  if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM `blogs` WHERE `id` = $id_to_delete";

    if(mysqli_query($conn, $sql)){
      header("Location: index.php");
    }else {
      echo mysqli_connect_error($conn);
  }
  }
  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM blogs WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $blog = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./templates/header.php')?>
</head>
<body>
  <?php if($blog):?>
  <h1><?php echo $blog['title'];?></h1>
  <h3><?php echo $blog['email'];?></h3>
  <p><?php echo $blog['body'];?></p>

  <form action="details.php" method = 'POST'>
    <input type="hidden" name = "id_to_delete" value ="<?php echo $blog['id'];?>">
    <input type="submit" name = "delete" value = "delete">

  </form>
  <?php endif ?>
  <a href="index.php">Home</a>
</body>
</html>