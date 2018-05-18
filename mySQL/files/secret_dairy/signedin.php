<?php

  session_start();

  $loggedin = false;
  $cookie = "";
  $session = "";
  $content = "";

  if(array_key_exists("id",$_COOKIE)){
    $_SESSION['id'] = $_COOKIE['id'];
  }

  if(array_key_exists("id",$_SESSION)){
    //Logged in
    $loggedin = true;
    $session = $_SESSION["id"];
    if(array_key_exists("id",$_COOKIE)){
      $cookie = $_COOKIE["id"];
    }
    //Get the contents in dairy
    include("connection.php");
    $query = "SELECT dairy FROM users WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($link,$query));
    $content = $row['dairy'];
  }else{
    header("Location: index.php");
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Secret Dairy</title>

    <style type="text/css">

      /*Set a background image that resizes with window */
      body {
        background: url(background.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .container-fluid{
        text-align: center;
        height:60vh; /* 80% of browser screen height */

      }

      #dairy{
        height: 100%;
      }

      .n1{
        color: yellow;
        padding-top:2px;
        float:left;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color:#363D42;
        color: white;
        text-align: center;
    }

    </style>
  </head>


  <body>

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
          <a class="navbar-brand" href="#">Secret Dairy</a>

            <div class="ml-auto"> <!-- floats right -->
              <a href='index.php?logout=1'> <button class="btn btn-danger my-2 my-sm-0" type="submit">Log out</button></a>
            </div>
        </nav>

    <div class="container-fluid">

      <!-- Footer -->
      <div class="footer">
        <?php
          echo "<p class='n1'> Session : ".$session."  ";
          echo "   Cookie : ".$cookie." </p>";
        ?>
      </div>

      <h1> My Dairy</h1>

      <textarea class = "form-control mt-5" id="dairy"><?php echo $content; ?></textarea>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- NOTE : jquery script had to be changed for ajax to work!! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">

      $('#dairy').bind('input propertychange', function() {
            //Update database when text area is changed
            //if we dont use ajax, we have to refresh the page everytime for update to happen
            $.ajax({
              method: "POST",
              url: "updateDatabase.php",
              data: { content: $("#dairy").val() }
              //async:false; // will make it work without done, but gets slower
            }).done(function( msg ) {

          });

      });

    </script>

  </body>
</html>
