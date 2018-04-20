<?php
  //GET variables enables accessing contents from web-browser by the server

  //Contains all Get variables encoded in the URL

  //"?name=aravind&gender=male" appened to to url updates $_GET as
  //Array ( [name] => aravind [gender] => male )
  print_r($_GET);

?>

<!-- Values entered in forms can be accessed with GET variable -->
<form>
  <label for="name">Name</label>
  <input name="name" type="text" />
  <br />
  <label for="number">Number</label>
  <input name="number" type="text" />
  <br />
  <input type="submit" value = "Go!" />
</form>

<?php
//Access
if(isset($_GET["name"]))
  echo "<br  /><br  /> Hi there ".$_GET["name"]."!";
?>

<?php
if(isset($_GET["number"])){

  //Check if its anumber
  if(is_numeric($_GET["number"])){

      echo "<br  /> The number is ".$_GET["number"]."!";

      //Check if its prime
      $isprime = true;
      $i=2;
      while($i < $_GET["number"]){
        if($_GET["number"]%$i ==0)
          $isprime = false;
        $i++;
      }

      //Display result
      $num = $_GET['number'];
      if($isprime){
        echo "<p>
         $num is a prime number
        </p>";
      }
      else {
        echo "<p>
        $num is NOT a prime number
        </p>";
      }
    }else{
      echo"<p>
      Please enter a valid number
      </p>";
    }
}
?>
