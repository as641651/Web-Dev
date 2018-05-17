<?php

  session_start();

  if(array_key_exists("logout",$_GET)){
    //unset session
    unset($_SESSION["id"]);
    //clear cookies
    setcookie("id","",time()-60*60);
    $_COOKIE["id"] = "";
  }else if(array_key_exists("id",$_SESSION) OR array_key_exists("id",$_COOKIE)){
    //if session or cookie exisits, redirect to login page
    //NOTE session will be destroyed only if the all windows of browser is closed (not tab)
    //cookies get destroyed after a set time, but will exists even after closing browser until then
    header("Location: loggedinpage.php");
  }

  function encrypt($pass,$link){

    $query = "SELECT id FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    $salt = $row['id'];
    $hash = md5(md5($salt).$pass);
    return $hash;
  }


  //CONNECT TO DB
  $servername = "shareddb-i.hosting.stackcp.net";
  $username = "secretdi-333768ab";
  $password = "7k8r4197sf";
  $databasename = $username; //Same in eco webhosting server

  $link = mysqli_connect($servername,$username,$password,$databasename);

  if (mysqli_connect_error()){
    // Stop the script if connection is not established!
    die("There was an error connecting to database");
  }

  $error = "";
  $update = 0;
  if(array_key_exists("submit", $_POST)){

    if(!$_POST['email']){
      $error .= "<p>An email address is required</p>";
    }

    if(!$_POST['password']){
      $error .= "<p>Password is required</p>";
    }

    if($error != ""){
      $error = "<p>There were error(s) in your form : </p>".$error;
    }else{

      if($_POST['signUp'] == '1'){
          //check if email address is taken
          $query = "SELECT id FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
          //echo $query;
          $result = mysqli_query($link,$query);
          if(mysqli_num_rows($result) > 0){
            $error .= "<p>That email address is taken</p>";
          }else{

            //insert email
            $query = "INSERT INTO users (`email`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."')";
            if(mysqli_query($link,$query)){
              $update = 1;
            }else{
              echo mysqli_error($link);
            }

            //encrypt password
            $pass = encrypt($_POST['password'],$link);

            //update password
            $query = "UPDATE users SET password = '".mysqli_real_escape_string($link,$pass)."' WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."'";
            if($out = mysqli_query($link,$query)){
              $update = 2;
            }else{
              echo "<br />".mysqli_error($link);
            }
          }
      }else if($_POST['signUp'] == '0'){

            //check if user exisits
            $query = "SELECT * FROM users WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."'";

            $result = mysqli_query($link,$query);

            if(mysqli_num_rows($result) == 1){

              //Check if password matches
              while($row = mysqli_fetch_array($result)){
                if($row['password'] == encrypt($_POST['password'],$link)){
                  //set session and cookies
                  $_SESSION['id'] = $row['id'];
                  if($_POST['stayLoggedIn'] == 1){
                    //set cookie for 1 min
                    setcookie("id",$row['id'],time() + 60);
                  }
                  //redirect to login page
                  header("Location: loggedinpage.php");
                }else{
                  echo "Wrong password!";
                }
              }
            }else{
              echo "<p>User does not exists</p>";
            }
      }

    }

  }

 ?>

<div id="error">
    <?php
    echo $error;
    if($update == 2){
      echo "Signed up successfully!";
    }
    ?>
</div>

<form method="post">
  <input name="email" type="email" placeholder="Email address" />
  <input name="password" type="password" placeholder="password" />
  <input type="checkbox" name="stayLoggedIn" value=1 />
  <input type="hidden" name="signUp" value="1" />
  <input type="submit" name="submit" value="Sign up!" />
</form>

<form method="post">
  <input name="email" type="email" placeholder="Email address" />
  <input name="password" type="password" placeholder="password" />
  <input type="checkbox" name="stayLoggedIn" value=1 />
  <input type="hidden" name="signUp" value="0" />
  <input type="submit" name="submit" value="Sign in!" />
</form>
