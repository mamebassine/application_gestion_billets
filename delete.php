<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un billet</title>
</head>
<body>
    <h1>Supprimer un billet</h1>

    <?php
    // Inclure le fichier de connexion
    require_once "connectionBD.php";

    // Vérifier si l'ID est spécifié dans la requête GET
    if(isset($_GET['id'])) {
        $billetsId = $_GET['id'];

        // Vérifier si la connexion à la base de données est établie
        if ($connexion) { 
            // Supprimer le billet avec l'ID spécifié
            $sql = "DELETE FROM billets WHERE id = $billetsId";
            if ($connexion->query($sql) === TRUE) {
                echo "<p>Billet supprimé avec succès.</p>";
                echo '<div class="btn-container">
                        <button class="btn btn-yes" onclick="window.location.href=\'listebillets.php\'">Oui</button>
                        <button class="btn btn-no" onclick="window.location.href=\'listebillets.php\'">Non</button>
                      </div>';
            } else {
                echo "Erreur lors de la suppression du billet : " . $connexion->error;
            }
        } else {
            echo "Erreur de connexion à la base de données.";
        }

        // Fermer la connexion
        $connexion->close();  
    } else {
        echo "ID de billet non spécifié.";
    }
    ?>
</body>
</html>
