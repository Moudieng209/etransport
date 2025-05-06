<?php
session_start();

// Vérification de l'authentification et du rôle
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../connexions/login.php?error=Accès non autorisé");
    exit();
}

// Vérification des variables prénom et nom
if (!isset($_SESSION['prenom']) || !isset($_SESSION['nom'])) {
    header("Location: ../connexions/login.php?error=Session incomplète - Veuillez vous reconnecter");
    exit();
}

include '../connexions/connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../images/dashboard.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <style>
    body {
        color: black;
        overflow-x: hidden; /* Empêche le défilement horizontal */
    }

    .sidebar {
        z-index: 1000;
        transition: all 0.3s;
    }

    .list-group-item {
        color: black;
    }

    .list-group-item.active {
        background-color: #ffca00;
        color: white;
    }

    .list-group-item.active .ml-2 {
        color: white;
    }

    .ml-2 {
        color: black;
    }

    .dashboard-title {
        margin: 0 auto;
        text-align: center;
    }

    .dashboard-card {
        padding: 1.5rem;
        border-radius: 0.25rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border-left: 4px solid#ffca00;
        margin-bottom: 1.5rem;
        transition: transform 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .overlay {
        background-color: #000000;
        z-index: 999;
        transition: all 0.3s;
    }

    .scrolling-logo-container {
        margin-top: 2px;
        max-resolution: 300px;
        background-color: #fff;
        border: 2px solid #ffca00;
        border-radius: 20px;
        box-shadow: 0px 0px 20px #ffca00;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        overflow: hidden;
        position: relative;
        height: 250px; 
        margin-top: 40px;
    }

    .scrolling-logo {
        position: absolute;
        width: 300px;
        height: auto;
        animation: scrollBanner 15s linear infinite;
    }

    @keyframes scrollBanner {
        0% {
            left: -300px; /* Commence hors écran à gauche */
        }
        100% {
            left: 100%; /* Termine hors écran à droite */
        }
    }

    </style>
</head>
<body>
   
    <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

    <!-- sidebar -->
    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
        <div class="list-group rounded-0">
            <a href="#" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                <span class="bi bi-border-all"></span>
                <span class="ml-2">Tableau de bord</span>
            </a>
            <a href="Page produits/index.html" class="list-group-item list-group-item-action border-0 align-items-center">
                <span class="bi bi-box"></span>
                <span class="ml-2">Réservations</span>
            </a>
           
            <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                data-toggle="collapse" data-target="#sale-collapse">
                <div>
                    <span class="bi bi-person-check "></span>
                    <span class="ml-2">Utilisateurs</span>
                </div>
                <span class="bi bi-chevron-down small"></span>
            </button>
            <div class="collapse" id="sale-collapse" data-parent="#sidebar">
                <div class="list-group">
                <a href="Page_utilisateurs/liste_admin.php" class="list-group-item list-group-item-action border-0 pl-5">Admins</a>
                    <a href="Page_utilisateurs/liste_client.php" class="list-group-item list-group-item-action border-0 pl-5">Clients</a>
                    <a href="Page_utilisateurs/liste_chauffeur.php" class="list-group-item list-group-item-action border-0 pl-5">Chauffeurs</a>
                </div>
            </div>

            <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
                data-toggle="collapse" data-target="#purchase-collapse">
                <div>
                    <span class="bi bi-cart-plus"></span>
                    <span class="ml-2">Paiements</span>
                </div>
                <span class="bi bi-chevron-down small"></span>
            </button>
            <div class="collapse" id="purchase-collapse" data-parent="#sidebar">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Vendeurs</a>
                    <a href="#" class="list-group-item list-group-item-action border-0 pl-5">Achats</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-lg-10 ml-md-auto px-0 ms-md-auto">
        <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
            <button class="btn py-0 d-lg-none" id="open-sidebar">
                <span class="bi bi-list text-primary h3"></span>
            </button>
            <h1 class="dashboard-title">Bienvenue, <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></h1>
            <div class="dropdown ml-auto">
                <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="bi bi-person h4"></span>
                    <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
                    <a class="dropdown-item" href="../connexions/logout_form_amélioré.php">Déconnexion</a>
                    <a class="dropdown-item" href="#">Paramètres</a> 
                </div>
            </div>
        </nav>

        <!-- contenu principal -->
        <main class="p-4 min-vh-100">
            <section class="row">
                <div class="col-md-6 col-lg-4">
                    <!-- carte -->
                    <article class="dashboard-card">
                        <a href="Page_utilisateurs/index.php" class="d-flex align-items-center">
                            <span class="bi bi-person-check h5"></span>
                            <h5 class="ml-2">Utilisateurs</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="trajets/index.php" class="d-flex align-items-center">
                            <span class="bi bi-map h5"></span>
                            <h5 class="ml-2">Trajets</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page utilisateurs/index.html" class="d-flex align-items-center">
                            <span class="bi bi-cash h5"></span>
                            <h5 class="ml-2">Tarifs</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page catégories" class="d-flex align-items-center">
                            <span class="bi bi-folder h5"></span>
                            <h5 class="ml-2">Réservations</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page commandes" class="d-flex align-items-center">
                            <span class="bi bi-graph-up h5"></span>
                            <h5 class="ml-2">Statistiques</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page Message" class="d-flex align-items-center">
                            <span class="bi bi-chat-dots h5"></span>
                            <h5 class="ml-2">Evaluations</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page Message" class="d-flex align-items-center">
                            <span class="bi bi-credit-card h5"></span>
                            <h5 class="ml-2">Paiement</h5>
                        </a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4">
                    <article class="dashboard-card">
                        <a href="Page Message" class="d-flex align-items-center">
                            <span class="bi bi-bell h5"></span>
                            <h5 class="ml-2">Notifications</h5>
                        </a>
                    </article>
                </div>
            </section>
            
            <div class="scrolling-logo-container">
                <img src="../../images/logo.png" alt="Logo défilant" class="scrolling-logo">
                <div class="text-center">
                    <h2 class="text-primary">Bienvenue sur le tableau de bord</h2>
                    <p class="text-secondary">Gérez vos réservations et utilisateurs facilement</p>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    
    <script>
    // Redémarrer l'animation quand elle sort de l'écran
    document.querySelector('.scrolling-logo').addEventListener('animationiteration', function() {
        // Cette fonction est appelée à chaque fois que l'animation recommence
        console.log('Logo a terminé un cycle de défilement');
    });
    </script>
</body>
</html>