<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier les donnees du billet</title>
    <style>
        

        h1 {
            color: #3011BC;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #3011BC;
            border-radius: 5px;
         
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #3011BC;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #3011BC;
            border-radius: 4px;
            background-color: #FFFEFE;
            color: #607080;
        }

        input[type="submit"] {
            color: #607080;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FE7A15;
        }

        a {
            color: #3011BC;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <h1>Modification des donnees du tables billets.</h1>

    <?php
// Inclusion du fichier de connexion à la base de données
require_once "connectionBD.php";

// Vérification si la méthode de requête est GET et si l'ID est spécifié dans l'URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Récupération de l'ID depuis l'URL
    $id = $_GET["id"];

    // Construction de la requête SQL pour récupérer les données du billet avec l'ID spécifié
    $sql = "SELECT * FROM billets WHERE ID='$id'";

    // Exécution de la requête SQL
    $result = $connexion->query($sql);

    // Vérification s'il y a un résultat (un seul résultat est attendu)
    if ($result->num_rows == 1) {
        // Récupération des données du résultat
        $row = $result->fetch_assoc();

        // Affichage du formulaire de mise à jour avec les données du billet
        echo "<form action='' method='post'>
                Date et heure réservation: <input type='datetime-local' name='date_reservation' value='" . $row["DateHeure_reservation_billets"] . "' required><br>
                Date et heure retour: <input type='datetime-local' name='date_retour' value='" . $row["DateHeure_retour_billets"] . "' required><br>
                Prix: <input type='number' name='prix' value='" . $row["Prix_billets"] . "' required><br>
                Statut: <input type='text' name='statut' value='" . $row["Statut_billets"] . "' required><br>
                Numéro de place: <input type='text' name='numero_place' value='" . $row["NumeroPlace_billets"] . "' required><br>
                Type: <input type='text' name='type' value='" . $row["Type_billets"] . "' required><br>

                <input type='hidden' name='id' value='" . $row["ID"] . "'>
                <input type='submit' name='enregistrer' value='Enregistrer'> 
                <input type='submit' name='annuler' value='Annuler'>
            </form>";
    } else {
        // Affichage d'un message si aucun résultat n'est trouvé avec l'ID spécifié
        echo "Aucun résultat trouvé";
    }

    // Fermeture du résultat de la requête
    $result->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST["id"];
    $dateReservation = $_POST["date_reservation"];
    $dateRetour = $_POST["date_retour"];
    $prix = $_POST["prix"];
    $statut = $_POST["statut"];
    $numeroPlace = $_POST["numero_place"];
    $type = $_POST["type"];

    // Construction de la requête SQL pour la mise à jour des données du billet avec l'ID spécifié
    $updateSql = "UPDATE billets SET 
                    DateHeure_reservation_billets='$dateReservation', 
                    DateHeure_retour_billets='$dateRetour', 
                    Prix_billets=$prix, 
                    Statut_billets='$statut', 
                    NumeroPlace_billets='$numeroPlace', 
                    Type_billets='$type' 
                    WHERE ID=$id";

    // Exécution de la requête SQL de mise à jour
    if ($connexion->query($updateSql) === TRUE) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : " . $connexion->error;
    }

    // Vérification du bouton cliqué et redirection appropriée
    if (isset($_POST['enregistrer'])) {
        header("Location: listebillets.php");
        exit();
    } elseif (isset($_POST['annuler'])) {
        header("Location: listebillets.php");
        exit();
    }
}
?>

    <!--   <br>
    <a href="listebillets.php">Retour à la liste des billets</a>-->
</body>
</html>
