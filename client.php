<?php
// Inclusion du fichier de connexion à la base de données
require_once "connectionBD.php";
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données du formulaire
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];

    // Requête d'insertion des données dans la table "client"
    $requete = "INSERT INTO client (Prenom_client, Nom_client, Email_client, Adresse_client, Telephone_client)
                VALUES ('$prenom', '$nom', '$email', '$adresse', '$telephone')";

    // Exécution de la requête
    if ($connexion->query($requete) === TRUE) {
        echo "Le client a été créé avec succès.";
        
        // Redirection vers la page achatbillets.php
        header("Location: achatbillets.php");
        exit(); // Assure que le script s'arrête après la redirection
    } else {
        echo "Erreur lors de la création du client : " . $connexion->error;
    }

    // Fermeture de la connexion à la base de données
    $connexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Une application de gestion des billets</title>
    <style>
        /* Styles pour le corps de la page */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('imagee.jpg'); /* Ajout de l'image de fond */
            background-size: cover;
            color: #FFFEFE; /* Couleur du texte */
        }

        /* Styles pour l'en-tête */
        header {
            background: linear-gradient(to right, #FFFEFE);
            padding: 20px;
            color: #607080;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-width: 120px;
        }

        nav {
            display: flex;
            justify-content: center; /* Pour centrer le menu1 */
            align-items: center;
            flex-grow: 8; /* Pour occuper l'espace disponible entre le logo et le menu2 */
        }

        .menu1,
        .menu2 {
            list-style: none;
            display: flex;
            gap: 20px;
            margin-top: 5%;
        }

        .menu1 li a,
        .menu2 li a {
            text-decoration: none;
            color: #606060;
            transition: color 0.3s ease;
            text-align: center;
        }

        .menu1 li a:hover,
        .menu2 li a:hover {
            color: #3011bc;
        }

        .suivilogo1 {
            color: #607080;
        }

        .suivilogo2 {
            color: #3011bc;
            border: 1px solid black; /* Correction de la syntaxe pour la bordure */
        }

        /* Styles pour la section principale de la page */
        .container {
            max-width: 350px;
            margin-left: 72%;
            padding: 25px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #607080; /* Couleur de fond de la section principale */
            color: #FFFEFE; /* Couleur du texte de la section principale */
        }

        /* Styles pour le titre du formulaire */
        h1 {
            text-align: center;
            color: #FE7A15; /* Couleur du titre du formulaire */
        }

        /* Styles pour le formulaire */
        form {
            display: grid;
            gap: 6px;
        }

        /* Styles pour les étiquettes des champs du formulaire */
        label {
            font-weight: bold;
            color: #FFFEFE; /* Couleur du texte des étiquettes */
        }

        /* Styles pour les champs de saisie du formulaire */
        input {
            width: 100%;
            padding: 2px;
            box-sizing: border-box;
        }

        /* Styles pour le bouton du formulaire */
        .button1 {
            background-color: #FFFEFE;
            color: #3011BC;
            padding: 5px 14px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
            transition: background-color 0.3s ease;
        }

        .button1:hover {
            background-color: #FE7A15; /* Couleur au survol du bouton */
        }

        /* Styles du pied de page */
        footer {
            background-color: #3011BC;
            color: #FFFEFE;
            text-align: center;
            padding: 3px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logosimplon.png" alt="">
        </div>
        <nav>
            <ul class="menu1">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="client.php">Reservation</a></li>
                <li><a href="achatbillets.php">Billets</a></li>
                <li><a href="listebillets.php">Liste des billets</a></li>
            </ul>
            <ul class="menu2">
                <li><a href="#" class="suivilogo1">Support</a></li>
                <li><a href="#" class="suivilogo2">Sign in</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Formulaire Client</h1>
        <form action="client.php" method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>

            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required>

            <button type="submit" class="button1">Créer Client</button>
        </form>
    </div>
    <footer>
        <p>Entreprise AIR SIMPLON SENEGAL</p>
    </footer>
</body>
</html>



