<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"main.php\">next</a>
    <a href=\"admin_home.php\">admin</a> 
    </p>";
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if ($con) {
    if (mysql_select_db("quotes", $con)) { // database 
      $query = "select * from quotes"; // table of interest  
      $result = mysql_query($query);
      $num_cats = mysql_num_rows($result);
      $quotes_rows = mysql_fetch_row($result);
      echo "<p>\"$quotes_rows[0]\"";
      echo "<br>";
      echo "-$quotes_rows[1]";
    }
  }
  mysql_close($con);
?>
