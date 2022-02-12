<?php
require_once './Connexion.php';
require_once 'env.php';
$db = new Connexion($host, $databaseName, $password, $user, null);

$file = 'temp/'.date('Ymd').'.xml';
try{
    if (file_exists($file)) {
        $pdv_liste = simplexml_load_file($file);
        foreach($pdv_liste as $pdv){
            $sql = 'INSERT INTO pdv_liste VALUES (:pdv, :latitude, :longitude, :adresse, :ville, :cp)';
            $params = [
                ':pdv'       => $pdv->attributes()['id'],
                ':latitude' => $pdv->attributes()['latitude']/100000,
                ':longitude'  => $pdv->attributes()['longitude']/100000,
                ':adresse'  => $pdv->adresse,
                ':ville' => $pdv->ville,
                ':cp' => $pdv->attributes()['cp']
            ];
            $db->query($sql, $params);
        }
    } else {
        throw new Exception("Fichier non trouvé ($file)");
    }
} catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
 