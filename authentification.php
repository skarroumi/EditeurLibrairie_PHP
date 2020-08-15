<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>
<!------ Include the above in your HEAD tag ---------->
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div id="formFooter">
      <p class="underlineHover" >Se connecter </p>
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name ='log' class="fadeIn fourth" value="Log In">
    </form>
    <?php
    include'connexion.php';
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





    ?>

    

  </div>
</div>
</body>
</html>