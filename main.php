<!DOCTYPE html>
<html>
<body>
<head>
    <title>Quotes Home</title>
    <style>
        html{
            height: 100%;
        }

        body {
            //background-image: url("images/norway.jpg");
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('images/norway.jpg');
            background-repeat: no-repeat;
            background-position: center;
        }
        #quote_parent{
            padding: 5% 0;
        }
        #quote {
            color: white;
            font-size: 300%;
            font-family:'Aguafina Script';//,  Light, sans-serif;
            padding: 10% 0;
            text-align: center;
        }
    </style>
</head>

    <p>
        <a href="main.php">home</a>
        <a href="admin_home.php">admin</a> 
    </p>

<?php

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
          if($i >= $num_cats - 1){
              $next = 0;
              $i = 0;
              //$taco = mysql_data_seek($result, 1);
          }
          $quotes_rows = mysql_fetch_row($result);
          $i = $i + 1;
      } while($i < $next);
      if($num_cats <= 0){
          echo "<p> There are no quotes. Click on 'admin' to add some";
      }
      else{
          echo "<div id='quote_parent'>";
          echo "<div id='quote'>";
          echo "<p>\"$quotes_rows[0]\"";
          echo "<br>";
          echo "-$quotes_rows[1]";
          echo "</div>";
          echo "</div>";
      }
    }
  }
  mysql_close($con);
?>
    <form>
    <input type='hidden' name='next' value=<?php echo $next ?> >
    <input type='hidden' name='random' value=false>
    <input type='submit' value='next'>
    </form>

    <form>
    <input type='hidden' name='next' value=>
    <input type='hidden' name='random' value=true>
    <input type='submit' value='random'>
    </form>

</body>
</html>
