<?php

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

  //INSERT DATA

  //Good to use `` for field names and '' for Values in SQL, although it will work without them
  //Works without specifying `id` (auto increments), but we use it here to prevent insertion of duplicate entries while refreshing
  $query = "INSERT INTO `users` (`id`,`email`,`password`) VALUES('4','srh@ipl.com', 'imagreatloser')";
  if($out = mysqli_query($link,$query)){
    echo "<p>INSERTED new data</p>";
  }else{
    //Prints error when id already exists
    echo mysqli_error($link);
  }

  //UPDATE DATA

  //Without WHERE, email will be updated for all entries, LIMIT 1 is an extra safety that limits updates to 1 entry
  // NOtice LIMIT 1 and not LIMIT=1
  $query = "UPDATE `users` SET email = 'csk@ipl.com' WHERE id=2 LIMIT 1";
  if($out = mysqli_query($link,$query)){
    echo "<p>UPDATED data</p>";
  }else{
    echo "<br />".mysqli_error($link);
  }

?>
