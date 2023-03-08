<?php
require_once 'includes/membre_inc.php';
require_once 'includes/database_inc.php';
require_once 'includes/produit_inc.php';
require_once 'includes/panier_inc.php';
$db = new Database('localhost', 'site', 'root', '');
      $db->connect(); 
      $panier= new panier(); 
if(isset($_GET['titre']))
{
    $product = $db->query('SELECT titre FROM produit WHERE titre=:titre', array(':titre' => $_GET['titre']));
    var_dump($product);
    $panier->add($product[0]->titre);
    die (' <a href="javascript:history.back()">retouner</a>');
}

 

?>