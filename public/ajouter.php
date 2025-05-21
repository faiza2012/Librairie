<?php
require_once "../Classe/Livre.php";

$livre = new Livre();
$categories = $livre->query("SELECT id, nom FROM categorie")->fetchAll();
$editeurs = $livre->query("SELECT id, nom FROM editeur")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        "titre" => $_POST["titre"],
        "auteur" => $_POST["auteur"],
        "prix" => $_POST["prix"],
        "categorie_id" => $_POST["categorie"],
        "editeur_id" => $_POST["editeur"]
    ];

    $livre->ajouter($data);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="banner">
    <img src="images/form.jpg" alt="Formulaire Livre">
</div>

<div class="form-container">
    <h1>Ajouter un nouveau livre</h1>
    <form method="POST">
        <label>Titre:</label>
        <input type="text" name="titre" required>

        <label>Auteur:</label>
        <input type="text" name="auteur" required>

        <label>Prix:</label>
        <input type="number" step="0.01" name="prix" required>

        <label>Catégorie:</label>
        <select name="categorie" required>
            <option value="">-- Choisir une catégorie --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Éditeur:</label>
        <select name="editeur" required>
            <option value="">-- Choisir un éditeur --</option>
            <?php foreach ($editeurs as $ed): ?>
                <option value="<?= $ed['id'] ?>"><?= htmlspecialchars($ed['nom']) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Ajouter</button>
    </form>
 

    <a class="back-link" href="index.php">⬅ Retour à la liste</a>
</div>
</body>
</html>
