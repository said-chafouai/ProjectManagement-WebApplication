<?php
header( "refresh:1;url=tirage_test.php" );
$date_format = date("H-i-s");
echo $date_format;
if($date_format == "10-54-00"){
    echo 'You\'ll be redirected in about 2 secs. If not, click <a href="tirage_test.php">here</a>.';
  
}

?> 