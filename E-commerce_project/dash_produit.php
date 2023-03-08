


<!doctype html>

<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">
    <!-- head content -->
  </head>
  <body>


  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Catchy 99 admin</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="connexion.html">Deconnexion</a>
        </li>
      </ul>
    </nav>


    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="dash.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Catégories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dash_produit.php">
                  <span data-feather="shopping-cart"></span>
                  produit
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dash_client.php">
                  <span data-feather="users"></span>
                  client
                </a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="dash_admin.php">
                  <span data-feather="users"></span>
                  admin
                </a>
              </li>
              
              
            </ul>

          
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <form name="f" class="form" method="post" action="http://127.0.0.1/E-commerce_project/dash_produit.php">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            <tr>
                
            <th><h1 class="h2">produit    </h1></th> 


           



            <th> &emsp; &emsp; &emsp; &emsp; <button class="btn btn-danger btn-sm remove-admin" name="bdelet" >supprimer</button></th>
            <th> <input class="form-control form-control-dark w-100" type="text" name="delet" placeholder="Search" aria-label="Search"></th>


            <?php






                 require_once 'includes/membre_inc.php';
                 require_once 'includes/database_inc.php';
                 require_once 'includes/produit_inc.php';
          if(isset($_POST['bdelet']) && isset($_POST['delet'])) {
            $id_produit = $_POST['delet'];
                   
              $db = new Database('localhost', 'site', 'root', '');
            $pdo = $db->connect();
            $produit = new produit();
            $produit->removeproduit($id_produit,$pdo);
                 
                 }


                 ?>


                

               



            


</form>
<thread>
            </tr>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                <th>id_produit</th>
                  <th>reference</th>
                  <th>categorie</th>
                  <th>titre</th>
                  <th>description</th>
                  <th>photo</th>
                  <th>prix</th>
                  <th>stock</th>
                  
                  
                </tr>
                
                <form name="f" class="form" method="post" action="http://127.0.0.1/E-commerce_project/dash_produit.php" >
                <tr>
                <th></th>
                  <th><input type="text" name="ref" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" required></th>
                  <th><input type="text" name="cat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" required></th>
                  <th><input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" required></th>
                  <th><input type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" required></th>
                  <th><input type="text" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" required></th>
                  <th><input type="text" name="prix" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" pattern="[0-9]+" required></th>
                  <th><input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholder" pattern="[0-9]+" required></th>
                  <th><button type="submit" name="badd" class="btn btn-primary">ajouter</button></th>
                </tr>
                </form>
                <?php
                require_once 'includes/membre_inc.php';
                require_once 'includes/database_inc.php';
                require_once 'includes/produit_inc.php';

                if(isset($_POST['badd']) ) {
                 

                 $db = new Database('localhost', 'site', 'root', '');
                 $pdo = $db->connect();
             
                 
                 $produit=new produit();
                 $produit->setproduit($_POST,$pdo);
                
                }
                
                ?>
              </thead>
              <tbody>
                <?php
               
               require_once 'includes/membre_inc.php';
               require_once 'includes/database_inc.php';
               require_once 'includes/produit_inc.php';
               
               $db = new Database('localhost', 'site', 'root', '');
               $pdo = $db->connect();
               $produit=new produit();
               $produit->afficheproduit($pdo);

                  
                 
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    
    <!-- scripts -->
  </body>
</html>
