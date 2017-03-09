<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"admin_home.php\">admin</a> 
    </p>";

  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if ($con) {
    if (mysql_select_db("quotes", $con)) { // database 
      $query = "select * from quotes"; // table of interest  
      $result = mysql_query($query);
      $num_cats = mysql_num_rows($result);

    $next = $_GET['next'];
    $random = $_GET['random'];

    if($random == 'true'){
    $next = rand(1, $num_cats);
    }
    else if($next == "")
        $next = 1;
    else{
        $next = $_GET['next'] + 1;
    }


      $i = 0;
      do{
          /*
          if($i >= $num_cats){
              $next = 1;
              $i = 0;
              //$taco = mysql_data_seek($result, 1);
          }
           */
          $quotes_rows = mysql_fetch_row($result);
          $i = $i + 1;
      } while($i < $next);
      echo "<p>\"$quotes_rows[0]\"";
      echo "<br>";
      echo "-$quotes_rows[1]";
    }
  }
  mysql_close($con);

echo "<form>
    <input type='hidden' name='next' value=$next>
    <input type='hidden' name='random' value=false>
    <input type='submit' value='next'>
    </form>

    <form>
    <input type='hidden' name='next' value=>
    <input type='hidden' name='random' value=true>
    <input type='submit' value='random'>
    </form>";


?>
