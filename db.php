<?php
session_start();
class Database extends SQLite3 {
    function __construct()
    {
        $this->open("bdd.db");
    }
}
$db = new Database;
$table = "CREATE TABLE IF NOT EXISTS membres 
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        prenom VARCHAR(10),
        nom VARCHAR(10),
        email VARCHAR(10),
        mdp VARCHAR(20)
    )";
$db->exec($table);
$table2 = "CREATE TABLE IF NOT EXISTS commentaires 
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        id_auteur INT,
        prenom_auteur VARCHAR(10),
        nom_auteur VARCHAR(10),
        commentaire VARCHAR(10),
        etoile INT
    )";
$db->exec($table2);
$table3 = "CREATE TABLE IF NOT EXISTS items
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        texte VARCHAR(10),
        classe VARCHAR(20)
    )";
$db->exec($table3);
$table3 = "CREATE TABLE IF NOT EXISTS cartes
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        img TEXT,
        titre VARCHAR(20),
        prix VARCHAR(10),
        categorie VARCHAR(10)
    )";
$db->exec($table3);
$table3 = "CREATE TABLE IF NOT EXISTS reservation
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        prenom VARCHAR(20),
        nom VARCHAR(20),
        date VARCHAR(10),
        nbr_personne INT,
        creneau TEXT
    )";
$db->exec($table3);