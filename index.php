<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//fill the below fields with your values
$searchfor = "";
$replacewith = "";
$parentfolder = "./";
//change nothing from here

$di = new RecursiveDirectoryIterator($parentfolder);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    //open file

    $skip = array(".","..",".DS_Store","index.php");
    if(!in_array($file->getFilename(), $skip)){
        //open file
        $filecontents = file_get_contents($filename);

        //replace string
        $newcontents = str_replace($searchfor,$replacewith, $filecontents);

        //write to file
        file_put_contents($filename, $newcontents);
    }
}


?>