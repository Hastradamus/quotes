<?php
echo "<p>  <a href=\"main.php\">home</a>
    <a href=\"main.php\">next</a>
    <a href=\"admin_home.php\">admin-home</a> 
    </p>";

echo "<form action='admin_quote_submit.php' method='post'>
    Quote Text: <input type='text' name=quote_text /> <br/>
    Quote Originator: <input type='text' name='origin'/> <br/>
    <input type='submit' name='submit' value='submit' />
    </form>";
    //<!-- <input type='hidden' name='redirect' value='admin_com_screen.php' > -->

