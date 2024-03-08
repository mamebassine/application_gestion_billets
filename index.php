<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Une application de gestion des billets</title>
    <style>
        /* Menu */

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('Image.png'); /* Ajout de l'image de fond */
            background-size: cover;
            color: #FFFEFE; /* Couleur du texte */
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

        /* Ajout de la mise en page en bandes et des couleurs audacieuses */
        body {
            background-color: #FFFEFE;
        }

        .welcome {
            text-align: center;
            margin-top: 50px;
        }

        .welcome h1 {
            color: #3011BC;
            font-size: 36px;
        }

        .welcome p {
            color: #607080;
            font-size: 18px;
            margin-bottom: 50px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .section {
            background-color: #FE7A15;
            color: #3011BC;
            padding: 10px;
            margin: 10px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 15%; /* Ajustement de la largeur des sections */
        }

        .section h2 {
            font-size: 24px; /* Taille moyenne pour les sous-titres */
            color: #3011BC; /* Couleur du sous-titre */
        }

        /* Style du bouton de réservation */
        .reserver-btn {
            background-color: #FE7A15;
            color: #3011BC;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 15px;
            transition: background-color 0.3s ease;
            
        }

        .reserver-btn:hover {
            background-color: #FFFEFE;
            color: #3011BC;
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

    <div class="welcome">
        <h1>Où voyager en 2024 ?</h1>
        <p>Voici nos astuces pour respecter <br>votre budget sans sacrifier l’aventure.</p>
        <a href="client.php" class="reserver-btn">Réserver maintenant</a>
    </div>

    <div class="container">
        <div class="section">
            <p>On voyage car la vie est courte <br> et le monde est <br>immense.</p>
        </div>
        <div class="section">
            <p>La vie est courte <br> et le monde est vaste, plus tot on commence a l'explorer, <br>mieux c'est.</p>
        </div>
    </div>

    <footer>
        <p>Entreprise AIR SIMPLON SENEGAL</p>
    </footer>
</body>
</html>
