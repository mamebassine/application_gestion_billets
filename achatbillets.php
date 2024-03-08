
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Une application de gestion des billets</title>
    <style>

body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('imagef.jpg'); /* Ajout de l'image de fond */
            background-size: cover;
            color: #FFFEFE; /* Couleur du texte */
        }

        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    
}

        /* menu */ 

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

.menu1 {
    list-style: none;
    display: flex;
    gap: 20px;
    margin-top: 5%;
    
}

.menu1 li a {
    text-decoration: none;
    color: #606060;
    transition: color 0.3s ease;
    text-align: center;
}

.menu1 li a:hover {
    color: #3011bc;
}

.menu2 {
    list-style: none;
    display: flex;
    gap: 20px;
    margin-top: 5%;
    
}

.menu2 li a {
    text-decoration: none;
    color: #606060;
    transition: color 0.3s ease;
    
}

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
/*menu*/

        /* Form */
        form {
            background-color: #607080; /* Couleur principale du formulaire */
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 450px; /* Largeur du formulaire ajustée */
            margin: auto; /* Centrer le formulaire sur la page */
            text-align: center;
            margin-right: 45px; /* Ajout de marge à gauche pour positionner le formulaire à gauche */
            
        }

        form h2 {
            color: #FFFEFE; /* Couleur du texte pour le titre */
            margin-bottom: 16px; /* Marge sous le titre */
            margin-top: 5%;
        }

        label {
            color: #FFFEFE; /* Couleur du texte */
            display: block;
            margin-bottom: 4px;
        }

        input,
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 2px;
            box-sizing: border-box;
            border: 1px solid #607080; /* Couleur de la bordure */
            border-radius: 2px;
        }

        select {
            background-color: #FFFEFE; /* Couleur de fond pour les menus déroulants */
            color: #3011bc; /* Couleur du texte pour les menus déroulants */
        }

        .button1 {
            
            color: #FFFEFE; /* Couleur du texte du bouton */
            padding: 4px;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .button1:hover {
            background-color: #FE7A15; /* Couleur au survol du bouton */
        }

        .cancel-button {
            text-decoration: none;
            color: #FFFEFE; /* Couleur du texte du bouton */
            padding: 4px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            
        }
         /* Style du pied de page */
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
<body>
    <form action="#" method="post">
        <h2>Acheter un Billet</h2>
        <!-- Vos commentaires ici -->

        <label for="dateReservation">Date et heure de réservation :</label>
        <input type="datetime-local" id="dateReservation" name="dateReservation" required>

        <label for="dateRetour">Date et heure de retour :</label>
        <input type="datetime-local" id="dateRetour" name="dateRetour" required>

        <label for="prixBillets">Prix des billets :</label>
        <input type="number" id="prixBillets" name="prixBillets" required>

        <label for="statutBillets">Statut des billets :</label>
        <select id="statutBillets" name="statutBillets" required>
            <option value="en_attente">En attente</option>
            <option value="confirme">Confirmé</option>
            <option value="annule">Annulé</option>
        </select>

        <label for="numeroPlace">Numéro de place :</label>
        <input type="text" id="numeroPlace" name="numeroPlace" required>

        <label for="typeBillets">Type de billets :</label>
        <select id="typeBillets" name="typeBillets" required>
            <option value="economique">Économique</option>
            <option value="affaires">Affaires</option>
            <option value="premiere_classe">Première classe</option>
        </select>

        <label for="paiementBillets">Paiement des billets :</label>
        <select id="paiementBillets" name="paiementBillets" required>
            <option value="carte">Carte de crédit</option>
            <option value="espece">Espèces</option>
            <option value="virement">Virement bancaire</option></select>
            <a href="listebillets.php" class="button1">Acheter</a>
            <a href="listebillets.php" class="cancel-button">Annuler</a>
    </form>
    <footer>
        <p>Entreprise AIR SIMPLON SENEGAL</p>
    </footer>
</body>
</html>
<?php
    // Inclure le fichier de connexion à la base de données
    require_once "connectionBD.php";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Récupérer les valeurs du formulaire
        $dateReservation = $_POST["dateReservation"];
        $dateRetour = $_POST["dateRetour"];
        $prixBillets = $_POST["prixBillets"];
        $statutBillets = $_POST["statutBillets"];
        $numeroPlace = $_POST["numeroPlace"];
        $typeBillets = $_POST["typeBillets"];
        $paiementBillets = $_POST["paiementBillets"];
// Exécuter la requête d'insertion avec l'ID_client
        $requete = "INSERT INTO billets (DateHeure_reservation_billets, DateHeure_retour_billets, Prix_billets, Statut_billets, NumeroPlace_billets, Type_billets, Paiement_billets)
                    VALUES ('$dateReservation', '$dateRetour', $prixBillets, '$statutBillets', '$numeroPlace', '$typeBillets', '$paiementBillets')";
 // Vérifier si l'insertion a réussi
        if ($connexion->query($requete) === TRUE) {
            echo "Les données ont été insérées avec succès.";
        } else {
            echo "Erreur lors de l'insertion : " . $connexion->error;
        }
    }
// Fermer la connexion à la base de données
    $connexion->close();
    //Redirection vers un fichier PHP

    ?>