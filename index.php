<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$di = new RecursiveDirectoryIterator('./');
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    //open file

    $skip = array(".","..",".DS_Store","index.php");
    if(!in_array($file->getFilename(), $skip)){
        //open file
        $filecontents = file_get_contents($filename);

        //replace string
        $newcontents = str_replace("https://munki.wdka.hro.nl/artwork/","http://openmunki.wdka.hro.nl/artwork/", $filecontents);

        //write to file
        file_put_contents($filename, $newcontents);
    }
}


?>