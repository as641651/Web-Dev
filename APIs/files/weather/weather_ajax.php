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
         <input type="text" class="form-control" id="city" placeholder="Eg. Madras" name="city">
       </div>
       <button type="submit" class="btn btn-primary mt-3" id="submit" >Submit</button>
     </form>

     <div id="weather"></div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $("#submit").click(function(e){
           var city = $("#city").val();
           var apiid = "4c46abf2ea93cc2a53347e603fdc1f0a";
           var url1 = "http://api.openweathermap.org/data/2.5/weather?q="+city+"&appid=" + apiid;

           $.ajax({
             url : url1,
             type: "GET",
             error: function(xhr, status, error) {
               weather = '<div class="alert alert-danger" role="alert"> City not found</div>';
               $("#weather").html(weather);
              }
             }).done(function(data){

                 var encoded_city = data.name + "," + data.sys.country;
                 var temp = data.main.temp - 273.15;
                 var min_temp = data.main.temp_min - 273.15;
                 var max_temp = data.main.temp_max - 273.15;
                 var description = data.weather[0].description;

                 var weather = "<p>The weather in <strong>" + encoded_city + "</strong> is currently :</p>";
                 weather += "<p>"+description+"</p>";
                 weather += "<p> Temp : "+temp+"</p>";
                 weather += "<p> Min Temp : "+min_temp+"</p>";
                 weather += "<p> Max Temp : "+max_temp+"</p>";

                 weather = '<div class="alert alert-success" role="alert">' + weather + '</div>';
                 $("#weather").html(weather);
                 console.log(data);
           });

              //NOTE : AJAX does not work without this, especially when used under "click"!
             e.preventDefault();
        });

    </script>

  </body>
</html>
