<?php

require_once "navigation.php";

?>

<link rel="stylesheet" href="css/inscription.css">

<body>

    <form method="post">
        <input type="text" id="prenom" name="prenom" placeholder="Prénom">
        <input type="text" id="nom" name="nom" placeholder="Nom">
        <input type="text" id="email" name="email" placeholder="Email">
        <input type="text" id="mdp" name="mdp" placeholder="Mot de passe">
        <a href="connexion.php">J'ai deja un compte</a>
        <button class="bouton valider" type="submit" name="valide">S'inscrire</button>
    </form>

    <?php

    if (isset($_POST["valide"])) {
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

        $query = "SELECT COUNT(*) as count FROM membres WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $result = $stmt->execute();

        // vérifier si l'utilisateur existe
        $row = $result->fetchArray();
        if ($row['count'] > 0) {
            echo "L'utilisateur existe deja";
        } else {

            //insertion de l'utilisateur
            $insertion = "INSERT INTO membres (prenom, nom, email, mdp) VALUES (:prenom, :nom, :email, :mdp)";
            $stmt = $db->prepare($insertion);
            $stmt->bindValue(':prenom', $prenom, SQLITE3_TEXT);
            $stmt->bindValue(':nom', $nom, SQLITE3_TEXT);
            $stmt->bindValue(':email', $email, SQLITE3_TEXT);
            $stmt->bindValue(':mdp', $mdp, SQLITE3_TEXT);
            $stmt->execute();
            header("location: connexion.php");
        }
    }

    ?>

</body>