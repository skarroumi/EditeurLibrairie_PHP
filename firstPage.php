<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Pas de titre</title>
    </head>
<body>
<form action="#" method="POST">
  <select name="valeurChoisie" id="valeurChoisie">
    <option value="Livre">Livre</option>
    <option value="Auteur">Auteur</option>
    <option value="Libraire">Libraire</option>
    <option value="Edition">Edition</option>
    <option value="Commande">Commande</option>
  </select>
  <br><br>
  <input type="submit" value="Chercher">
</form> 
<?php include'connexion.php'; ?>
<?php 
    if(isset($_POST['valeurChoisie']))
   { $valeurChoisie=$_POST['valeurChoisie'];
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
         $res=$bdd->query($req);
         while($data = $res->fetch()){
            switch($valeurChoisie)
            { 
                case 'Livre' :  
                  if(isset($data['Prize'])) $Prize=$data['Prize'].'<br>';
                  else $Prize="ce livre n'a remporté aucun prix <br>";
                 echo $data['Titre'];
                echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id'.$data['ISBN'].'">
                 plus de infos
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
                      '.'Titre de livre : '.$data['Titre'].'<br>Prize : '.$Prize.'
                      
                     
                     
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       
                     </div>
                   </div>
                 </div>
               </div>';
                  
                   
                   break;
                case 'Auteur' :
                  echo $data['Nom'].' '; 
                  echo $data['Prenom']." ";
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
                      .'Nom complet d\'auteur : '.$data['Nom'].' '.$data['Prenom'].'
                      
                     
                     
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                     </div>
                   </div>
                 </div>
               </div>';
                   break;
                case 'Commande':
                  echo 'commande :'.$data['CdeCommande'].' '; 
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
                   break;
                case 'Edition' :
                 // echo $data['NumEdition'].; 
                  echo 'edition : '.$data['Annee'];
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
                   break;
               /* case 'Adresse' :
                  echo $data['Rue'].', '; 
                  echo $data['Ville'].', ';
                  echo $data['Pays'].'<br>'; 
                   break;  */
                case 'Libraire':
                  echo $data['CdeLibraire'].' ';
                  echo $data['Nom'].' '; 
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
                   break; 
                   
                  ;       
   
   
            }
             
         }
         
     
 
      }

?>






</body>
</html>