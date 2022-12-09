<?php
$pdo = new PDO('mysql:dbname=projet_web;host=localhost','root', '' , [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$query=$pdo->query('SELECT * FROM produit');
$articles=$query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
<title>
    9oFty.tn
</title>
<link rel="shortcut icon" href="images/chariot.png">
<link rel="stylesheet" href="css/cata.css">
<script href="js/cataa.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="icon">
            <h2 class="logo"><i class="fa-regular fa-cart-shopping"></i>9oFty.tn</h2>
        </div>

        <div class="menu">
            <ul> 
                
                
                <li><a href="catalogues.php" >PRODUITS</a></li>
                <li><a href="#footer" >CONTACT</a></li>
                <li><a href="index.php" >LOGIN</a></li>
                <li><a href="account.php" >REGISTER</a></li>
            </ul>
        </div>
        <div class="search">
            <input class="srch" type="search" name="" placeholder="Type To text">
            <a href="#"> <button class="btn">Search</button></a>
        </div>
       

    </div> 

<form  name="f" action="mailto:9oFty1234@gmail.com">
<section class="cont">
    <?php foreach($articles as $article): ?>
        <div class="card"> 
            <div class="card-image prod-<?= htmlentities($article->num) ?>" > 
            </div>
            <h2><?= htmlentities($article->nom) ?></h2>
            <p><?= htmlentities($article->prix)  ?> Millimes </p>
            <p><?= htmlentities($article->remise)  ?> %</p>
        </div>
    <?php endforeach ?>
</section>
<input class="passer" type="submit" value="passer commande">
<div class="page">
<a href="#"> < </a>
<a href="#">1</a>
<a href="#">2</a>
<a href="#">3</a>
<a href="#">...</a>
<a href="#">></a>
</div>


</form>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<footer id="footer">

    <p class="Fin">Find us on : </p> <br>
    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>

    <br><br> 
    <div class="num">
    <p>Contact us</p>
    <p>+216 33 428 215</p>
    <p>9oFty1234@gmail.com</p>
    </div>
</footer>
</body>

</html>
