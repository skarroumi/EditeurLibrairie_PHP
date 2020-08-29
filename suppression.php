<?php
include 'SQLConnexion.php';

$type = $_POST['type'];
$value = $_POST['value'];

switch ($type){
    case 'Livre':
        $query = "DELETE FROM livreauteurpourcentage WHERE ISBN='$value'";
        $bdd->exec($query);
        $query_1 = "DELETE FROM eedition WHERE ISBN='$value'";
        $bdd->exec($query_1);
        $query_2 = "DELETE FROM Livre WHERE ISBN='$value'";
        $bdd->exec($query_2);
        echo 1;
    break;

    case 'Commande':
        $query = "DELETE FROM Commande WHERE CdeCommande='$value'";
        $bdd->exec($query);
        echo 1;
    break;
    case 'Libraire':
        $query_1 = "DELETE FROM Commande WHERE CdeLibraire='$value'";
        $bdd->exec($query_1);
        $query_1 = "DELETE FROM Libraire WHERE CdeLibraire='$value'";
        $bdd->exec($query_1);
        echo 1;
    break;
    case 'Auteur' :
        $query_1 = "DELETE FROM livreauteurpourcentage WHERE Pseudonyme='$value'";
        $bdd->exec($query_1);
        $query_1 = "DELETE FROM Auteur WHERE Pseudonyme='$value'";
        $bdd->exec($query_1);
        echo 1;
     break;

}


?>