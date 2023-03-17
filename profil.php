<?php

require_once "navigation.php";
require_once "securite.php";

?>

<body>

  <div class="contenu-global">

    <div class="contenu-infos-global">
      <!-- affichage des infos de l'utilisateur -->
      <?php 
      if (isset($_SESSION["auth"])) {
        ?>
        <div class="info">
          <p class="titre">Information de votre profil</p>
          <hr>
          <div class="identite">
            <p class="prenom"><?=  $_SESSION["prenom"]; ?></p>
            <p class="nom"><?=  $_SESSION["nom"]; ?></p>
          </div>
          <p class="email"><?=  $_SESSION["email"]; ?></p>
        </div>
        <?php
      }
      ?> 

      <!-- affichage des boutons et formulaires -->
      <?php
      if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
        ?>
        <a class="bouton mailto" href="mailto:pierrebenard@gmail.comù">Contacter le restaurateur</a>
        <?php
      }
      ?>
      <a class="bouton deconnexion" href="deconnexion.php">Se déconnecter</a>
      <?php
      if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
        ?>
        <a class="bouton suppression" href="suppressionMembre.php?id=<?= $_SESSION["id"]; ?>">Supprimer mon compte</a>
        <?php
      }
      ?>
    </div>

    <!-------------------- GESTION DES COMMENTAIRES -------------------->

    <?php
    if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
      ?>
      <div class="gestion-commentaire-global">
      <?php
  
      /* creation d'un commentaire */
      if (isset($_SESSION["auth"]) && $_SESSION["email"] != "admin@admin") {
        require_once "profil-php/commentaire.php";
      }
    }
    ?>
    </div>

    <!-------------------- GESTION DES MEMBRES -------------------->

    <div class="gestion-membres-global">
    <?php
    /* gestion des membres */
    if (isset($_SESSION["auth"]) && $_SESSION["email"] == "admin@admin") {
      require_once "profil-php/gestion-membres.php";
    }
    ?>
    </div>

    <!-------------------- GESTION DES MENUS -------------------->

    <?php
    /* gestion des menus */
    if (isset($_SESSION["auth"]) && $_SESSION["email"] == "admin@admin") {
      ?>
      <div class="gestion-menus-global">
      <?php
      require_once "profil-php/gestion-menu.php";
      ?>
      </div>
      <?php
    }
    ?>

    <!-------------------- GESTION DES RESERVATIONS -------------------->

    <div class="gestion-reservation-global">
      <?php
      /* gestion des reservations */
      require_once "profil-php/gestion-reservation.php";
      ?>
    </div>
  
  </div>

</body>

<link rel="stylesheet" href="css/profil2.css">

