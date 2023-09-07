<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Connexion à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "remplir_base"; // Nom de la base de données

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $date_d = isset($_POST['date-d']) ? $_POST['date-d'] : '';
    $date_a = isset($_POST['date-a']) ? $_POST['date-a'] : '';
    $passager = isset($_POST['passager']) ? $_POST['passager'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Vérifiez si les champs obligatoires ne sont pas vides avant d'exécuter la requête SQL
    if (!empty($prenom) && !empty($nom) && !empty($telephone) && !empty($email)) {
        // Préparation de la requête SQL et exécution
        $requete = "INSERT INTO users (prenom, nom, telephone, email, date_d, date_a, passager, message) VALUES ('$prenom', '$nom', '$telephone', '$email', '$date_d', '$date_a', '$passager', '$message')";

        echo "Données insérées avec succès !";
    } else {
        echo "Veuillez remplir tous les champs obligatoires.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sen_Voyages</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.ico" rel="icon">
    <link href="img/apple-favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet"> 

    <!-- Vendor CSS File -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/slick/slick.css" rel="stylesheet">
    <link href="vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/hover-style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Section Start -->
    <header id="header">
        <a href="index.html" class="logo"><img src="img/logo.png" alt="logo"></a>
        
        <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
        <nav class="main-menu top-menu">
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="apropos.html">A propos</a></li>
                <li><a href="vol.html">Vols</a></li>
                <li class="active"><a href="reservation.html">Reservation</a></li>
                <li><a href="login.html">S'identifier</a></li>
                <li><a href="contact.html">Nous contacter</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section End -->

    <!-- Search Section Start -->
    <div id="search" style="background: #f2f2f2;">
        <div class="container">
            <div class="form-row">
                <div class="control-group col-md-2 control-group-kid">
                    <label>Depart</label>
                    <select class="custom-select">
                        <option selected>Ville de départ</option>
                        <!-- Ajoutez ici les options pour les villes de départ -->
                    </select>
                </div>
                <div class="control-group col-md-2 control-group-kid">
                    <label>Destination</label>
                    <select class="custom-select">
                        <option selected>Ville de d'arrivée</option>
                        <!-- Ajoutez ici les options pour les villes de destination -->
                    </select>
                </div>
                <div class="control-group col-md-2">
                    <label>Date</label>
                    <div class="form-group">
                        <div class="input-group date" id="date-3" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#date-3"/>
                            <div class="input-group-append" data-target="#date-3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-3">
                    <div class="form-row">
                        <div class="control-group col-md-4">
                            <label>Passager</label>
                            <select class="custom-select">
                                <option selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="control-group col-md-2">
                    <button class="btn btn-block btn-search">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Section End -->
    
    <!-- Booking Section Start -->
    <div id="booking">
        <div class="container">
            <div class="section-header">
                <h2>Réservation</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="booking-form">
                        <div id="success"></div>
                        <form method="post" action="reservation.php">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required="required" data-validation-required-message="Please enter last name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" required="required" data-validation-required-message="Please enter your mobile number" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Date de départ</label>
                                    <input type="date" class="form-control datetimepicker-input" name="date_d" id="date-d" data-toggle="datetimepicker" data-target="#date-1" placeholder="jj/mm/aa" required="required" data-validation-required-message="Please enter date"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Date d'arrivée</label>
                                    <input type="date" class="form-control datetimepicker-input" name="date_a" id="date-a" data-toggle="datetimepicker" data-target="#date-2" placeholder="jj/mm/aa" required="required" data-validation-required-message="Please enter date"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Passager</label>
                                    <select class="custom-select" name="message" id="passager" required="required" data-validation-required-message="Please select one"/>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                            </div>
                            <div class="control-group">
                                <label>Demande spéciale</label>
                                <input type="text" class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your special request" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="button"><button type="submit" id="bookingButton">Réserve maintenant</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Section End -->
    
    <!-- Footer Section Start -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="social">
                        <a href="https://instagram.com/maouloud_fall_17?igshid=MjEwN2IyYWYwYw=="><li class="fa fa-instagram"></li></a>
                        <a href="https://www.linkedin.com/in/maouloud-fall-71b433242/?originalSubdomain=sn"><li class="fa fa-linkedin"></li></a>
                        <a href="https://m.facebook.com/people/Maouloud-Fall-lofficiel/100067023274285/"><li class="fa fa-facebook-f"></li></a>
                    </div>
                </div>
                
                <div class="col-12">
                    <p>@2023 Sen Voyage - Tous droits réservés</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section End -->
    
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JavaScript File -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery-migrate.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/easing/easing.min.js"></script>
    <script src="vendor/stickyjs/sticky.js"></script>
    <script src="vendor/superfish/hoverIntent.js"></script>
    <script src="vendor/superfish/superfish.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/tempusdominus/js/moment.min.js"></script>
    <script src="vendor/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <!-- Booking Javascript File -->
    <script src="js/booking.js"></script>
    <script src="js/jqBootstrapValidation.min.js"></script>

    <!-- Main Javascript File -->
    <script src="js/main.js"></script>
</body>
</html>

