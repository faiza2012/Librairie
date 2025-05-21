-- CRÉATION DE LA BASE
DROP DATABASE IF EXISTS librairie;
CREATE DATABASE librairie CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE librairie;

-- TABLE CATEGORIE
CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO categorie (nom) VALUES
('Aventure'),
('Conte'),
('Roman historique'),
('Dystopie'),
('Poésie');

-- TABLE EDITEUR
CREATE TABLE editeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO editeur (nom) VALUES
('Éditions Soleil'),
('Hachette'),
('Gallimard');

-- TABLE LIVRE
CREATE TABLE livre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    auteur VARCHAR(100),
    description TEXT,
    nombre_page INT,
    prix DOUBLE,
    edition INT,
    categorie_id INT,
    editeur_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categorie(id),
    FOREIGN KEY (editeur_id) REFERENCES editeur(id)
);

INSERT INTO livre (titre, auteur, description, nombre_page, prix, edition, categorie_id, editeur_id) VALUES
('Goldorack', 'nagui le glorieux', 'Une aventure de science-fiction avec des robots géants.', 250, 26.99, 1, 1, 1),
('Petit Poussin', 'claire de lune', 'Un conte pour enfants sur un poussin courageux.', 120, 9.99, 1, 2, 2),
('Zouzou et ses amis', 'zaky pepou', 'Une histoire amusante sur l’amitié et l’entraide.', 200, 15.50, 1, 1, 3),
('Mexico Go', 'pepe de maria', 'Un roman d’aventure se déroulant au Mexique.', 300, 18.75, 1, 3, 1),
('Funky Town', 'bee bee', 'Un récit plein d’humour et de musique.', 275, 22.99, 1, 4, 2);
