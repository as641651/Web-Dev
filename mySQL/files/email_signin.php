<?php

session_start();

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
    //check if user exisits in db. NOTE : using '' for password wont work!
    $query = "SELECT `password` FROM users WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."'";

    $result = mysqli_query($link,$query);

    if(mysqli_num_rows($result) == 1){

      //Check if password matches
      while($row = mysqli_fetch_array($result)){
        if($row['password'] == $_POST['password']){
          $_SESSION['email'] = $_POST['email'];
          header("Location: session.php");
        }else{
          echo "Wrong password!";
        }
      }
    }else{
      echo "<p>User does not exists</p>";
    }

  }
}


?>

<form method="post">
  <input name="email" type="email" placeholder="Email address" />
  <input name="password" type="password" placeholder="password" />
  <input type="submit" value="Sign in!" />
</form>
