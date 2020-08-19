<?php session_start();
 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
		<script src="JavaS.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Pas de titre</title>
        <?php 
              include'connexion.php'; 
        ?>
    </head>
	
	<body>


<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<?php 
  
if(isset($_POST['valeurChoisie']))
  {$choix=$_POST['valeurChoisie'];
   switch($choix)
        {case 'Livre': echo'
       <div class="Livre" id="Livre">
          <form action="firstPage.php" method="POST">	
		    	ISBN : <input type="text" name="ISBN">
		    	Titre : <input type="text" name="Titre">
          Prize : <input type="text" name="Prize">
         <input type="submit" value="ajouter" name="ajouter">
         </form>  
       </div>';
      break;
      
     case 'Auteur' : echo'
    
     <div class="Auteur" id="Auteur">
      <form action="#" method="POST">
			Pseudonyme : <input type="text" name="Pseudonyme">
			Nom : <input type="text" name="Nom">
      Prenom : <input type="text" name="Prenom">
      <input type="submit" value="ajouter"  name="ajouter" >
      </form>       
    </div>';
    break;

    case 'Libraire' : echo'
    <div class="Libraire" id="Libraire">
      <form action="#" method="POST">
			CdeLibraire : <input type="text" name="CdeLibraire">
			Nom : <input type="text" name="Nom">
      <input type="submit" value="ajouter"  name="ajouter" >
      </form>
    </div>';
    break;
	
	  case 'Edition' : echo'
  <div class="Edition" id="Edition">
      <form action="#" method="POST">
			NumEdition :<input type="text" name="NumEdition">
		  Annee:	<input type="text" name="Annee">
			NombreExemplaire :<input type="text" name="NombreExemplaire">
			Prix : <input type="text" nama="Prix">
      <input type="submit" value="ajouter"  name="ajouter" >
      </form>		
    </div>';
     break;

     case 'Commande' : echo'
     <div class="Commande" id="Commande">
       <form action="firstPage.php" method="POST">
       CdeCommande : <input type="text" name="CdeCommande">
       Quantite : <input type="text" name="Quantite">
       <input type="submit" value="ajouter"  name="ajouter" >
       </form>       
     </div>';
     break;

    }
   } else echo'
      <div class="Livre" id="Livre">
        <form action="#" method="POST">
        <label for="ISBN">ISBN<span>*</span></label>
        <input type="text">
        <label for="Titre">Titre <span>*</span></label>
        <input type="text">
        <label for="Prize">Prix<span>*</span></label>
        <input type="text">
        </form>
      </div>';
  
  

?>
</div>
    <br><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

		<div class="container">
			<div class="jumbotron">
				<!-- Button trigger modal -->
        
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
					Ajouter
				</button>


        <form action="#" method="POST">
			<select name="valeurChoisie" id="valeurChoisie" >
				<option value="Livre">Livre</option>
				<option value="Auteur">Auteur</option>
				<option value="Libraire">Libraire</option>
				<option value="Commande">Commande</option>
			</select>
			<br><br>
			<input type="submit" value="Chercher" name="Chercher" class="btn btn-primary">
		    </form>	
			</div>
		</div>


