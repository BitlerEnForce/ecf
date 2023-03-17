<?php

require_once("navigation.php");

?>

<body>

<link rel="stylesheet" href="css/index3.css">

<section class="sec1">
  <h2>Restaurant rapide, et de qualité</h2>
  <p style="color: white;">
    Restaurant à l'ambiance traditionnelle locale,
    spécialisé dans les spécialités du coin
  </p>
</section>

<section class="sec2">
  <div class="titre">
    Partagez un moment convivial autour de nos spécialités régionales
  </div>
  <div class="contact">
    <p>0678651232</p>
    <p>10 rue Jean moulin Oyonnax</p>
  </div>
  <div class="description">
    Situé à Oyonnax dans le département de l’Ain, le Chalet Gourmand est un restaurant spécialisé dans la cuisine traditionnelle française et les spécialités savoyardes. Ouvert du mardi au dimanche, le restaurant dispose d’une capacité d’accueil de 40 couverts en salle et de 30 couverts sur une terrasse abritée.
    Pour vos repas en famille, entre amis ou encore pour l’organisation de vos évènements, notre équipe de restaurateurs vous reçoit dans une ambiance chaleureuse et conviviale et avec un grand choix de plats, disponibles à la carte ou en menus.
  </div>
  <a href="reservation.php" class="bouton reserver">Réserver maintenant</a>
</section>

<section class="sec3">
  <div class="image"></div>
  <div class="texte">
    <div class="titre">Spécialités au fromage et plats de saison, cuisinés par notre chef !</div>
    <div class="description">
      <p class="horaire" style="
        text-align: center;
        color: rgb(212, 138, 0);
        font-family: 'Bebas Neue', cursive;
        font-size: 25px;
        font-weight: 500;
        margin: 10px 0;
        ">
        Du lundi au vendredi, De 10h à 21h
      </p>
      Vous êtes amateurs de spécialités au fromage ? Notre chef vous prépare tout au long de l'année sa fondue au fromage suisse nature ou aux cèpes, sa raclette servie à volonté ou encore des boites chaudes au four. De quoi satisfaire les appétits des petits et des grands !
      Retrouvez également sur notre carte et sur nos menus d'autres spécialités comme de la viande, du poisson, des variantes au barbecue, sans oublier nos cuisses de grenouilles fraîches, préparées sur commande uniquement.
      Afin de varier les plaisirs, notre carte évolue au fil des saisons.
    </div>
  </div>
</section>

<section class="sec3-5">

  <div class="contenu-global">
    <div class="slider">
      <img class="active" src="https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?cs=srgb&dl=pexels-pixabay-260922.jpg&fm=jpg">
      <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&w=1000&q=80">
      <img src="https://media.cntraveler.com/photos/5b71ab67890b740fb9121ef5/3:2/w_3666,h_2444,c_limit/Hoogan-et-Beaufort__2018_ASP_3586.jpg">
    </div>

    <div class="cont-btn">
      <div class="btn-nav left">
        <span class="material-symbols-outlined">arrow_back_ios</span>
      </div>
      <div class="btn-nav right">
        <span class="material-symbols-outlined">arrow_forward_ios</span>
      </div>
    </div>
  </div>
  
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11035.66105110969!2d5.649803648449858!3d46.25191233177769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sle%20zola%20oyonnax!5e0!3m2!1sfr!2sfr!4v1678436617679!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe>

</section>

<section class="sec3-7">
  
</section>

<section class="sec4" id="carte">
  <div class="haut">
    <h3>A la carte</h3>
  </div>
  <div class="bas">
    <div class="titre">
      <p>Nos Entrées</p>
    </div>
    <div class="choix">
      <?php
      $categorie = "entree";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Plats</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "plat";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Viandes</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "viande";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Accompagnements</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "accompagnement";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Fromages</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "fromage";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Desserts</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "dessert";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="titre">
      <p>Nos Boissons</p>
    </div>
    <div class="choix">
    <?php
      $categorie = "boisson";
      $select = "SELECT * FROM cartes WHERE categorie = '$categorie'";
      $resultat = $db->query($select);
      while ($row = $resultat->fetchArray()) {
        ?>
        <div class="carte">
            <div class="image" style="background-image: url('<?= $row["img"]; ?>');"></div>
            <div class="description">
                <p><?= $row["titre"]; ?></p>
                <p><?= $row["prix"]; ?></p>
            </div>
        </div>
        <?php
      }
      ?>
    </div>

  </div>
</section>

<section class="sec5" id="avis">

  <h4 class="titre">Avis</h4>  

  <div class="contenu-global">

    <?php

    $select = "SELECT * FROM commentaires";
    $resultat = $db->query($select);
    while ($row = $resultat->fetchArray()) {
      ?>
      <div class="membre">
        <div class="identite">
          <p><?= $row["prenom_auteur"]; ?></p>
        </div>
        <hr>
        <div class="texte">
          <p><?= $row["commentaire"]; ?></p>
        </div>
      </div>
      <?php
    }
    ?>

  </div>

</section>

<footer>
  <div class="contact">
    <h3>Contact</h3>
    <p>Téléphone : 0678651232</p>
    <p>Adresse email : contactpro@gmail.com</p>
    <p>Adresse : 10 rue Jean moulin Oyonnax</p>
  </div>
</footer>

<script src="js/defilement-img.js"></script>

</body>

