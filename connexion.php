<?php
//require_once "navigation.php";
require_once "db.php";
if (isset($_POST["valide"])) {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $stmt = $db->prepare('SELECT * FROM membres WHERE email = :email');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $membres = $result->fetchArray();
    if ($membres && password_verify($mdp, $membres['mdp'])) {
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $membres["id"];
        $_SESSION["prenom"] = $membres["prenom"];
        $_SESSION["nom"] = $membres["nom"];
        $_SESSION["email"] = $membres["email"];
        header("location: profil.php");
    } else {
    echo 'Mauvaise combinaison';
    }
}
$selectionCompte = "SELECT * FROM membres";
$resultat = $db->query($selectionCompte);
?>
<link rel="stylesheet" href="css/connexion.css">
<body>
<form method="post">
    <input type="text" id="email" name="email" placeholder="Email">
    <input type="text" id="mdp" name="mdp" placeholder="Mot de passe">
    <a href="inscription.php">Je n'ai pas de compte</a>
    <button class="bouton valider" type="submit" name="valide">Se connecter</button>
</form>
</body>