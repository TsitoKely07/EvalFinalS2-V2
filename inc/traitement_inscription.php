<?php
include ("functions.php");
$bdd=connect_base();

$nom         = $_POST['nom'];
$date = $_POST['date'];
$mail       = $_POST['mail'];
$mdp  = $_POST['mdp'];

$sql = sprintf("INSERT INTO membre (nom, dataNaissance, email,mot_de_passe) VALUES ('%s', '%s', '%s', '%s')",
               $nom, $date, $mail, $mdp);
?>