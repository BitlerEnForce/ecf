<?php

$db = new SQLite3("../bdd.db");

$idGet = $_GET["id"];

$suppression = "DELETE FROM cartes WHERE id = $idGet";
$db->exec($suppression);

header("location: ../profil.php");

/*
require_once "../db.php";

$idGet = $_GET["id"];

//$suppression = "DELETE FROM cartes WHERE id = '$idGet'";
//$db->exec($suppression);
$stmt = $db->prepare("DELETE FROM cartes WHERE id = :id");
$stmt->bindValue(':id', $idGet, SQLITE3_INTEGER);

//Exécution de la requête
$result = $stmt->execute();

echo "fait";

//header("location: ../profil.php");*/

?>