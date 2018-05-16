<?php

  //CONNECT TO DB
  $servername = "shareddb-h.hosting.stackcp.net";
  $username = "userdata-3333f633";
  $password = "lifvkvf1ie";
  $databasename = $username; //Same in eco webhosting server

  $link = mysqli_connect($servername,$username,$password,$databasename);

  if (mysqli_connect_error() == ""){
    echo "Connection was successful<br />";
  }else {
    // Stop the script if connection is not established!
    die("There was an error connecting to database");
  }

  //RETRIEVE FROM DB
  $query = "SELECT * FROM users";

  if($result = mysqli_query($link,$query)){
    echo "Query was successful!<br />
    We can either use '0,1,2 or 'id,email,password' keys to access the data<br />";

    //Fetches 1 row
    $rows = mysqli_fetch_array($result);

    print_r($rows);

    echo "<p>Email : ".$rows["email"]."</p>";
    echo "<p>Password : ".$rows["password"]."</p>";

    //Fetches the second row
    $rows = mysqli_fetch_array($result);

    print_r($rows);

    echo "<p>Email : ".$rows[1]."</p>";
    echo "<p>Password : ".$rows[2]."</p>";



  };

 ?>
