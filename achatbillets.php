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
    $destinationBillets = $_POST["destinationBillets"];
    $numeroPlace = $_POST["numeroPlace"];
    $typeBillets = $_POST["typeBillets"];
    $paiementBillets = $_POST["paiementBillets"];
    $id_client = $_POST["ID_client"];

    // Utiliser des requêtes préparées pour éviter les injections SQL
    $requete = $connexion->prepare("INSERT INTO billets (DateHeure_reservation_billets, DateHeure_retour_billets, Prix_billets, Statut_billets, NumeroPlace_billets, Destination_billets, Type_billets, Paiement_billets, ID_client) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Associer les valeurs aux paramètres de la requête préparée
    $requete->bind_param("ssdsssssi", $dateReservation, $dateRetour, $prixBillets, $statutBillets, $numeroPlace,  $destinationBillets, $typeBillets, $paiementBillets,  $id_client);

    // Exécuter la requête préparée
    if ($requete->execute()) {
        header("Location: listebillets.php");
        exit(); // Assure que le script s'arrête ici après la redirection
    } else {
        echo "Erreur lors de l'insertion : " . $requete->error;
    }

    // Fermer la requête préparée
    $requete->close();
}

// Fermer la connexion à la base de données
$connexion->close();
?>
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
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0);
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
            background-color: #3011BC;
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
            background-color: #3011BC;
            text-decoration: none;
            color: #FFFEFE; /* Couleur du texte du bouton */
            padding: 4px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .button :hover {
            background-color: #FE7A15; /* Couleur au survol du bouton */
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
        <form action="achatbillets.php" method="post">
                <h2>Acheter un Billet</h2>
               

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
               <label for="destinationBillets">Destination :</label>
        <select id="destinationBillets" name="destinationBillets" required>
            <option value="" disabled selected>Sélectionnez un pays</option>
            <option value="France">Dakar -&gt; France</option>
            <option value="Espagne">Dakar -&gt; Espagne</option>
            <option value="Italie">Dakar -&gt; Italie</option>
            <option value="Allemagne">Dakar -&gt; Allemagne</option>
            <option value="Royaume-Uni">Dakar -&gt; Royaume-Uni</option>
            <option value="États-Unis">Dakar -&gt; États-Unis</option>
            <option value="Canada">Dakar -&gt; Canada</option>
           <option value="Chine">Dakar -&gt; Chine</option>
            <option value="Brésil">Dakar -&gt; Brésil</option>
           <option value="Russie">Dakar -&gt; Russie</option>
            <option value="Afrique du Sud">par Dakar -&gt; Afrique du Sud</option>
            <option value="Nigeria">Dakar -&gt; Nigeria</option>
            <option value="Argentine">Dakar -&gt; Argentine</option>
            <option value="Mexique">Dakar -&gt; Mexique</option>
            <option value="Turquie">Dakar -&gt; Turquie</option>
        </select>
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
                    <option value="virement">Virement bancaire</option>
                </select>
                <!--Pour cle etranger-->
                <select name="ID_client" class="input100" required>
               <?php
               
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "application_gestion_billets";
        $conn = new mysqli($servername, $username, $password, $dbname);
       $query_client = "SELECT ID, Prenom_client, Nom_client FROM client";
  $result_client = $conn->query($query_client);
  while ($client = $result_client->fetch_assoc()) {?>
    <option value="<?=$client['ID']?>"><?=$client['Nom_client']?></option>
<?php }?>
</select>                <!--Pour cle etranger-->
                <button type="submit" class="button1">Acheter</button>
                <button type="reset" class="cancel-button">Annuler</button>
            </form>
            <footer>
                <p>Entreprise AIR SIMPLON SENEGAL</p>
            </footer>
     </body>
</html>