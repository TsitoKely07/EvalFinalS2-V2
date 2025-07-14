<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: ../pages/login.php");
    exit;
}

require_once 'functions.php';
$conn = connect_base();

$id_membre = $_SESSION['utilisateur']['id_membre'] ?? null;
if (!$id_membre) {
    header("Location: ../pages/login.php");
    exit;
}

if (empty($_POST['nom_objet']) || empty($_POST['id_categorie'])) {
    die("Erreur : le nom et la catégorie sont obligatoires.");
}

$nom_objet = trim($_POST['nom_objet']);
$id_categorie = intval($_POST['id_categorie']);
$description = isset($_POST['description']) ? trim($_POST['description']) : '';

$sql = "INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sii", $nom_objet, $id_categorie, $id_membre);
mysqli_stmt_execute($stmt);
$id_objet = mysqli_insert_id($conn);
mysqli_stmt_close($stmt);

$uploadDir = __DIR__ . '/../assets/uploads/';
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

$nbImagesAjoutees = 0;

if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    $nbFiles = count($_FILES['images']['name']);

    for ($i = 0; $i < $nbFiles; $i++) {
        $error = $_FILES['images']['error'][$i];
        if ($error !== UPLOAD_ERR_OK) {
            continue;
        }

        $tmpName = $_FILES['images']['tmp_name'][$i];
        $originalName = $_FILES['images']['name'][$i];
        $size = $_FILES['images']['size'][$i];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmpName);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            continue;
        }

        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            continue;
        }

        $newName = uniqid('img_') . '.' . $extension;

        if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
            $stmt = mysqli_prepare($conn, "INSERT INTO images_objet (id_objet, nom_image) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "is", $id_objet, $newName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $nbImagesAjoutees++;
        }
    }
}


header("Location: ../pages/listes_objet.php?success=1");
exit;
?>
