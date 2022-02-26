<?php
require_once './Connexion.php';
require_once 'env.php';
$db = new Connexion($host, $databaseName, $password, $user, null);

$file = 'temp/'.date('Ymd').'.xml';

if (file_exists($file)) {
    $pdv_liste = simplexml_load_file($file);
    foreach($pdv_liste as $pdv){
        $sql = 'INSERT INTO pdv_liste VALUES (:pdv, :latitude, :longitude, :adresse, :ville, :cp) 
                ON DUPLICATE KEY UPDATE latitude=:latitude, longitude=:longitude, adresse=:adresse, ville=:ville, cp=:cp';
        $params = [
            ':pdv'          => $pdv->attributes()['id'],
            ':latitude'     => $pdv->attributes()['latitude']/100000,
            ':longitude'    => $pdv->attributes()['longitude']/100000,
            ':adresse'      => $pdv->adresse,
            ':ville'        => $pdv->ville,
            ':cp'           => $pdv->attributes()['cp']
        ];
        $db->query($sql, $params);
        foreach($pdv->prix as $carb){
            $sql = 'SELECT 1 FROM carburants WHERE pdv=:pdv AND type=:nom';
            $params = [
                ':pdv'  => $pdv->attributes()['id'],
                ':nom'  => $carb->attributes()['nom'],
            ];
            $stmt = $db->query($sql, $params);
            if($carbu = $stmt->fetch()){
                $sql = 'UPDATE carburants SET prix = :prix, maj = :maj WHERE pdv=:pdv AND type=:type';

            } else {
                $sql = 'INSERT INTO carburants (pdv, type, prix, maj) VALUES (:pdv, :type, :prix, :maj)';
            }
            $params = [
                ':pdv'      => $pdv->attributes()['id'],
                ':type'     => $carb->attributes()['nom'],
                ':prix'     => $carb->attributes()['valeur'],
                ':maj'      => $carb->attributes()['maj'],
            ];
            $db->query($sql, $params);
        }
    }
} else {
    die("Fichier non trouvé ($file)");
}
 