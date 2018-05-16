<?php

  echo "<h1>Email</h1>";

  $emailTo = "aravindsankaran22@gmail.com";
  $subject = "I hope this works!";
  $body = "I think you are great!";
  $headers = "From: sender@aravindsankaran-com.stackstaging.com";

  if(mail($emailTo,$subject,$body,$headers)){
    echo "The email was sent successfully!";
  }else{
    echo "The email was NOT sent!";
  }

 ?>
