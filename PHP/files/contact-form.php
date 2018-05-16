<?php

 //No variable def inside if statement
 $error = "";
 $successMsg = "";

 if($_POST){


     print_r($_POST);

    // Server side validation (This should be done irrespective of javascript validation, which can be hacked)


      if(!$_POST["email"]){
        //Appending string to a variable
        $error .= "An email address is required <br />";
      }else{
      //Check for valid email address
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $error .= "Email address is not valid <br />";
      }}

      if(!$_POST["subject"]){
        $error .= "Subject is required <br />";
      }

      if(!$_POST["msg"]){
        $error .= "Message is required <br />";
      }

      //Print status
      if($error != ""){
        $error = "<div class=\"alert alert-danger\" role=\"alert\">".$error."</div>";
      }else{
        //Send email
        $emailTo = "aravindsankaran22@gmail.com";
        $subject = $_POST["subject"];
        $body = $_POST["msg"];
        $headers = "From: ".$_POST["email"];

        if(mail($emailTo,$subject,$body,$headers)){
          $successMsg =  "<div class=\"alert alert-success\" role=\"alert\"> The email was sent successfully! </div>";
        }else{
          $error = "<div class=\"alert alert-danger\" role=\"alert\">The email was NOT sent!</div>";
        }
      }
  }



 ?>

<!-- Get the bootstrap starting code -->
<!doctype html>
<html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Contact</title>


   </head>
   <body>

     <div class="container">
       <h1>Get in touch!</h1>

       <!-- Empty div for error messages. Will be updated with jQuery -->
       <div id="error">
         <!-- printing error from php -->
         <? echo $error.$successMsg;  ?>
       </div>

       <!-- A bootstrap form with method POST. The inputs MUST have the field "name" which are keys of the POST variable -->
       <form method="post">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <select class="form-control" id="subject" name="subject">
            <option>Close Account</option>
            <option>Open Account</option>
            <option>Transfer Funds</option>
            <option>Web services</option>
            <option>Others</option>
          </select>
        </div>

        <div class="form-group">
          <label for="msg">Message</label>
          <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3" id="submit" >Submit</button>

      </form>

     </div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <script type="text/javascript">

     // On clicking submit, validate the form and prevent submission if error exists
      $("form").submit(function (e) {

          //Front-end validation
          var error = "";

          if($("#email").val() == ""){
            error += "<p>An email is required</p>";
          }

          if($("#msg").val() == ""){
            error += "<p>A message is required</p>";
          }

          if(error != ""){
            e.preventDefault(); //can use return false instead
            $("#error").html(
            '<div class="alert alert-danger" role="alert">' +
             error +
            '</div>');
          }else{
            $("#error").html("");
            $("form").unbind("submit").submit(); //can use return true instead
          }


      });

     </script>

   </body>
 </html>
