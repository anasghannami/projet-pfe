<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'tazza';
$username = 'root';
$password = '';

$success = false;
$error = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom_prenom = $_POST['nom_prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $message = $_POST['message'] ?? '';

        if ($nom_prenom && $email && $message) {
            $sql = "INSERT INTO contacts (nom_prenom, email, adresse, telephone, message)
                    VALUES (:nom_prenom, :email, :adresse, :telephone, :message)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom_prenom' => $nom_prenom,
                ':email' => $email,
                ':adresse' => $adresse,
                ':telephone' => $telephone,
                ':message' => $message
            ]);

            $success = true;
        }
    }
} catch (PDOException $e) {
    $error = "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="shortcut icon" href="../principale/images/logotitre2.png" type="image/x-icon" />


    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="../principale/style.css">
    <link rel="stylesheet" href="css/responsive-style.css">

</head>

<body class="contact">
    <!-- Navbar Section Start -->
    <header id="full_nav">
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="../principale/index.html">
                        <img decoding="async" src="../principale/images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-stream navbar-toggler-icon"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">thé</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">tisane</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../principale/accessoires.html">Accessoires</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button">
                                    Nos Produits
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../Nos produits/produitnoir.html"><img
                                                src="../principale/tisathe/thes/noir/the-noir.svg" alt=""> &ensp;Thé
                                            noir</a>
                                    </li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/vert/the-vert.svg" alt=""> &ensp;Thé
                                            vert</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/blanc/the-blanc.svg" alt=""> &ensp;Thé
                                            blanc</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/matcha/the-matcha.svg" alt=""> &ensp;Thé
                                            matcha</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/fumer/the-fume.svg" alt=""> &ensp;Thé
                                            Fumé</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/noir/the-noir.svg" alt=""> &ensp;Thé
                                            Aromatisé</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/PuErh/the-pu-erh.svg" alt=""> &ensp;Thé
                                            PuErh</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/thes/Oolong/the-oollong.svg" alt="">
                                            &ensp;Thé
                                            Oolong</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/tisanes/Rooibos/Rooibos.svg" alt="">
                                            &ensp;Tisane
                                            Rooibos</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/tisanes/Thym/Thym.svg" alt=""> &ensp;Tisane
                                            Thym</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/tisanes/Camomille/Camomille.svg" alt="">
                                            &ensp;Tisane
                                            Camomille</a></li>
                                    <li><a class="dropdown-item" href="website.html"><img
                                                src="../principale/tisathe/tisanes/Verveine/Vervene.svg" alt="">
                                            &ensp;Tisane
                                            Verveine</a></li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../contact/contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section class="banner_section">
        <div class="container">
            <div class="banner-content">
                <h1>Contact</h1>
            </div>
        </div>
    </section>

    <section class="contact_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center pb-5">
                    <h2 class="section-title">Besoin de nous contacter ?</h2>
                    <b>
                        <p>Vous souhaitez nous contacter ? Vous avez remarqué une erreur sur un article ? </p>
                    </b>
                </div>
                <div class="col-12 contact-form">
                    <div class="row">
                        <div class="col-lg-7 mb-5">
                            <form class="row g-3" action="" method="POST">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="nom_prenom" class="form-control"
                                        placeholder="Votre nom et prénom" required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" placeholder="Votre email"
                                        required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="adresse" class="form-control" placeholder="Votre adresse"
                                        required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="number" name="telephone" class="form-control"
                                        placeholder="Votre telephone" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <input name="message" class="form-control" placeholder="Votre Message">
                                </div>
                                <div class="col-12">
                                    <button name="envoyer" type="submit" class="btn main-btn">Envoyer</button>
                                </div>
                            </form>
                            <?php if ($success): ?>
                                <p class="product-detail">
                                <div style="margin-top: 20px; padding: 24px; color: #3c763d; font-size: 24px;  font-weight: bold; text-align: center;"> ✔ Merci, votre message a été envoyé avec succès ! </div>
                                </p>
                            <?php elseif ($error): ?>
                                <p class="error"><?= htmlspecialchars($error) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5 mb-5">
                            <div class="content-box ms-sm-5">
                                <ul class="info-box clearfix">
                                    <li>

                                        <h2><b>
                                                <p>On vous répond au plus vite</p>
                                            </b></h2>
                                        <p>TaZza est un site d'information, pour des corrections sur le contenu, des
                                            partenariats ou tout autres demandes, veuillez passer par ce formulaire.</p>
                                        <p>Nous recevrons votre message et vous répondrons dans les meilleurs délais.
                                        </p>
                                        <p>À très vite autour d'une tasse de thé !</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Section Exit -->

    <!-- Footer section Start-->
    <section class="footer_wrapper mt-3 mt-md-0">
        <div class="container px-5 px-lg-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tout savoir sur le thé</h5>
                    <ul class="link-widget p-0">
                        <li><a href="../thes/noir.html">Thé Noir</a></li>
                        <li><a href="../thes/blanc.html">Thé Blanc</a></li>
                        <li><a href="../thes/vert.html">Thé Vert</a></li>
                        <li><a href="../thes/aromatise.html">Thé Aromatisé</a></li>
                        <li><a href="../thes/fumer.html">Thé Fumé</a></li>
                        <li><a href="../thes/matcha.html">Thé Matcha</a></li>
                        <li><a href="../thes/Oolong.html">Thé Oolong</a></li>
                        <li><a href="../thes/PuErh.html">Thé PuErh</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tout savoir sur le Tisane</h5>
                    <ul class="link-widget p-0">
                        <li><a href="../tisanes/Camomille.html">Camomille</a></li>
                        <li><a href="../tisanes/Rooibos.html">Rooibos</a></li>
                        <li><a href="../tisanes/thym.html">Thym</a></li>
                        <li><a href="../tisanes/Verveine.html">Verveine</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tous nos conseils</h5>
                    <ul class="link-widget p-0">
                        <li><a href="#">Astuces</a></li>
                        <li><a href="#">Santé</a></li>
                        <li><a href="#">Gastronomie</a></li>
                        <li><a href="#">Comparaison</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Rechercher</h5>
                    <div class="form-group mb-4">
                        <input type="search" class="form-control bg-transparent" placeholder="recherchcer...">
                        <button type="submit" class="btn main-btn">Entrer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright-section">
            <p>TAZZA</p>
        </div>
    </section>
    <!-- Footer Section Exit  -->

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../principale/script.js"></script>


</body>

</html>