<?php include("backend.php") ?>

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

      .container{
        text-align: center;
        width: 500px;
        margin: 150px auto;
      }

      .about{
        margin-bottom: 30px;
      }

      .s1{
         width: 100%;
         padding: 12px 20px;
         margin: 8px 0;
         box-sizing: border-box;
      }

      .s2{
        border: 5px solid #006DD1;
      }

      .s3{
        border: 5px solid green;
      }

      #signin{
        display :none;
      }

    </style>
  </head>
  <body>


    <!-- wrap it up with container class -->
    <div class="container">

        <div class="about">
          <h1><strong>Secret dairy</strong></h1>
          <p><strong>Store your thoughts permanantly and secure!</strong></p>
        </div>

        <!-- wrap the text areas with form-group and add form-control
        use checkbox class
        use btn class
        -->

        <div id="error">
            <?php
            if($error){
              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
            if($update == 2){
              echo '<div class="alert alert-success" role="alert">Signed up successfully! Log in!</div>';
            }
            ?>
        </div>

        <form method="post" id="signup">
          <p style="color:#1043a8;"> <strong>Interested? Sign up now!</strong></p>
          <div class="form-group">
            <input class="form-control s1 s2" name="email" type="email" placeholder="Email address" />
          </div>
          <div class="form-group">
            <input class="form-control s1 s2" name="password" type="password" placeholder="password" />
          </div>
          <input type="hidden" name="signUp" value="1" />
          <div class="form-group">
            <input type="submit" name="submit" value="Sign up!" class="btn btn-primary" />
          </div>
        </form>

        <form method="post" id="signin">
          <div class="form-group">
            <input class="form-control s1 s3" name="email" type="email" placeholder="Email address" />
          </div>
          <div class="form-group">
            <input class="form-control s1 s3" name="password" type="password" placeholder="password" />
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="stayLoggedIn" value=1 id="stayLoggedIn" />
              <strong>Stay Logged in</strong>
            </label>
          </div>
          <div class="form-group">
            <input type="hidden" name="signUp" value="0" />
            <input type="submit" name="submit" value="Sign in!" class="btn btn-success" />
          </div>
        </form>

        <p>
          <a href="#" id="showSignIn" style="color:green;"> <strong>Log in!</strong></a>
        </p>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">

      $("#showSignIn").click(function(){
        $("#signup").toggle();
        $("#signin").toggle();
        $("#error").hide();

        if($("#signup").is(":visible")){
          $(this).html(" <strong>Log in!</strong>");
          $(this).css('color','green');
        }else{
          $(this).html(" <strong>Sign up!</strong>");
          $(this).css('color','#1043a8');
        }
      })

    </script>

  </body>
</html>
