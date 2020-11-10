<?php
  $conn = mysqli_connect('localhost', 'Jubair', '1234', 'blogs');

  if(!$conn){
    echo mysqli_connect_error();
  }
?>