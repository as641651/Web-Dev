<?php

  echo "<h2> The string is converted to hash and stored in database</h2>";

  echo "Hash format of string 'password' is ".md5("password");

  echo "<p>Although hash strings cannot be backtraced, there are number of websites that have precomputed hash of all dictionary words</p>";

  echo "<p> eg, <a href='https://crackstation.net/'>crack station</a></p>";

  echo "<h2>Turn weak password to strong password</h2>";

  echo "<p> This is done by mixing a weak passord with a tough string called 'salt'</p>";

  $weakpass = "mother";
  $salt = "afsjhfdbashfb3243h";
  $strongpass = $salt.$weakpass;

  echo "<p>Hash of the ".$salt."+".$weakpass." is ".md5($strongpass)."</p>";

  echo "<p>But this can still be hacked if someone gets hold of the salt string </p>";

  echo "<h2>Stronger encryption</h2>";

  echo "<p> Instead of salt string append md5 of user id, eg, <br /> md5(md5(\$row['id']).password)</p>";


?>
