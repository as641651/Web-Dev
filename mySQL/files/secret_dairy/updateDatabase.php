<?php

  session_start(); // To access id

  $update = false;
  if(array_key_exists("content",$_POST)){

    include("connection.php");

    //update
    $query = "UPDATE users SET dairy = '".mysqli_real_escape_string($link,$_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    mysqli_query($link,$query);

    // good enough, but we want update to be as fast as possible 
    // if(mysqli_query($link,$query)){
    //   $update = true;
    // }else{
    //   //echo "<br />".mysqli_error($link);
    //   die("could not save data");
    // }

  }

?>
