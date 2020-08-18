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
 <!--    <form action="firstPage.php" method="POST">
			<select name="choix" id="choix">
				<option value="LivreA">Livre</option>
				<option value="AuteurA">Auteur</option>
				<option value="LibraireA">Libraire</option>
				<option value="EditionA">Edition</option>
				<option value="CommandeA">Commande</option>
			</select>
        <input type="submit" value="mod">
			<br><br>
		</form> 	-->	

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
      
    //else echo"erreur";
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
				<option value="Edition">Edition</option>
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
          $_SESSION["var"]=$valeurChoisie;

         switch($valeurChoisie)
         {   
             case 'Livre' : 
                $req='SELECT ISBN,Titre,Prize FROM livre;'; 
                
                break;
             case 'Auteur' :
                $req="SELECT Nom,Prenom,Pseudonyme FROM auteur;";
                break;
             case 'Commande':
                $req='SELECT CdeCommande,Quantite FROM commande;';
                break;
             case 'Edition' :
                $req='SELECT NumEdition,Annee,NombreExemplaire,Prix FROM eedition;';
                break;
             case 'Adresse' :
                $req='SELECT Rue,Ville,Pays FROM adresse;'; 
                break;  
             case 'Libraire':
                $req='SELECT CdeLibraire,Nom,CdeAdresse FROM libraire;';  
                break; 
              break; 
          

         }
         $res=$bdd->prepare($req);
         $res->execute();
         while($data = $res->fetch()){
            switch($valeurChoisie)
            { 
                case 'Livre' :  
                  echo $_SESSION["var"];
                  $data["ISBN"];
                echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["ISBN"].'\'" class="btn btn-primary" />';                    
                echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['ISBN'].'">
                 '.$data['Titre'].'
                </button>
               
               <div class="modal fade" id="id'.$data['ISBN'].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['ISBN'].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['ISBN'].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Livre</span>
                       </button>
                     </div>
					 
                     <div class="modal-body">
                      '.$data['ISBN'].'
					  '.$data['Titre'].'
					  '.$data['Prize'].'                 
                     </div>
					 
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Retourner</button>                   
                     </div>
					 
                   </div>
                 </div>
               </div>'; 
                   echo '<br>';
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
                     <div class="modal-body">'
                      .$data['Nom'].' '.$data['Prenom'].'
                      
                     
                     
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
                     <div class="modal-body">'
                      .'num de commande est : '.$data['CdeCommande'].'<br>la quantité est : '.$data['Quantite'].'
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       
                     </div>
                   </div>
                 </div>
               </div>';
			   echo '<br>';
                   break;
				   
                case 'Edition' :
                 // echo $data['NumEdition'].; 
                  echo 'edition : '.$data['Annee'];
                  echo'<input type="button" value="Supprimer" onclick="window.location.href=\'firstPage.php?var='. $data["NumEdition"].'\'" class="btn btn-primary" />';
                 // echo $data['NombreExemplaire'].'<br>';
                  //echo $data['Prix'].'<br>';
                  echo'      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['NumEdition'].'">
                 plus de infos
               </button>
               
               <div class="modal fade" id="id'.$data['NumEdition'].'" tabindex="-1" role="dialog" aria-labelledby="id'.$data['NumEdition'].'" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="id'.$data['NumEdition'].'">Informations completes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">Edition</span>
                       </button>
                     </div>
                     <div class="modal-body">'
                      .'Num de edition: '.$data['NumEdition'].'<br>lannee : '.$data['Annee'].'<br>le prix : '.$data['Prix'].'
                      
                     
                     
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       
                     </div>
                   </div>
                 </div>
               </div>';
			   echo '<br>';
                   break;
				   
               /* case 'Adresse' :
                  echo $data['Rue'].', '; 
                  echo $data['Ville'].', ';
                  echo $data['Pays'].'<br>'; 
                   break;  */
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
                      .'Nom de libraire : '.$data['Nom'].'<br>Son code : '.$data['CdeLibraire'].'
                      
                     
                     
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