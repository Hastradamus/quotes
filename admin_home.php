<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"admin_home.php\">admin-home</a> 
    <a href=\"admin_new_quote.php\">new-quote</a> 
    </p>";
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if($con){
    if (mysql_select_db("quotes", $con)) { // database 
      $query = "select * from quotes"; // table of interest  
      $result = mysql_query($query, $con);
      $num_cats = mysql_num_rows($result);
      if($num_cats <= 0)
          echo "<p> There are no quotes to list";
      else{
      while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
          printf("%s -%s", $row[0], $row[1]);  
          echo "<br>";
          printf("%s",$row[2]);  
          echo "<br>
              <form type='submit', action='admin_delete.php'>
              <input type='hidden' name='id' value=" . $row[3] .">
              <input type='submit' value='delete'>
              </form>
             <form type='submit', action='admin_edit.php'>
              <input type='hidden' name='id' value=" . $row[3] .">
              <input type='submit' value='edit'>
              </form>
              <br>";
      }
      }
      //$num_cats = mysql_num_rows($result);
      //$quotes_rows = mysql_fetch_row($result);
      //for($i = 0; $i < sizeof($quotes_rows); $i++){
        //echo "<p>\"$quotes_rows[$i]\"";
     // }
//      echo "<br>";
 //     echo "-$quotes_rows[1]";
    }
  }
  mysql_close($con);
?>
