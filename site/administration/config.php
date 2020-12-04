<?php 
    try 
    {
        $bdd = new PDO('mysql:host=sql.alls-heberg.fr;dbname=nassere19322;charset=utf8', 'nassere19322', 'ZQ9OCUIN5!nuFRB');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }