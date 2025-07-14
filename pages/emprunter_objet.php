<?php
session_start();
include("../inc/functions.php");
$bdd = connect_base();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_objet = isset($_POST['id_objet']) ? intval($_POST['id_objet']) : 0;
    $jours = isset($_POST['jours']) ? intval($_POST['jours']) : 1;
    if ($id_objet > 0 && $jours > 0) {
        $date_emprunt = date('Y-m-d');
        $date_retour = date('Y-m-d', strtotime("+$jours days"));


        $sql = "INSERT INTO emprunts (id_objet, date_emprunt, date_retour) VALUES (?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("iss", $id_objet, $date_emprunt, $date_retour);
            if ($stmt->execute()) {
                header("Location: listes_objet.php?success=1");
                exit();
            } else {
                echo "Erreur lors de l'enregistrement de l'emprunt : " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête : " . $bdd->error;
        }
    } else {
        echo "Données invalides pour l'emprunt.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
