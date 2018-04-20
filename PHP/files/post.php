

<!-- Add method="post" to make a form not append url with get strings -->

<!-- Refreshing the page will display an alert msg that server side actions will be re-performed-->
 <form method="post">
   <label for="name">Name</label>
   <input name="name" type="text" />
   <br />
   <label for="number">Number</label>
   <input name="number" type="text" />
   <br />
   <input type="submit" value = "Go!" />
 </form>

 <?php
  // contents in form-post are stored in $_POST variable
  print_r($_POST);

  ?>

  <form method="post">
    <label for="uname">What is your name?</label>
    <input name="uname" type="text" />
      <input type="submit" value = "Go!" />
  </form>

  <!-- Check if the contents in post variable exists in some database -->
  <?php

    if(isset($_POST["uname"])){

      $family = array("rob","amy","tom","jon");

      $isknown = false;

      foreach($family as $value){
        if($value == $_POST["uname"]){
          $isknown = true;
        }
      }

      if($isknown){
        echo $_POST["uname"]." Exists in database";
      }
    }

   ?>
