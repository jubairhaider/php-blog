<?php 
include('./config/db_config.php');
$email = $title = $body = '';
$errors = ['email'=>'', 'title'=>'', 'body'=>''];

if(isset($_POST['submit'])){
  if(empty($_POST['email'])){
    $errors['email'] = "An email is necessary";
  }else {
    $email = $_POST['email'];
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Invalid email';
    }
  }
  if(empty($_POST['title'])){
    $errors['title'] = "A title is necessary";
  }else {
    $title = $_POST['title'];
    
    
  }
  if(empty($_POST['body'])){
    $errors['body'] = "A Body is necessary";
  }else {
    $body = $_POST['body'];
    
    
  }

  if(array_filter($errors)){

  }else {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $sql = "INSERT INTO blogs(title,email,body) VALUES('$title', '$email', '$body')";

    if(mysqli_query($conn, $sql)){
      header('Location: index.php');
    }else {
      echo mysqli_error($conn);
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('./templates/header.php')?>
<body>
  <h1>Add a blog</h1>
  <a href="index.php">Go home</a>
  <form action="add.php" method = 'POST'>
    <div class="email-form">
    <label for="email">Email:</label>
    <input type="text" name ="email" value = '<?php htmlspecialchars($email)?>'>
    <p><?php echo $errors['email'];?></p>
    </div>
    <div class="title-form">
    <label for="title">Title:</label>
    <input type="text" name ="title" value = '<?php htmlspecialchars($title)?>'>
    <p><?php echo $errors['title'];?></p>
    </div>
    <div class="email-form">
    <label for="body">Body:</label>
    <input type="text" name ="body" value = '<?php htmlspecialchars($body)?>'>
    <p><?php echo $errors['body'];?></p>
    </div>

    <input type="submit" value = "submit" name = 'submit'>
    

  </form>
</body>
</html>