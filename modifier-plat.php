
<?php

require_once "navigation.php";

$idGet = $_GET["id"];

$selection = "SELECT * FROM cartes WHERE id = $idGet";
$result = $db->query($selection);

$row = $result->fetchArray();

?>
<div class="truc">
    <form class="form-gestion-menu" method="post">
        <p class="ajout-menu">Modifier un plat</p>
        <input type="text" required name="img" placeholder="Url de l'image" value="<?= $row["img"]; ?>">
        <input type="text" required name="titre" placeholder="Titre du plat" value="<?= $row["titre"]; ?>">
        <input type="text" required name="prix" placeholder="Prix" value="<?= $row["prix"]; ?>">
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
        <input class="bouton ajouter" type="submit" name="menu-modifier-valide" value="Modifier">
    </form>
</div>

<?php

if (isset($_POST["menu-modifier-valide"])) {
    $suppression = "DELETE FROM cartes WHERE id = $idGet";
    $db->exec($suppression);

    $categorieBrut = $_POST['type-plat'];
    $categorie = implode(',', $categorieBrut);
    $img = htmlspecialchars($_POST["img"]);
    $titre = htmlspecialchars($_POST["titre"]);
    $prix = htmlspecialchars($_POST["prix"]);
    $insertion = "INSERT INTO cartes(img, titre, prix, categorie) VALUES('$img', '$titre', '$prix', '$categorie')";
    $db->exec($insertion);

    header("location: profil.php");
}

?>


<link rel="stylesheet" href="css/modifier-plat.css">
