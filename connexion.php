<?php
try
{
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=editeurbdd;charset=utf8', 'root', '');
   
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
<<<<<<< Updated upstream
?>
=======

?>

<?php 


//AUTHENTIFICATION

if(isset($_POST["log"]) && !empty($_POST['login']))
{if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login'] && $_POST['password']))
   {
       $req=$bdd->prepare("SELECT * FROM user WHERE login = ? AND password = ? ");
       $req->execute(array($_POST['login'],$_POST['password']));
       $cpt=$req->rowCount();
       if($cpt==1) header("Location: firstPage.php ");
       else echo"Mauvais login ou mdp";
  }  else echo"veuillez remplir tout les champs";

    
}

                  //INSERTION

       
if(isset($_POST['ajouter']))
{   
    if(!empty($_POST["ISBN"])&&!empty($_POST["Titre"]))
    {  
            $req=$bdd->prepare("INSERT INTO Livre(ISBN,Titre,Prize) VALUES(?, ?, ?)");
            $req->execute(array($_POST["ISBN"],$_POST["Titre"],$_POST["Prize"]));

        foreach ($_POST['option'] as $nom)
         {
            $req=$bdd->prepare("INSERT INTO livreauteurpourcentage(Pseudonyme, Pourcentage, ISBN) VALUES(?, ?, ?)");
             $req->execute(array($nom, $_POST["Pourcentage"], $_POST["ISBN"]));   
         }
    if(!empty($_POST["Annee"])&&!empty($_POST["NombreExemplaire"])&&!empty($_POST["Prix"]))
    { 
            $req=$bdd->prepare('INSERT INTO eedition(Annee,NombreExemplaire,Prix, ISBN) VALUES (?, ?, ?, ?)');
            $req->execute(array($_POST["Annee"],$_POST["NombreExemplaire"],$_POST["Prix"],$_POST["ISBN"]));
    }
    }    
    if(!empty($_POST["Prenom"])&&!empty($_POST["Nom"]))
    {
            $req=$bdd->prepare("INSERT INTO Auteur(Prenom,Nom) VALUES(?, ?)");
            $req->execute(array($_POST["Prenom"],$_POST["Nom"]));
     }
    if(!empty($_POST["Nom"])&&!empty($_POST["Rue"])&&!empty($_POST["Ville"]))
    {  
            $req=$bdd->prepare("INSERT INTO Libraire(Nom, Rue, Ville, Pays) VALUES(?, ?, ?, ?)");
            $req->execute(array($_POST["Nom"],$_POST["Rue"],$_POST["Ville"],$_POST["Pays"]));
    } 
    if(!empty($_POST["CdeCommande"])&&!empty($_POST["Quantite"]))
    { 
            $req=$bdd->prepare("INSERT INTO Commande(CdeCommande,Quantite,ISBN,CdeLibraire) VALUES(?, ?, ?, ?)");
            $req->execute(array($_POST["CdeCommande"],$_POST["Quantite"],$_POST['TitreC'],$_POST['libraireC']));
    }         
 } 


    

    if(isset($_GET["var"]))
    {   switch($_SESSION["var"])
        { case 'Livre' :              
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Livre WHERE ISBN=$SUP");
            $req=$bdd->exec("DELETE FROM eedition WHERE ISBN=$SUP"); 
            $req=$bdd->exec("DELETE FROM livreauteurpourcentage WHERE ISBN=$SUP");   
        break; 
         case 'Auteur' :
            $SUP=$_GET["var"];
            $req=$bdd->exec("DELETE FROM Auteur WHERE Pseudonyme=$SUP");
            $req=$bdd->exec("DELETE FROM livreauteurpourcentage WHERE Pseudonyme=$SUP"); 
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
>>>>>>> Stashed changes
