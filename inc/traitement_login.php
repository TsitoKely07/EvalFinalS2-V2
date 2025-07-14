<?php
include ('functions.php');
session_start();
$bdd=connect_base();
$mail=$_POST['mail'];
$mdp=$_POST['mdp'];
$sq =("SELECT * FROM membre WHERE email = '$mail'");
$resultat=mysqli_query($bdd,$sq);
$donnees = mysqli_fetch_assoc($resultat);
if($donnees!=null){
if($mdp==$donnees['mot_de_passe']){
    $_SESSION['utilisateur']=$donnees;
    header('Location:../pages/listes_objet.php');
}else{
    echo'Echec de la connexion';
    echo '<a href="../pages/login.php">Retour</a>';
}}else{
    echo'Echec de la connexion';
    echo '<a href="../pages/login.php">Retour</a>';
}

?>