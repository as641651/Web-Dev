<?php

$weather = "";
$city = "";
$error = "";
if($_GET){

  if($_GET["city"]){

      //Remove white spaces (These preprocessings depend on the website)
      $city = str_replace(' ','',$_GET["city"]);

      //Create the url
      $url = "https://www.weather-forecast.com/locations/".$city."/forecasts/latest";

      //Check if URL exits
      $file_headers = @get_headers($url);
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
          $error = "City cannot be found";
      }else{

          $forecast = file_get_contents($url);

          // Inspect the source and split the needed content. Identify the phrase before and after the content
          $left = explode('(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">', $forecast);

          //Check if the source has been changed
          if(sizeof($left) > 1){

            $content = explode('</span></p></td><td colspan="9"><span class="b-forecast__table-description-title">',$left[1]);

            if(sizeof($content) > 1){
              $weather = $content[0];
            }else{
              $error = "Cannot find the information from source";
            }

          }else{
            $error = "Cannot find the information from source";
          }
      }
  }
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

    <title>Weather</title>

    <style type="text/css">

    /*Set a background image that resizes with window */
      body {
        background: url(html/weather-bg.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      #wrapper{
        width: 300px;
        /* auto aligns to center */
        margin: 40px auto 5px auto;
      }

      #weather{
        width: 500px;
        margin: 40px auto 5px auto;
      }


    </style>

  </head>
  <body>

    <div class="container text-center mt-5">
      <h1><strong>What's The Weather?</strong></h1>

      <form>
       <div class="form-group" id="wrapper">
         <label for="city"><h4>Enter the name of a city.</h4></label>
         <!-- Get the value from php to retain the fields after submitting -->
         <input type="text" class="form-control" id="city" placeholder="Eg. Madras" name="city" value="<?php echo $city; ?>">
       </div>
       <button type="submit" class="btn btn-primary mt-3" id="submit" >Submit</button>
     </form>

     <div id="weather">
       <!-- Display the extracted content from php -->
       <?php
          if($weather){
            echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
          }elseif($error){
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
          }
        ?>
     </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>
