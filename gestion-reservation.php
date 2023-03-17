<p class="titre">Gestion des réservations</p>

<div class="reservation">

<?php

$sessionPrenom = $_SESSION["prenom"];

if (isset($_SESSION["auth"]) && $_SESSION["email"] == "admin@admin") {
    $select = "SELECT * FROM reservation ORDER BY id DESC";
}

if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
    $select = "SELECT * FROM reservation WHERE prenom == '$sessionPrenom'";
}


$resultat = $db->query($select);
while ($row = $resultat->fetchArray()) {
?>
<div class="reservation-global">
    <p><?= $row["id"]; ?></p>
    <p><?= $row["prenom"]; ?></p>
    <p><?= $row["nom"]; ?></p>
    <p><?= $row["date"]; ?></p>
    <p><?= $row["creneau"]; ?></p>
    <p><?= $row["nbr_personne"]; ?></p>
</div>
<?php
}

?>

</div>