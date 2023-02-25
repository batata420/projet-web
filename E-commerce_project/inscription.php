<?php
$con=mysqli_connect("localhost","root","","projet_web");
if(!$con) 
{
die ('erreur').mysqli_connect_error();
}
if (isset($_POST["cin"]) && isset($_POST["nom"]) && isset($_POST["pren"])&& isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["mdp"]))
    { if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["pren"]) && !empty($_POST["email"]) && !empty($_POST["tel"]) && !empty($_POST["mdp"])) 
        {
            $cin = $_POST['cin'];
            $n= $_POST['nom'];
            $p=$_POST['pren'];
            $em=$_POST['email'];
            $tel=$_POST['tel'];
            $mot=$_POST['mdp'];
            $type = 'user';
            $req="INSERT INTO inscription VALUES ('$cin','$n','$p','$em','$tel','$mot','$type')";
            if (mysqli_query($con,$req))
            {
                header("location: index.php"); 
            }
            else
            {
            echo " erreur d inscription";
            }
            mysqli_close($con);
        }

     }

?>