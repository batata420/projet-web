<?php

require_once 'includes/database_inc.php';

$db = new Database('localhost', 'site', 'root', '');

class Membre {
    public $pseudo;
    public $nom;
    public $prenom;
    public $mdp;
    public $email;
    public $ville;
    public $cp;
    public $adresse;

    public function setMembre($data, $pdo) {
        $this->pseudo = $data['pseudo'];
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->mdp = $data['mdp'];
        $this->email = $data['email'];
        $this->ville = $data['ville'];
        $this->cp = $data['cp'];
        $this->adresse = $data['adresse'];
    
        $stmt = $pdo->prepare("INSERT INTO membre (pseudo, nom, prenom, mdp, email, ville, cp, adresse) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['pseudo'], $data['nom'], $data['prenom'], $data['mdp'], $data['email'], $data['ville'], $data['cp'], $data['adresse']]);
    
        if ($stmt->rowCount() > 0) {
            // If the query was successful
            $last_id = $pdo->lastInsertId();
            echo 'Connexion réussie';
        } else {
            echo "Erreur d'insertion";
        }
    }
    





    

//*************************************************************


    public function afficheclient($pdo) { //taffichi les client
        $stmt = $pdo->query('SELECT * FROM membre where statut=0');
        while ($row = $stmt->fetch()) {
          echo '<tr>';
          echo '<td>' . $row['id_member'] . '</td>';
          echo '<td>' . $row['pseudo'] . '</td>';
          echo '<td>' . $row['nom'] . '</td>';
          echo '<td>' . $row['prenom'] . '</td>';
          echo '<td>' . $row['mdp'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['ville'] . '</td>';
          echo '<td>' . $row['cp'] . '</td>';
          echo '<td>' . $row['adresse'] . '</td>';
          
         echo '<td>' . $row['statut'] . '</td>';
          
          echo '</tr>';
        }

       


        
    }

    //*************************************************************

    public function afficheadmin($pdo) { //taffichi les admin
        $stmt = $pdo->query('SELECT * FROM membre where statut=1');
        while ($row = $stmt->fetch()) {
          echo '<tr>';
          echo '<td>' . $row['id_member'] . '</td>';
          echo '<td>' . $row['pseudo'] . '</td>';
          echo '<td>' . $row['nom'] . '</td>';
          echo '<td>' . $row['prenom'] . '</td>';
          echo '<td>' . $row['mdp'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['ville'] . '</td>';
          echo '<td>' . $row['cp'] . '</td>';
          echo '<td>' . $row['adresse'] . '</td>';
          
         echo '<td>' . $row['statut'] . '</td>';
          
          echo '</tr>';
        }

       


        
    }

//*************************************************************

    function checkadmin($email, $mdp, $pdo) {
        $stmt = $pdo->prepare('SELECT * FROM membre WHERE email = ? AND mdp = ? AND statut = 1');
        $stmt->execute([$email, $mdp]);
        
        $result = $stmt->fetch();
        
        if ($result) {
            return 1;
            
        } 
    }


//*************************************************************


//*************************************************************

public static function getclient($email,$mdp, $pdo) {
    $stmt = $pdo->prepare('SELECT * FROM membre WHERE email = ? AND mdp = ? AND statut = 0');
    $stmt->execute([$email, $mdp]);
    $row = $stmt->fetch();
    
    if ($row) {
        $membre = new Membre();
        $membre->pseudo = $row['pseudo'];
        $membre->nom = $row['nom'];
        $membre->prenom = $row['prenom'];
        $membre->mdp = $row['mdp'];
        $membre->email = $row['email'];
        $membre->ville = $row['ville'];
        $membre->cp = $row['cp'];
        $membre->adresse = $row['adresse'];
        
        return $membre;
        
    } else {
        return die ('donnée invalide verifier votre mot de passe ou l adresse email <a href="javascript:history.back()">retouner</a>');;
        
    }
    
}


//*************************************************************

    function removeadmin($id_member,$pdo) {
        $stmt = $pdo->prepare("UPDATE membre SET statut = 0 WHERE id_member = ?");
            $stmt->execute([$id_member]);
            if ($stmt->rowCount() > 0) {
            echo "Membre suprimé.";
           } else {
            echo "Membre n'existe pas.";
        }


    }



//*************************************************************

    function addadmin($id_member,$pdo) {
        $stmt = $pdo->prepare("UPDATE membre SET statut = 1 WHERE id_member = ? and statut = 0");
        $stmt->execute([$id_member]);
        if ($stmt->rowCount() > 0) {
        echo "Membre ajouté.";
       } else {
        echo "membre n'existe pas";
             
   }
}



//*************************************************************

function removeclient($id_member,$pdo) {
    $stmt = $pdo->prepare("DELETE from membre WHERE id_member = ?");
        $stmt->execute([$id_member]);
        if ($stmt->rowCount() > 0) {
        echo "Membre suprimé.";
       } else {
        echo "Membre n'existe pas.";
    }


}



//*************************************************************

}
?>
