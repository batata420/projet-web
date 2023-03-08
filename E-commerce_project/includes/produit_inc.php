<?php

require_once 'includes/membre_inc.php';
require_once 'includes/database_inc.php';

$db = new Database('localhost', 'site', 'root', '');

class produit {
    public $reference;
    public $categorie;
    public $titre;
    public $description;
    public $photo;
    public $prix;
    public $stock;
    

   public function setproduit($data,$pdo){
 
        $this->reference = $data['ref'];
        $this->categorie = $data['cat'];
        $this->titre = $data['titre'];
        $this->description = $data['desc'];
        $this->photo = $data['photo'];
        $this->prix = $data['prix'];
        $this->stock = $data['stock'];
       //mis a jour du produit si la reference existe deja */
        $stmt = $pdo->prepare("
        INSERT INTO produit ( reference, categorie, titre, descrip, photo, prix, stock)
        VALUES ( ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            categorie = VALUES(categorie),
            titre = VALUES(titre),
            descrip = VALUES(descrip),
            photo = VALUES(photo),
            prix = VALUES(prix),
            stock = VALUES(stock)
    ");
    $stmt->execute([ $data['ref'], $data['cat'], $data['titre'], $data['desc'], $data['photo'], $data['prix'], $data['stock']]);
    
   }

/************************************************************************ */

        public function afficheproduit($pdo) { //taffichi les produit
            $stmt = $pdo->query('SELECT * FROM produit ');
            while ($row = $stmt->fetch()) {
              echo '<tr>';
              echo '<td>' . $row['id_produit'] . '</td>';
              echo '<td>' . $row['reference'] . '</td>';
              echo '<td>' . $row['categorie'] . '</td>';
              echo '<td>' . $row['titre'] . '</td>';
              echo '<td>' . $row['descrip'] . '</td>';
              echo '<td>' . $row['photo'] . '</td>';
              echo '<td>' . $row['prix'] . '</td>';
              echo '<td>' . $row['stock'] . '</td>';
             
              
              echo '</tr>';
            }
    
           
    
    
            
        }
        //*************************************************************

function removeproduit($id_produit,$pdo) {
  $stmt = $pdo->prepare("DELETE from produit WHERE id_produit = ?");
      $stmt->execute([$id_produit]);
      if ($stmt->rowCount() > 0) {
      echo "produit suprimé.";
     } else {
      echo "produit n'existe pas.";
  }


}



//*************************************************************




}
?>