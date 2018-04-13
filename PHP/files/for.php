<?php

for($i = 0; $i < 10; $i++){
  echo $i."<br />";
}

//Looping through arrays
echo "<p>
Looping through arrays..
</p>";

$family = array("a","b","c","d");
for($i=0;$i<sizeof($family);$i++){
  echo $family[$i]."<br />";
}

//Looping through arrays using foreach
echo "<p>
Looping through arrays using <b>foreach</b>. Useful for non integer keys..
</p>";

foreach($family as $key => $value){
  $family[$key] = $value." potter";
}

foreach($family as $key => $value){
  echo "Array item $key is $value <br />";
}

?>
