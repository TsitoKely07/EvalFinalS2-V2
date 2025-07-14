<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit;
}

require_once '../inc/functions.php';
$conn = connect_base();

$req = "SELECT id_categorie, nom_categorie FROM categorie_objet";
$result = mysqli_query($conn, $req);
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un objet</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>

<main class="container">
    <h1>Ajouter un nouvel objet</h1>

    <form action="../inc/traitement-upload.php" method="POST" enctype="multipart/form-data" class="form-ajout-objet">
        
        <label for="nom_objet">Nom de l'objet:</label>
        <input type="text" name="nom_objet" id="nom_objet" required>

        <label for="id_categorie">Categorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            <option value="">Choisir une categorie</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id_categorie'] ?>"><?= ($cat['nom_categorie']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="description">Description (optionnelle)</label>
        <textarea name="description" id="description" rows="4"></textarea>

        <label for="images">Images de l'objet (plusieurs possibles)</label>
        <input type="file" name="images[]" id="images" multiple accept="image/*">
        <p class="note">La première image sera l’image principale affichee sur la liste.</p>

        <button type="submit" name="ajouter_objet">Ajouter l'objet</button>
    </form>
</main>

</body>
</html>
