<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Billets</title>
    <style>
        /* Styles communs */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('image.png'); /* Ajout de l'image de fond */
            background-size: cover;
            color: #FE7A15; /* Couleur du texte */
        }
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
            justify-content: center;
            align-items: center;
            flex-grow: 8;
        }

        ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin-top: 5%;
        }

        li a {
            text-decoration: none;
            color: #607080;
            transition: color 0.3s ease;
            text-align: center;
        }

        li a:hover {
            color: #3022BC;
        }

        .suivilogo1 {
            color: #607080;
        }

        .suivilogo2 {
            color: #3022BC;
            border: 1px solid black;
        }

        /* Styles spécifiques */
        h1 {
            margin-top: 1%;
            color: #3022BC;
            margin-left: 5%;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            margin-top: 5px;
            margin-bottom: 20px;
            margin-top: 1%;
        }

        th, td {
            border: 1px solid #3011BC;
            padding: 10px;
            text-align: center;
            
        }

        th {
            background-color: #607080;
            color: #FFFEFE;
                      
            
        }

        


        button {
            background-color: #FE7A15;
            color: #FFFEFE;
            padding: 10px 15px;
            border: none;
            margin: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3022BC;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .container {
            width: 80%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .actions {
            margin-bottom: 10px;
            text-align: right;
        }

        .btn {
            flex: 1;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
            color: #FFFEFE;
        }

        .boutoncrud {
            
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

       
/* Styles spécifiques */
.btn-modifier {
    background-color: #607080;
    color: #FFFEFE;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}
.btn-modifier:hover {
    background-color: #FE7A15;
}

.btn-lire {
    background-color: #607080;
    color: #FFFEFE;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}
.btn-lire:hover {
    background-color: #FE7A15;
}

.btn-supprimer {
    background-color: #607080;
    color: #FFFEFE;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}
.btn-supprimer:hover {
    background-color: #FE7A15;
}

/* Ajoutez ces styles à votre section CSS */
.btn-ajouter {
    background-color: #607080;
    color: #FFFEFE;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 55%;
    margin-top: -4%;

}

.btn-ajouter:hover {
    background-color: #FE7A15;
}
 /* Style du pied de page */
 footer {
            background-color: #3011BC;
            color: #FFFEFE;
            text-align: center;
            padding: -15px;
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
    <h1>Vos Billets</h1>
    <a class="btn btn-ajouter" href="achatbillets.php">Ajouter</a>
    </div>
    <div class="button-container">
    <!-- Section Tableau -->
    <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "application_gestion_billets";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Récupérer les données de la table "billets"
        $sql = "SELECT id, DateHeure_reservation_billets, DateHeure_retour_billets, Prix_billets, id_client, Statut_billets, NumeroPlace_billets, Type_billets, Paiement_billets FROM billets";


        $result = $conn->query($sql);

        // Afficher les données dans un tableau HTML avec des liens pour CRUD
        echo "<table>";
        echo "<tr><th>ID</th><th>Date reservation</th><th>Date retour</th><th>Prix billets</th><th>ID client</th><th>Statut billets</th><th>Numero place</th><th>Type billets</th><th>Paiement billets</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["DateHeure_reservation_billets"] . "</td>";
            echo "<td>" . $row["DateHeure_retour_billets"] . "</td>";
            echo "<td>" . $row["Prix_billets"] . "</td>";
            echo "<td>" . $row["id_client"] . "</td>";
            echo "<td>" . $row["Statut_billets"] . "</td>";
            echo "<td>" . $row["NumeroPlace_billets"] . "</td>";
            echo "<td>" . $row["Type_billets"] . "</td>";
            echo "<td>" . $row["Paiement_billets"] . "</td>";
            echo "<td class='boutoncrud'>
                    <a class='btn btn-modifier' href='update.php?id=" . $row["id"] . "'>Modifier</a>
                    <a class='btn btn-lire' href='read.php?id=" . $row["id"] . "'>Lire</a>
                    <a class='btn btn-supprimer' href='delete.php?id=" . $row["id"] . "'>Supprimer</a>
                </td>";
            echo "</tr>";
        }?>
     <footer>
        <p>Entreprise AIR SIMPLON SENEGAL</p>
    </footer>
</body>
</html>
