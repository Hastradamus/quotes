<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"main.php\">next</a>
    <a href=\"admin_home.php\">admin-home</a> 
    </p>";

$id = $_GET['id'];
require('functions.php');
$con = connect_and_select();
$query = "select * from quotes where id = $id";
$suc = mysql_query($query, $con);
if($suc){
    echo "<p> Query Was Successful";
    $row = mysql_fetch_array($suc, MYSQL_NUM);
}
else
    echo "Error completing request";
mysql_close($con);

echo "<form action='admin_quote_submit.php' method='post'>
    Quote Text: <input type='text' value='". $row[0] ."' name=quote_text /> <br/>
    Quote Originator: <input type='text' value='". $row[1] ."' name='origin'/> <br/>
    <input type='submit' name='submit' value='submit' />
    </form>";
    //<!-- <input type='hidden' name='redirect' value='admin_com_screen.php' > -->
?>
