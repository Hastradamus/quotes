<?php

echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"admin_home.php\">admin home</a> 
    <a href=\"new_quote.php\">new quote</a> 
    </p>";

$quote_text = $_POST['quote_text'];
$quote_author = $_POST['origin'];

  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if ($con) {
    if (mysql_select_db("quotes", $con)) { // database 
      $query = "insert into quotes values(\"$quote_text\", \"$quote_author\", \"11:34PM\")";
      $result = mysql_query($query, $con);
      if(!$result)
          die('error entering data' . mysql_error());
      else{
          echo "<p> QUOTE SUCCESSFULLY SUBMITTED </p>";
      }
    }
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());


  mysql_close($con);
?>
