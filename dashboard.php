<?php session_start(); ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gestion d’un éditeur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/31da9e16b2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<?php 
              include'connexion.php'; 
        ?>
  </head> 
  <body>


<!-- les modals ici: -->
    <div class="modal fade modalCss" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus pr-2" aria-hidden="true"></i>Ajouter <?php echo" ".$_POST['valeurChoisie'];?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
  <!--  COEUR DE POP UP de l'insertion: -->
 <?php 
    if(isset($_POST['valeurChoisie']))
    { $choix=$_POST['valeurChoisie'];
      switch($choix)
      { case 'Livre': ?> <!-- LIVRE: -->
            <form method="POST" action="#" >
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputISBN">ISBN</label>
                  <input type="text" class="form-control" id="inputISBN4" placeholder="ISBN" name="ISBN">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTitre">Titre</label>
                  <input type="text" class="form-control" id="inputTitre4" placeholder="Titre" name="Titre">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputAuteurs">Auteurs</label>
                  <select class="selectpicker"  name="option[]" multiple title="Choisie les auteurs"> 
                  <?php   
                    $req='SELECT Prenom, Nom, Pseudonyme FROM auteur ;';
                    $res=$bdd->prepare($req);
                    $res->execute();
                    while($data = $res->fetch())
                    echo '<option value="'.$data["Pseudonyme"].'">'.$data["Nom"].' '.$data["Prenom"].'</option>';
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPourcentage">Pourcentage</label>
                  <input type="text" class="form-control" id="inputPourcentage4" placeholder="Pourcentage" name="Pourcentage">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrize">Prize</label>
                  <input type="text" class="form-control" id="inputPrize" placeholder="Prize" name="Prize">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputAnnee">Annee d'edition</label>
                  <input type="text" class="form-control" id="inputAnnee" placeholder="Annee d'édition" name="Annee">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNb">Nombre d'exemplaire</label>
                  <input type="text" class="form-control" id="inputNb" placeholder="Nombre d'exemplaire" name="NombreExemplaire">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrix">Prix</label>
                  <input type="text" class="form-control" id="inputPrix" placeholder="Prix" name="Prix">  
                </div>
              </div>
              <button type="submit" class="btn bt-primary" name="ajouter"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
            </form>
      <?php break;            

      case 'Auteur': ?> <!-- AUTEUR: -->
            <form method="POST" action="#" >
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTitre">Nom</label>
                  <input type="text" class="form-control" id="inputNom" placeholder="Nom" name="Nom">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrenom">Prenom</label>
                  <input type="text" class="form-control" id="inputPrenom" placeholder="Prenom" name="Prenom">
                </div>
              </div>
              <button type="submit" class="btn bt-primary" name="ajouter"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
            </form>
      <?php break; 
      case 'Libraire': ?> <!-- LIBRAIRE: -->
            <form method="POST" action="#" >
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputTitre">Nom</label>
                  <input type="text" class="form-control" id="inputNom" placeholder="Nom" name="Nom">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPays">Pays</label>
                  <input type="text" class="form-control" id="inputPays" placeholder="Pays" name="Pays">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputVille">Ville</label>
                  <input type="text" class="form-control" id="inputVille" placeholder="Ville" name="Ville">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputRue">Rue</label>
                  <input type="text" class="form-control" id="inputRue" placeholder="Rue" name="Rue">
                </div>
              </div>
              <button type="submit" class="btn bt-primary" name="ajouter"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
            </form>
      <?php break;
            case 'Commande': ?> <!-- COMMANDE: -->
              <form method="POST" action="#" >
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCdeCommande">Code de la commande</label>
                    <input type="text" class="form-control" id="inputCdeCommande" placeholder="CdeCommande" name="CdeCommande">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputQuantite">Quantite</label>
                    <input type="text" class="form-control" id="inputQuantite" placeholder="Code de la commande" name="Quantite">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLibraire">Libraire</label>
                  <select class="selectpicker"  name="libraireC"  title="Choisie un libraire"> 
                  <?php   
                    $req='SELECT Nom, CdeLibraire FROM Libraire ;';
                    $res=$bdd->prepare($req);
                    $res->execute();
                    while($data = $res->fetch())
                    echo '<option value="'.$data["CdeLibraire"].'">'.$data["Nom"].'</option>';
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLivre">Titre de livre</label>
                  <select class="selectpicker"  name="TitreC" title="Choisie un livre"> 
                  <?php   
                    $req='SELECT ISBN, Titre FROM Livre ;';
                    $res=$bdd->prepare($req);
                    $res->execute();
                    while($data = $res->fetch())
                    echo '<option value="'.$data["ISBN"].'">'.$data["Titre"].'</option>';
                    ?>
                  </select>
                </div>
                <button type="submit" class="btn bt-primary" name="ajouter"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
              </form>
        <?php break; } } ?>
          </div>
        </div>
      </div>
    </div>

                        <!-- LE COEUR DE LA PAGE: -->
    <div class="entete">
      <div class="logo text-center"><img src="./img/logo.png"></div>
      <div class="titre h2 text-center">BIENVENUE SUR VOTRE ESPACE DE TRAVAIL</div>
      <div><div class="deconnexion"><a href="./index.html"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div></div>
    </div>

    <div class="page">
      <div class="image h-100 w-100"><img src="./img/library.jpg"></div>
      <div class="top">
        <div class="container">
          <div class="row pt-4 mt-3">
            <div class="col-9">
              <form method="POST" action="#">
                <div class="row">
                  <div class="col">
                    <select name="valeurChoisie" id="valeurChoisie" class="form-control">
				            <option value="Livre">Livre</option>
				            <option value="Auteur">Auteur</option>
			            	<option value="Libraire">Libraire</option>
			            	<option value="Commande">Commande</option>
                    </select>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn bt-primary"  name="Chercher"><i class="fa fa-search pr-2" aria-hidden="true" name="Chercher"></i> Chercher</button>
                  </div>
                </div>
              </form>
            </div>
