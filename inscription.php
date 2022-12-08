<?php

 

$con=mysqli_connect("localhost","root","","projet_web");
if(!$con) 
{
die ('erreur').mysqli_connect_error();
}
 

 $cin=$_POST['cin'];
 $n=$_POST['nom'];
 $p=$_POST['pren'];
 $em=$_POST['email'];
 $tel=$_POST['tel'];
 $mot=$_POST['mdp'];
$req="INSERT INTO inscription VALUES ('$cin','$n','$p','$em','$tel','$mot')";

if (mysqli_query($con,$req))
{
 echo "inscription reussi";
}
else
{
echo " erreur d inscription";
}
mysqli_close($con);
?>