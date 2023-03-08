<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catchy 99</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/icon.png" type="images/png "/>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index_connecter.php">Catchy 99</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index_connecter.php">Home</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Catégorie
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">2</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">3</a></li>
                </ul>
              </li>



<!-- partie connecter wala le  ************************** *************************************************-->
               
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" >
                <?php
                

                session_start();
                if ($_SESSION['pseudo']!=null)
                {
                echo  $_SESSION['pseudo'] ;
                }
                else

                $_SESSION['pseudo']=null;
                ?>
                </a>
                
                </li>
                
                
                </li>

                <li class="nav-item">
                <?php
                
                
                 if($_SESSION['pseudo']==null)
                 {
                  echo '<a class="nav-link active" aria-current="page" href="connexion.html" >Connecter</a>';
                  echo '<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="registre.html" >
                    Registre
                    </a>';
                }
                  else if ($_SESSION['pseudo']!=null)
                  {
                    echo'<a class="nav-link active" aria-current="page" name="dec" href="index_connecter.php?logout=true" >deconnecter</a>';
                      
                    if (isset($_GET['logout']) && $_GET['logout'] == 'true')
                  {
                    $_SESSION['pseudo']=null;;
                    header ('location:index_connecter.php');
                    exit();
                  }
                  
                  
                  }
                 


                 
                
                
                ?>
              
              
                
              </li>
    
<!-- partie connecter wala le  ************************** *************************************************-->


            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>  
      

     

        
  <div class="row col-12 mt-4">
  <?php
      require_once 'includes/membre_inc.php';
      require_once 'includes/database_inc.php';
      require_once 'includes/produit_inc.php';
      require_once 'includes/panier_inc.php';
      $db = new Database('localhost', 'site', 'root', '');
      $db->connect(); 
       
      var_dump($_GET);
      var_dump($_SESSION);
       ?>
<!--   here  --->








         
          
          
        </div>
      </div>
    </div>
    
  </div>
  <form method="post">
  <button type="submit" name="supp" class="btn btn-primary">supprimer panier</button>
  </form>
  

<div class="bg-dark text-center p-5 mt-4">
<p class="text-white">
    Tout les droits reservés 2023
</p>


</div>

 </div>
 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>