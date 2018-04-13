<?php

$name = "Aravind";

//displaying variables
echo "My name is $name";

$s1 = "First part";
$s2 = " combined with second";

echo "<p>
$s1 $s2
</p>";

//concatenating variables
echo $s1."<br />".$s2;

//calculations with variables
$mynumber = 41;
$calc = $mynumber*31/98 + 4;
echo "<p>
Demonstrating calculation : $calc
</p>";

//Boolean variables
$mybool = true;
echo "<p>
This statement is true? $mybool
</p>";

//Storing variable names within variables
$varname = "name";
echo "my $varname is ".$$varname;

 ?>
