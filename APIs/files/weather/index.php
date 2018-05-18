<?php

$weather = "";
$city = "";
$error = "";
//get the API KEY
$apiid = "4c46abf2ea93cc2a53347e603fdc1f0a";
if($_GET){

  if($_GET["city"]){

    $city = $_GET["city"];

    //urlencode takes care of spaces and nasty characters
    $contents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($city)."&appid=".$apiid);
    $contents = json_decode($contents,true);
    echo "<p>JSON INFO :</p>";
    print_r($contents);
    //see api doc for content details

    if($contents){
      $encode_city = $contents["name"].",".$contents["sys"]["country"];
      $temp = $contents["main"]["temp"] - 273.15; //covert from kelvin to celcius.
      $min_temp = $contents["main"]["temp_min"] - 273.15;
      $max_temp = $contents["main"]["temp_max"] - 273.15;

      $weather = "<p>The weather in <strong>".$encode_city."</strong> is currently :</p>";
      $weather .= "<p>".$contents['weather'][0]['description']."</p>";
      $weather .= "<p> Current Temperature : ".$temp."&deg C</p>";
      $weather .= "<p> Min Temperature: ".$min_temp."&deg C</p>";
      $weather .= "<p> Max Temperature: ".$max_temp."&deg C</p>";
    }else{
      $error = "city not found";
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
        background: url(weather-bg.jpg) no-repeat center center fixed;
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
