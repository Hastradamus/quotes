<?php

echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"admin_home.php\">admin home</a> 
    <a href=\"admin_new_quote.php\">new quote</a> 
    </p>";

$quote_text = $_POST['quote_text'];
$quote_author = $_POST['origin'];
$date = date("m-d-y h:i:s", time());
echo "<p> $id";
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if ($con){ 
    if( mysql_select_db( "quotes", $con )) { // database 

    do{
        $id = rand();
        $instancesofid = mysql_num_rows(mysql_query("select * from quotes where id = $id", $con)); //make sure the id isn't taken
    } while($instancesofid > 0);
         //if the id isn't taken enter everything
            $query = "insert into quotes values(\"$quote_text\", \"$quote_author\", \"$date\", $id)";

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
