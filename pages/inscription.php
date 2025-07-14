<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Gestion emprunt</title>
</head>
<body>
<div class="en_tete">

    </div>
        <form action="../inc/traitement_inscription.php" method="post">
        <div class="formulaire1">
            <div class="txt"><h1>Veuillez entrer vos information</h1></div>
            <div class="info">
                <div class="row">Nom : <div class="rempl"><input type="text" name="nom"></div></div>
                <div class="row">Date(naissance) : <div class="rempl"><input type="date" name="date"></div></div>
                <div class="row">Email : <div class="rempl"><input type="text" name="mail"></div></div>
                <div class="row">Mot de passe : <div class="rempl"><input type="password" name="mdp"></div></div>
            </div>
            <input type="submit" value="Creer" class="con">
        </div>
        </form>

</body>
<footer>
<form action="../index.php" method="post">
            <input type="submit" value="Retour" class="con">
        </form>
</footer>
</html>