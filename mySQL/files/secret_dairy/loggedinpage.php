<?php

  session_start();

  if(array_key_exists("id",$_COOKIE)){
    $_SESSION['id'] = $_COOKIE['id'];
  }

  if(array_key_exists("id",$_SESSION)){
    echo "<p>Logged In!</p>";
    echo "session : ".$_SESSION["id"]."<br />";
    echo "cookie : ".$_COOKIE["id"]."<br />";
    echo "<p><a href = 'secret_dairy.php?logout=1'>Log out</a></p>";
  }else{
    header("Location: secret_dairy.php");
  }


?>
