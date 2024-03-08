
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lire les billets</title>
    <style>
        /* Styles CSS pour la mise en forme de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFEFE;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #FFFEFE;
            color: #607080;
        }
        h2 {
            text-align: center;
            color: #FFFEFE;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #3011BC;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: red;
            color: #607080;
        }
        
        .btn-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #607080;
            color: #FFFEFE;
        }
        .btn-back {
            background-color: #607080;
            color: #FFFEFE;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lire les billets :</h2>
        <?php
            // Inclure le fichier de connexion
            require_once "connectionBD.php";

            // Vérifier si l'ID du billet est passé via la requête GET
            if(isset($_GET['id'])) {
                // Échapper l'ID du billet
                $billetsId = $connexion->real_escape_string($_GET['id']);

                // Récupérer les données du billet spécifique
                $sql = "SELECT DateHeure_reservation_billets, DateHeure_retour_billets, Prix_billets, Statut_billets, NumeroPlace_billets, Type_billets, Paiement_billets FROM billets WHERE id = $billetsId";
                $result = $connexion->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Afficher les données dans un tableau
                        echo "<table>";
                        echo "<tr><th>Champ</th><th>Valeur</th></tr>";

                        $row = $result->fetch_assoc();
                        foreach ($row as $field => $value) {
                            echo "<tr><td><strong>$field :</strong></td><td>$value</td></tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "Aucun billet trouvé avec cet ID.";
                    }
                } else {
                    echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
                }

                // Fermer le résultat de la requête
                $result->close();
            } else {
                echo "ID de billet non spécifié.";
            }
            // Fermer la connexion
            $connexion->close();
        ?>
        <!-- Boutons de navigation -->
        <div class="btn-container">
            <button class="btn btn-edit" onclick="window.location.href='listebillets.php?id=<?php echo $billetsId; ?>'">Lire</button>
            <button class="btn btn-back" onclick="window.location.href='listebillets.php'">Retour</button>
        </div>
    </div>
</body>
</html>
