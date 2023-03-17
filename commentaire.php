<p class="titre">Laissez un avis</p>

<?php
if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
    ?>
    <form method="post">
        <textarea required name="commentaire" placeholder="Votre avis sur le restaurant" cols="30" rows="10"></textarea>
        <button class="mailto" type="submit" name="valide">Poster le commentaire</button>
    </form>
    <?php
}
?>

<?php

//require_once "../db.php";

/* creation d'un commentaire */
if (isset($_POST["valide"])) {
    $commentaire = htmlspecialchars($_POST["commentaire"]);
    $idAuteur = $_SESSION["id"];
    $prenomAuteur = $_SESSION["prenom"];
    $nomAuteur = $_SESSION["nom"];

    $insertion = "INSERT INTO commentaires (id_auteur, prenom_auteur, nom_auteur, commentaire, etoile) VALUES (:id_auteur, :prenom_auteur, :nom_auteur, :commentaire, :etoile)";
    $stmt = $db->prepare($insertion);
    $stmt->bindValue(':id_auteur', $idAuteur, SQLITE3_TEXT);
    $stmt->bindValue(':prenom_auteur', $prenomAuteur, SQLITE3_TEXT);
    $stmt->bindValue(':nom_auteur', $nomAuteur, SQLITE3_TEXT);
    $stmt->bindValue(':commentaire', $commentaire, SQLITE3_TEXT);
    $stmt->bindValue(':etoile', 5, SQLITE3_TEXT);
    $stmt->execute();
}

?>