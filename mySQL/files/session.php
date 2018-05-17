<?php

  session_start();

  //This variable will exisit even if we remove this line and refresh the page
  //$_SESSION['username'] = 'aravind';
  //echo $_SESSION['username'];

  if(array_key_exists('email',$_SESSION)){
    echo "You are logged in!";
  }else{
    header("Location: email_signin.php");
  }

?>
