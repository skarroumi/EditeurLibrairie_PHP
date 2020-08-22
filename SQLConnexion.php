<?php
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=editeurbdd;charset=utf8', 'root', 'passroot');
   
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>