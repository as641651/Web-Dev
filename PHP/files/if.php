<?php

$user = "rob";
if($user== "rob"){
  echo "Hello Rob!";
}else{
  echo "I dont know you!";
}

echo "<br /><br />";

$age = 25;
if($age >= 18 && $user == "rob"){
  echo "You may proceed..";
}else{
  echo "You are not old enough";
}

 ?>
