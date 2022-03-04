<?php

$myfile = "temp.txt";

if (is_readable($myfile))
{
    $myfile = fopen($myfile, "r");
    
    // Output one character until end-of-file
    while(!feof($myfile)) {
      echo fgetc($myfile);
    }

    fclose($myfile);
} else {
    echo "file not found";
}

?>