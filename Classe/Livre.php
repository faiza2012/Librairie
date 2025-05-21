<?php
require_once("Database.php"); 

class Livre extends Database {
    protected $table = "livre";

    public function getWithDetails() {
        $sql = "SELECT livre.id, livre.titre, livre.auteur, livre.prix,
                       categorie.nom AS categorie,
                       editeur.nom AS editeur
                FROM livre
                JOIN categorie ON livre.categorie_id = categorie.id
                JOIN editeur ON livre.editeur_id = editeur.id";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
    

    public function getById($id) {
        return $this->selectId($this->table, $id);
    }

    public function ajouter($data) {
        return $this->insert($this->table, $data);
    }

    public function modifier($data) {
        return $this->update($this->table, $data);
    }

    public function supprimer($id) {
        return $this->delete($this->table, $id);
    }
}
