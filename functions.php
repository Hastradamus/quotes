<?php 
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
        echo "<script>console.log( 'Debug Objects:" . $output . "' );</script>";
    }

function connect_and_select(){

  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
                          // host                port     username   password 
  if ($con){ 
    if( mysql_select_db( "quotes", $con ))// database 
        return $con;
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());
}

function delete($con, $id){
    $query = "delete from quotes where id = $id";
    $suc = mysql_query($query, $con);
    if($suc)
        return true;
    return false;
}
?>
