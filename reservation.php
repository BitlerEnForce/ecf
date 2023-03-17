<?php
//require_once "navigation.php";
require_once "db.php";
if (isset($_POST["reserver"])) {
    date_default_timezone_set('Europe/Paris');
    $dateBrut = $_POST["reserver"];
    $dateBrut2 = new DateTime($dateBrut);
    $date = $dateBrut2->format('Y-m-d');
    $creneauBrut = $_POST['creneau'];
    $creneau = implode(',', $creneauBrut);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $nbrPersonne = htmlspecialchars($_POST["nbr_personne"]);
    $insertion = "INSERT INTO reservation (prenom, nom, date, nbr_personne, creneau) VALUES (:prenom, :nom, :date, :creneau, :nbr_personne)";
    $resultat = $db->prepare($insertion);
    $resultat->bindValue(":prenom", $prenom, SQLITE3_TEXT);
    $resultat->bindValue(":nom", $nom, SQLITE3_TEXT);
    $resultat->bindValue(":date", $date, SQLITE3_TEXT);
    $resultat->bindValue(":creneau", $creneau, SQLITE3_TEXT);
    $resultat->bindValue(":nbr_personne", $nbrPersonne, SQLITE3_TEXT);
    $resultat->execute();
    //$errorMsg = "Votre réservation a bien été enregistrer.";
    header("location: reservation-faites.php");
}
?>
<link rel="stylesheet" href="css/reservation.css">
<form method="post">
    <?php
    if (isset($_SESSION["auth"])) {
        ?>
        <input type="text" required name="prenom" placeholder="Prenom" value="<?= $_SESSION["prenom"] ?>">
        <input type="text" required name="nom" placeholder="Nom" value="<?= $_SESSION["nom"] ?>">
        <?php
    } else {
        ?>
        <input type="text" required name="prenom" placeholder="Prenom">
        <input type="text" required name="nom" placeholder="Nom">
        <?php
    }
    ?>
    <input type="date" required name="date">
    <select id="creneau" name="creneau[]">
        <option value="dejeuner">Déjeuner</option>
        <option value="diner">Diner</option>
    </select>
    <input type="text" id="nbr_personne" required name="nbr_personne" placeholder="Nombre de personne">
    <button class="bouton reserver" type="submit" name="reserver">Réserver</button>
</form>