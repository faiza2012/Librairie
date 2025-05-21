<?php
require_once "../Classe/Livre.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $livre = new Livre();
    $livre->supprimer($id);

    header("Location: index.php");
    exit();
}
?>
