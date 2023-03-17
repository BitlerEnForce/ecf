<?php

require_once "db.php";

$idGet = $_GET["id"];

$suppression = "DELETE FROM membres WHERE id = $idGet";
$db->exec($suppression);

header("location: profil.php");

?>