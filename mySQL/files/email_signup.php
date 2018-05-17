<?php

if(array_key_exists('email',$_POST)){

  //CONNECT TO DB
  $servername = "shareddb-h.hosting.stackcp.net";
  $username = "userdata-3333f633";
  $password = "lifvkvf1ie";
  $databasename = $username; //Same in eco webhosting server

  $link = mysqli_connect($servername,$username,$password,$databasename);

  if (mysqli_connect_error()){
    // Stop the script if connection is not established!
    die("There was an error connecting to database");
  }

  //Checks
  if($_POST['email'] == ''){
    echo "<p>Email address is required</p>";
  }else if($_POST['password'] == ''){
    echo "<p>Password is required</p>";
  }else{
    //check if user exisits in db
    $query = "SELECT 'id' FROM users WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."'";
    $result = mysqli_query($link,$query);

    if(mysqli_num_rows($result) >0){
        echo "<p>That email address has been already taken </p>";
    }else{
      //INSERT DATA
      $query = "INSERT INTO `users` (`email`,`password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";

      if(mysqli_query($link,$query)){
        echo "<p>Sign up successful!</p>";
      }else{
        echo mysqli_error($link);
      }

    }
  }


}


?>

<form method="post">
  <input name="email" type="email" placeholder="Email address" />
  <input name="password" type="password" placeholder="password" />
  <input type="submit" value="Sign up!" />
</form>
