<?php// session_start(); ?>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=editeurbdd;charset=utf8', 'root', '');
   
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>

<?php //INSERTION
       
    if(isset($_POST['ajouter']))
        {   
        if(!empty($_POST["ISBN"])&&!empty($_POST["Titre"]))
            {  
            $req=$bdd->prepare("INSERT INTO Livre(ISBN,Titre,Prize) VALUES(?, ?, ?)");
            $req->execute(array($_POST["ISBN"],$_POST["Titre"],$_POST["Prize"]));
            }
         if(!empty                                                                                                                                                                                              ($_POST["Pseudonyme"])&&!empty($_POST["Prenom"])&&!empty($_POST["Nom"]))
            {  echo$_POST["Nom"];
            $req=$bdd->prepare("INSERT INTO Auteur(Pseudonyme,Prenom,Nom) VALUES(?, ?, ?)");
            $req->execute(array($_POST["Pseudonyme"],$_POST["Prenom"],$_POST["Nom"]));
            }
        if(!empty($_POST["CdeLibraire"])&&!empty($_POST["CdeAdresse"])&&!empty($_POST["Nom"]))
            {  echo$_POST["Nom"];
            $req=$bdd->prepare("INSERT INTO Libraire(CdeLibraire,Nom) VALUES(?, ?)");
            $req->execute(array($_POST["CdeAdresse"],$_POST["CdeLibraire"],$_POST["Nom"]));
            } 
        if(!empty($_POST["NumEdition"])&&!empty($_POST["Annee"])&&!empty($_POST["NombreExemplaire"])&&!empty($_POST["Prix"]))
            {  echo$_POST["Prix"];
            $req=$bdd->prepare("INSERT INTO eedition(NumEdition,Annee,NombreExemplaire,Prix) VALUES(?, ?, ?, ?)");
            $req->execute(array($_POST["NumEdition"],$_POST["Annee"],$_POST["NombreExemplaire,Prix"]));
            }
        if(!empty($_POST["CdeCommande"])&&!empty($_POST["Quantite"]))
            {  echo$_POST["Quantite"];
            $req=$bdd->prepare("INSERT INTO Commande(CdeCommande,Quantite) VALUES(?, ?)");
            $req->execute(array($_POST["CdeCommande"],$_POST["Quantite"]));
            }     
             
      
    } 

    

    if(isset($_GET["var"]))
    {   switch($_SESSION["var"])
        { case 'Livre' :              
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Livre WHERE ISBN=$SUP");  
        break; 
         case 'Auteur' :
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Auteur WHERE Pseudonyme=$SUP"); 
         break;
        case 'Commande' :
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Commande WHERE CdeCommande=$SUP"); 
        break;
        case 'Libraire' :
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Libraire WHERE CdeLibraire=$SUP");   
        break; 

        }
    }
?>      