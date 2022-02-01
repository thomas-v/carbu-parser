<?php
$stream = fopen('temp/'.date('Ymd').'.xml', 'r');

$file = 'temp/'.date('Ymd').'.xml';
if (file_exists($file)) {
    $xml = simplexml_load_file($file);
} else {
    exit('Echec lors de l\'ouverture du fichier test.xml.');
}