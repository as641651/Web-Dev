<?php

$myArray = array("Rob","Aravind","Tommy");

//cant print an array like this
echo $myArray;

echo "<br />";

//use print_r
print_r($myArray);

echo "<p></p>1) My name is ".$myArray[1];

//Array assignment
$myArray[0] = "pizza";
echo "<p>2) New array with reassigned 1st element</p>";
print_r($myArray);

//Another way of creating array
$newArray[0] = "pizza";
$newArray[2] = "Coke";
$newArray["myFav"] = "Panner";

echo "<p>3) New array. Notice that the index need not be consequtive or integers</p>";
print_r($newArray);

//Dict like array creation
$anotherArray = array(
  "France"=>"French",
  "USA"=>"English"
);

echo "<p>4) Dict like array creation</p>";
print_r($anotherArray);

//Length of Array
echo "<p>5) Length of array using  <b>sizeof(array_name)</b></p>";
echo sizeof($anotherArray);

//Adding element to end of array
$anotherArray[] = "katie";
$anotherArray[] = "Tom";
echo "<p>6) Adding element to end of array</p>";
print_r($anotherArray);

//removing element from array
unset($anotherArray["France"]);
unset($anotherArray[0]);

echo "<p>6) Removing element from array using <b>unset</b>. This function <b>unset</b> can also be used on variables</p>";
print_r($anotherArray);

 ?>
