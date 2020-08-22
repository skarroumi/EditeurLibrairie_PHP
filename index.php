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

    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
  </head> 
  <body>

  <?php  include'connexion.php';  ?>

    <!-- les modals ici: -->
    <div class="modal fade modalCss" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus pr-2" aria-hidden="true"></i>Ajouter un livre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
              <button type="submit" class="btn bt-primary"><i class="fa fa-plus pr-2" aria-hidden="true"></i> Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="entete">
      <div class="logoIndex text-center"><img src="./img/logo.png"></div>
    </div>

    <div class="page">
      <div class="image h-100 w-100"><img src="./img/library.jpg"></div>
      <div class="index">
        <div class="container">
          <div class="row">
            <div class="col-12 connexion">
              <h1 class="titleL title-form mt-3 pb-3" style="color: #111; font-family: 'Advent Pro';">SE CONNECTER</h1>
              <form  method="POST" action="connexion.php">
                <div class="input-group input-group-lg mb-3">
                  <input type="text" name="login" class="form-control input_pass" value="" placeholder="Email" required>
                </div>
                <div class="input-group input-group-lg mb-4">
                  <input type="password" name="password" class="form-control input_pass" value="" placeholder="Mot de passe" required>
                </div>
                <button type="submit" name="log" class="btn bt-primary mb-4">Se connecter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>     
</html>