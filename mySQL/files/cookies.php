<?php

//Set cookie variable $_COOKIE["name"] for 1 min
setcookie("name","value",time() + 60);

//unset cookie : set time in the past
setcookie("name","value",time() - 60);


if(array_key_exists('email',$_COOKIE)){
  echo "You are logged in using cookie! You ll be logged off in 1 min.";
}else{
  header("Location: cookie_email_signin.php");
}

?>