<?php 
      if(isset($_POST["Chercher"]))
      {if(isset($_POST['valeurChoisie']))
         { $valeurChoisie=$_POST['valeurChoisie'];  

         switch($valeurChoisie)
         {   
             case 'Livre' : 
                $req='SELECT l.ISBN, l.Titre ,l.Prize, e.Prix, e.NombreExemplaire, e.Annee, e.NumEdition,a.Pseudonyme, a.Nom, a.Prenom FROM Livre l JOIN eedition e ON (l.ISBN = e.ISBN) JOIN livreauteurpourcentage lv ON (l.ISBN = lv.ISBN)JOIN auteur a ON a.Pseudonyme=lv.Pseudonyme';          
                break;
             case 'Auteur' :
                $req="SELECT l.ISBN, l.Titre ,l.Prize,a.Pseudonyme, a.Nom, a.Prenom FROM auteur a JOIN livreauteurpourcentage lv ON (a.Pseudonyme =lv.Pseudonyme ) JOIN livre l ON (lv.ISBN = l.ISBN);";
                break;
             case 'Commande':
                $req='SELECT l.Titre, c.Quantite, c.CdeCommande, li.Nom FROM livre l JOIN commande c ON l.ISBN=c.ISBN JOIN libraire li ON li.CdeLibraire=c.CdeLibraire ;';
                break; 
             case 'Libraire':
                $req='SELECT a.Rue, a.Ville, a.Pays, l.Nom, l.CdeLibraire FROM libraire l JOIN adresse a ON a.CdeAdresse=l.CdeAdresse ';  
                break; 
              break; 
             
 
         }
        $res=$bdd->prepare($req);
        $res->execute();
         while($data = $res->fetch()){
            switch($valeurChoisie)
            { 
              case 'Livre' :  
                echo"titre ".$data["Titre"]."<br>";
                echo"titre ".$data["Nom"]."<br>";
                echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["ISBN"].$data["Pseudonyme"].'\'" class="btn btn-primary" />';                    
                echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['ISBN'].$data["Pseudonyme"].'">
                 Affiche plus dinfo
                </button>
               
               <div class="modal fade" id="id'.$data['ISBN'].$data["Pseudonyme"].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['ISBN'].$data["Pseudonyme"].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['ISBN'].$data["Pseudonyme"].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Livre</span>
                       </button>
                     </div>				 
                     <div class="modal-body">
                     Titre de livre : '.$data["Titre"].'<br>
                     Non et prenom de l\'auteur : '.$data["Nom"].' '.$data["Prenom"].'<br>
                     Nombre d\'exmplaire :'.$data["NombreExemplaire"].'<br>'.'Prix du livre : '. $data["Prix"].'<br>
                      Numero d\'edition : '.$data["NumEdition"].'<br>
                       Annee d\'édition : '.$data["Annee"].'<br>
                     </div>					 
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Retourner</button>                   
                     </div>
                   </div>
                 </div>
               </div>'; 
                   break;
                case 'Auteur' :
                  echo $data['Nom'].' '; 
                  echo $data['Prenom']." ";
                  echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["Pseudonyme"].'\'" class="btn btn-primary" />';
                  
                  echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['Pseudonyme'].'">
                 plus de infos
               </button>
               
               <div class="modal fade" id="id'.$data['Pseudonyme'].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['Pseudonyme'].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['Pseudonyme'].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Auteur</span>
                       </button>
                     </div>
                     <div class="modal-body">
                     Nom et prenom de l\'auteur : '.$data["Nom"]." ".$data["Prenom"].'<br>Ses livres : '.$data["Titre"].'<br>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                     </div>
                   </div>
                 </div>
               </div>';
			   echo '<br>';
                   break;
				   
                case 'Commande':
                  echo 'commande :'.$data['CdeCommande'].' '; 
                  echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["CdeCommande"].'\'" class="btn btn-primary" />';
                 // echo $data['CdeLiraire'].'<br>';
                 // echo $data['Quantité'].'<br>';
                 echo'      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['CdeCommande'].'">
                 plus de infos
               </button>
               
               <div class="modal fade" id="id'.$data['CdeCommande'].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['CdeCommande'].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['CdeCommande'].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Commande</span>
                       </button>
                     </div>
                     <div class="modal-body">
                      Num de commande est : '.$data['CdeCommande'].'<br>la quantité est : '.$data["Quantite"].'<br> Titre de Livre : '.$data["Titre"].'<br> Le libraire qui a effectué la commande : '.$data["Nom"].'
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       
                     </div>
                   </div>
                 </div>
               </div>';
			   echo '<br>';
                   break;

                case 'Libraire':
                  echo $data['CdeLibraire'].' ';
                  echo $data['Nom'].' '; 
                  echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["CdeLibraire"].'\'" class="btn btn-primary" />';
                  //echo $data['CdeAdress'].'<br>';
                  echo'      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['CdeLibraire'].'">
                 plus de infos
               </button>
               
               <div class="modal fade" id="id'.$data['CdeLibraire'].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['CdeLibraire'].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['CdeLibraire'].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Libraire</span>
                       </button>
                     </div>
                     <div class="modal-body">'
                      .'Nom de libraire : '.$data['Nom'].'<br>Son code : '.$data['CdeLibraire'].'<br> Son adresse : '.$data["Rue"].', '.$data["Ville"].', '.$data["Pays"].'
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       
                     </div>
                   </div>
                 </div>
               </div>'; 
			    echo '<br>';
                   break; 
                   
                     
   
   
            }
             
         }
         
     
 
      }
    }
    

?>






</body>
</html>