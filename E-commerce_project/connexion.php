<?php
session_start();
require_once 'includes/membre_inc.php';
require_once 'includes/database_inc.php';

try{
    $db = new Database('localhost', 'site', 'root', '');
$pdo = $db->connect();


$mdp = $_POST['mdp'];
$email = $_POST['email'];

$membre=new Membre();

if($membre->checkadmin($email, $mdp, $pdo)==1)

header('location:dash.php');


else{

    $membre=$membre->getclient($email,$mdp,$pdo);
    $_SESSION['pseudo']=$membre->pseudo;
    header('Location: index_connecter.php');

}
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>