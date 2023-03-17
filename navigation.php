<?php
require_once("db.php");
require_once("header.php");
?>
<link rel="stylesheet" href="css/navigation.css">
<header>
        <ul class="menu">
            <h1>Le Galtier</h1>
            <li><a href="index.php" class="onglet">Accueil</a></li>
            <li><a href="#carte" class="onglet">Carte</a></li>
            <li><a href="#avis" class="onglet">Avis</a></li>
            <?php
            if (!isset($_SESSION["auth"])) {
                ?>
                <li><a href="connexion.php" class="bouton-creux connexion">Se connecter</a></li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION["auth"])) {
                ?>
                <li><a href="profil.php" class="onglet"><span class="material-symbols-outlined">account_circle</span></a></li>
                <?php
            }
            ?>
        </ul>
        
        
        
        <div class="petit_menu">
            <span class="material-symbols-outlined">menu</span>
        </div>
    </header>

    <script>
        var small_menu = document.querySelector(".petit_menu");
        var menu = document.querySelector(".menu");
        small_menu.onclick = function(){
            console.log("click");
            small_menu.classList.toggle('active');
            menu.classList.toggle('small');
        }
    </script>