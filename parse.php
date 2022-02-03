<?php
$file = 'temp/'.date('Ymd').'.xml';
try{
    if (file_exists($file)) {
        $pdv_liste = simplexml_load_file($file);
        foreach($pdv_liste as $pdv){
        }
    } else {
        throw new Exception("Fichier non trouvé ($file)");
    }
} catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
 