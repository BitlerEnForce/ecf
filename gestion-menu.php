
<div class="titre-gestion-menu" id="menu">
    <p class="gestion-menu">Gestion des menus</p>
</div>

<form class="form-gestion-menu" method="post">
    <p class="ajout-menu">Ajouter un plat</p>
    <input type="text" required name="img" placeholder="Url de l'image">
    <input type="text" required name="titre" placeholder="Titre du plat">
    <input type="text" required name="prix" placeholder="Prix">
    <label for="type-plat">Type de plat</label>
    <select id="type-plat" name="type-plat[]">
        <option value="entree">Entrée</option>
        <option value="plat">Plat</option>
        <option value="viande">Viande</option>
        <option value="accompagnement">Accompagnement</option>
        <option value="fromage">Fromage</option>
        <option value="dessert">Dessert</option>
        <option value="boisson">Boisson</option>
    </select>
    <input class="bouton ajouter" type="submit" name="menu-valide" value="Ajouter">
</form>

<form method="get" class="form-rechercher" action="#contenu-global-menu">
    <input class="input-rechercher" type="text" name="titre" placeholder="Rechercher par un nom...">
    <button class="bouton rechercher" type="submit" name="recherche">Rechercher</button>
</form>

<?php

if (isset($_POST['menu-valide'])) {
    $categorieBrut = $_POST['type-plat'];
    $categorie = implode(',', $categorieBrut);
    $img = htmlspecialchars($_POST["img"]);
    $titre = htmlspecialchars($_POST["titre"]);
    $prix = htmlspecialchars($_POST["prix"]);
    $insertion = "INSERT INTO cartes(img, titre, prix, categorie) VALUES('$img', '$titre', '$prix', '$categorie')";
    $db->exec($insertion);
}

$select = "SELECT * FROM cartes";

if (isset($_GET['titre'])) {
    $requete = htmlspecialchars($_GET['titre']);
    $select = "SELECT * FROM cartes WHERE titre LIKE '%$requete%'";
}

?>

<div class="contenu-global-menu" id="contenu-global-menu">

    <?php
    $resultat = $db->query($select);
    while ($row = $resultat->fetchArray()) {
        ?>
        <div class="menu-global">
            <div class="texte-menu">
                <div class="infos">
                    <p><?= $row["id"]; ?></p>     
                    <p><?= $row["titre"]; ?></p>
                    <p><?= $row["prix"]; ?></p>
                    <p><?= $row["categorie"]; ?></p>
                </div>
                <div class="url">
                    <p class="url-a-copier"><?= $row["img"]; ?></p>
                </div>  
            </div>
            <div class="bouton-menu">
                <a href="modifier-plat.php?id=<?= $row["id"]; ?>" class="bouton modifier">Modifier</a>
                <a href="profil-php/supprimer-plat.php?id=<?= $row["id"]; ?>" class="bouton supprimer">Supprimer</a>
            </div>
        </div>
        <?php
    }

    ?>

</div>

<p class="notif-copiage">Texte copié dans la presse papier</p>
