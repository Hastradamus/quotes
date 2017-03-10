<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"admin_home.php\">admin-home</a> 
    <a href=\"admin_new_quote.php\">new-quote</a> 
    </p>";

$id = $_GET['id'];
require('functions.php');
$con = connect_and_select();
$query = "delete from quotes where id = $id";
$suc = mysql_query($query, $con);
if($suc)
    echo "<p> SUCCESSFULLY DELETED QUOTE";
else
    echo "Error completing request";
mysql_close($con);
?>
