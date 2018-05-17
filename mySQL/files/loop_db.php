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

//RETRIEVE FROM DB
$query = "SELECT * FROM users";

//LOOP THROUGH ALL DATA
echo "<p>LOOP TTHROUGH ALL DATA</p>";
if($result = mysqli_query($link,$query)){

  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

//GET SELECTIVE DATA
echo "<p>GET SELECTIVE DATA</p>";
$query = "SELECT * FROM users WHERE email='csk@ipl.com'";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

//GEt all emails from ipl.com. Use regex '%'
echo "<p>GET SELECTIVE DATA WHOSE EMAIL ARE FROM ipl.com</p>";
$query = "SELECT * FROM users WHERE email LIKE '%@ipl.com'";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

echo "<p>GET SELECTIVE DATA THAT HAVE LETTER 'a' IN EMAIL</p>";
$query = "SELECT * FROM users WHERE email LIKE '%a%'";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

echo "<p>GET SELECTIVE DATA WHERE id >=3 </p>";
$query = "SELECT * FROM users WHERE id >=3";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

//GET A COLUMN ALONE
echo "<p>GET emails and id alone </p>";
$query = "SELECT `email`,`id` FROM users";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}

//MULTIPLE CONDITIONS
echo "<p>GET emails with letter 'k' and id >=2 </p>";
$query = "SELECT `email` FROM users WHERE email LIKE '%k%' AND id >2";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}else{
  echo "<br />".mysqli_error($link);
}

//DEALING WITH ESCAPE CHARACTERS
$name = "Rob O'Grady";
echo "<p>GET THE ROW DATA OF Rob O'Grady (TAKING CARE OF ESCAPE CHARACTERS) </p>";

//Wrong query
$query = "SELECT `email`  FROM users WHERE Name=".$name;
echo $query."<br />";

//Again Wrong query
$query = "SELECT `email`  FROM users WHERE Name= '".$name."'";
echo $query."<br />";

//Correct Query
//mysqli_real_escape_string adds back slashes to escape characters
$query = "SELECT `email`  FROM users WHERE Name= '".mysqli_real_escape_string($link, $name)."'";
echo $query."<br />";

if($result = mysqli_query($link,$query)){
  while($row = mysqli_fetch_array($result)){
    print_r($row);
    echo "<br /> <br />";
  }
}else{
  echo "<br />".mysqli_error($link);
}


?>