<!-- BOUTTON AJOUTER:////////////////////////////////////////////////////// -->
            <div class="col-3">
              <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn bt-primary mb-2" style="float: right;"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Info</th>
              <th scope="col">Info 1</th>
              <th scope="col">Info 2</th>
              <th scope="col"></th>
            </tr>
          </thead>
          
 <!-- RWINNNAAA AFFICHAGE DINFORMATIONS ET SUPPRESSION: -->         
            
     <?php 
if(isset($_POST["Chercher"]))
{
  if(isset($_POST['valeurChoisie']))
  {
    $valeurChoisie=$_POST['valeurChoisie'];  
    $_SESSION["var"]=$valeurChoisie;

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
                $req='SELECT Rue, Ville, Pays, Nom, CdeLibraire FROM libraire ';  
                break; 
              break; 

          }  
  }

    $res=$bdd->prepare($req);
    $res->execute();
      while($data = $res->fetch())
  { switch($valeurChoisie)
    { 
        case 'Livre' : ?>
          <tbody> 
              <tr>
              <td class="pt-3"><?php echo $data["ISBN"]; ?></td>
              <td class="pt-3"><?php echo $data["Nom"]." ".$data["Prenom"];?></td>
              <td class="pt-3"><?php echo$data["Titre"];?></td>
              <td class="pt-2" style="float: right;">

          
           <?php 
          echo
            '<button type="button" class="btn bt-primary mr-2" data-toggle="modal" data-target="#id'.$data['ISBN'].$data["Pseudonyme"].'"><i class="fa fa-eye pr-2" aria-hidden="true"></i>Consulter
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
                       <button type="button" class="btn bt-primary mr-2"  data-dismiss="modal">Retourner</button>            
                              
                     </div>
                   </div>
                 </div>
               </div>';

          echo
            '<button type="button" onclick="window.location.href=\'dashboard.php?var='. $data["ISBN"].'\'" class="btn bt-primary mr-2" /><i class="fa fa-trash pr-2" aria-hidden="true"></i>Supprimer</button>'; ?>

              </td> 
            </tr>
          </tbody> 
        <?php 
        break; 
        case 'Auteur' : ?>
          <tbody> 
              <tr>
              <td class="pt-3"><?php echo$data["Prenom"]; ?></td>
              <td class="pt-3"><?php echo$data["Nom"];?></td>
              <td class="pt-3"><?php echo$data["Pseudonyme"];?></td>
              <td class="pt-2" style="float: right;">


                <?php
            echo
              '<button type="button" class="btn bt-primary mr-2" data-toggle="modal" data-target="#id'.$data['Pseudonyme'].'"><i class="fa fa-eye pr-2" aria-hidden="true"></i>
               Consulter
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
                      <button type="button" class="btn bt-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>'; 

            echo
               '<button type="button" onclick="window.location.href=\'dashboard.php?var='. $data["Pseudonyme"].'\'" class="btn bt-primary mr-2" /><i class="fa fa-trash pr-2" aria-hidden="true"></i>Supprimer</button>' ?>
              </td> 
            </tr>
          </tbody>
        <?php 
        break;  

        case 'Libraire' : ?>
          <tbody> 
              <tr>
              <td class="pt-3"><?php echo$data["CdeLibraire"]; ?></td>
              <td class="pt-3"><?php echo$data["Nom"];?></td>
              <td class="pt-2" style="float: right;">


                <?php
            echo'     
                <button type="button" class="btn bt-primary mr-2" data-toggle="modal" data-target="#id'.$data['CdeLibraire'].'"><i class="fa fa-eye pr-2" aria-hidden="true"></i>
                Consulter
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
                      <button type="button" class="btn bt-primary mr-2" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>'; 
              echo
                 '<button type="button" onclick="window.location.href=\'dashboard.php?var='. $data["CdeLibraire"].'\'" class="btn bt-primary mr-2" /><i class="fa fa-trash pr-2" aria-hidden="true"></i>Supprimer</button>' ?>
              </td> 
            </tr>
          </tbody> 
        <?php 
        break; 

        case 'Commande' : ?>
          <tbody> 
              <tr>
              <td class="pt-3"><?php echo$data["CdeCommande"]; ?></td>
              <td class="pt-3"><?php echo$data["Titre"];?></td>
              <td class="pt-2" style="float: right;">


                <?php
            echo
               '<button type="button" class="btn bt-primary mr-2" data-toggle="modal" data-target="#id'.$data['CdeCommande'].'"><i class="fa fa-eye pr-2" aria-hidden="true"></i>
                Consulter
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
                      <button type="button" class="btn bt-primary mr-2" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>'; 
            echo
                '<button type="button" onclick="window.location.href=\'dashboard.php?var='. $data["CdeCommande"].'\'" class="btn bt-primary mr-2" /><i class="fa fa-trash pr-2" aria-hidden="true"></i>Supprimer</button>' ?>
              </td> 
            </tr>
          </tbody>
       <?php 
       break;
    }
  }
} ?>
        </table>
      </div>
    </div>


  </body>     
</html>

     