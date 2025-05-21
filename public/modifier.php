<?php
require_once "../Classe/Livre.php";

$livre = new Livre();

if (!isset($_GET['id'])) {
    echo "ID manquant";
    exit;
}

$id = $_GET['id'];
$livreInfo = $livre->getById($id);
if (!$livreInfo) {
    echo "Livre introuvable";
    exit;
}

$categories = $livre->query("SELECT id, nom FROM categorie")->fetchAll();
$editeurs = $livre->query("SELECT id, nom FROM editeur")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        "id" => $_POST["id"],
        "titre" => $_POST["titre"],
        "auteur" => $_POST["auteur"],
        "prix" => $_POST["prix"],
        "categorie_id" => $_POST["categorie"],
        "editeur_id" => $_POST["editeur"]
    ];

    $livre->modifier($data);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un livre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="banner">
    <img src="images/form.jpg" alt="Modifier un livre">
</div>

<div class="form-container">
    <h1>Modifier un livre</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $livreInfo['id'] ?>">

        <label>Titre:</label>
        <input type="text" name="titre" value="<?= htmlspecialchars($livreInfo['titre']) ?>" required>

        <label>Auteur:</label>
        <input type="text" name="auteur" value="<?= htmlspecialchars($livreInfo['auteur']) ?>" required>

        <label>Prix:</label>
        <input type="number" step="0.01" name="prix" value="<?= $livreInfo['prix'] ?>" required>

        <label>Catégorie:</label>
        <select name="categorie" required>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $livreInfo['categorie_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Éditeur:</label>
        <select name="editeur" required>
            <?php foreach ($editeurs as $ed): ?>
                <option value="<?= $ed['id'] ?>" <?= ($ed['id'] == $livreInfo['editeur_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($ed['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Modifier</button>
    </form>
    <a class="back-link" href="index.php">⬅ Retour à la liste</a>
</div>
</body>
</html>
