<link rel="stylesheet" href="../css/profil2.css">

<p class="titre-membre">Gestion des utilisateurs</p>

<?php
if (isset($_SESSION["auth"]) && $_SESSION["email"] == "admin@admin") {
  ?>
  <form method="get" class="form-rechercher">
    <input class="input-rechercher" type="text" name="nom" placeholder="Rechercher par un nom...">
    <button class="bouton rechercher" type="submit" name="recherche">Rechercher</button>
  </form>
  <?php
}
?>

<?php

if (isset($_SESSION["auth"]) && $_SESSION["email"] == "admin@admin") {
  $select = "SELECT * FROM membres WHERE id != 3";

  if (isset($_GET['nom'])) {
    $requete = htmlspecialchars($_GET['nom']);
    $select = "SELECT * FROM membres WHERE nom LIKE '%$requete%' AND nom != 'admin'";
  }

  $resultat = $db->query($select);
  ?>
  <div class="membre-global">
  <?php
  while ($row = $resultat->fetchArray()) {
    ?>
    <div class="membre-gestion">
      <div class="info-membre">
        <p><?= $row["id"]; ?></p>
        <p><?= $row["prenom"]; ?></p>
        <p><?= $row["nom"]; ?></p>
        <p><?= $row["email"]; ?></p>
      </div>
      <div class="espace_bouton">
        <a class="bouton suppression" href="suppressionMembre.php?id=<?= $row["id"]; ?>">Supprimer cet utilisateur</a>
      </div>
    </div>
    <?php
  }
  ?>
  </div>
  <?php
}
?>

<?php

?>