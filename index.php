<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport | Réservation de billets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            line-height: 1.6;
            color: #333;
            padding-top: 80px;
            background-color: #f9f9f9;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .main-header {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
            width: auto;
            transition: transform 0.3s;
        }

        .logo:hover img {
            transform: scale(1.05);
        }

        /* Navigation principale */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-link {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            color: #ffca00;
            background: rgba(255, 107, 0, 0.1);
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        /* Boutons d'authentification */
        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-login {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 15px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            color: #ffca00;
        }

        .btn-post {
            background: #ffca00;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-post:hover {
            background: #e05d00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
        }

        /* Menu mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
        }

        /* Slider */
        #containerSlider {
            margin: 20px auto;
            width: 90%;
            max-height: 500px; 
            aspect-ratio: 16/9; 
            text-align: center;
            box-sizing: border-box;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        #containerSlider img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            object-position: center; 
        }

        /* Catégories */
        .categories {
            padding: 60px 0 40px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            color: #333;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: #ffca00;
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }

        .category-card {
            background: #fff;
            padding: 25px 20px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .category-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ffca00;
        }

        .category-card span {
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Pour les trajets disponibles */
        .listings {
            padding: 60px 0;
            background: #f5f5f5;
        }

        .listing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .listing-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }

        .listing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .listing-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .listing-info {
            padding: 20px;
        }

        .listing-info h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .price {
            font-weight: bold;
            color: #ffca00;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .location {
            color: #666;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .location i {
            color: #ffca00;
        }

        .btn-view-all {
        display: block;
        text-align: center;
        margin: 40px auto 0;
        background: #ffca00;
        color: #fff;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 4px;
        width: fit-content;
        font-weight: 500;
        transition: all 0.3s;
        }

        .btn-view-all:hover {
            background: #e05d00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
        }

        /* Formulaire de réservation */
        .booking-form {
            padding: 60px 0;
            background: #fff;
        }

        .booking-form form {
            max-width: 800px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            background: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .booking-form select, 
        .booking-form input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .booking-form select:focus, 
        .booking-form input:focus {
            border-color: #ffca00;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        .booking-form button {
            grid-column: 1 / -1;
            background: #ffca00;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .booking-form button:hover {
            background: #e05d00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
        }

        /* Footer */
        footer {
            background-color: #111;
            margin-top: 80px;
            padding-bottom: 40px;
            color: #fff;
        }

        .footerContainer {
            width: 100%;
            padding: 70px 30px 20px;
        }

        .socialIcons {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .socialIcons a {
            text-decoration: none;
            padding: 12px;
            background-color: white;
            margin: 0 10px;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .socialIcons a:hover {
            background-color: #ffca00;
            transform: translateY(-3px);
        }

        .socialIcons a i {
            font-size: 1.2em;
            color: black;
        }

        .socialIcons a:hover i {
            color: white;
        }

        .footerNav {
            margin: 30px 0;
        }

        .footerNav ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
            flex-wrap: wrap;
        }

        .footerNav ul li a {
            color: white;
            margin: 15px;
            text-decoration: none;
            font-size: 1.1em;
            opacity: 0.8;
            transition: all 0.3s;
        }

        .footerNav ul li a:hover {
            opacity: 1;
            color: #ffca00;
        }

        .footerBottom {
            background-color: #000;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        .footerBottom p {
            color: white;
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .designer {
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 400;
            margin: 0px 5px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: #fff;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .auth-buttons {
                margin-left: auto;
                margin-right: 15px;
            }
        }

        @media (max-width: 768px) {
            #containerSlider {
                height: 350px;
            }
            
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .booking-form form {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .logo img {
                height: 40px;
            }
            
            .btn-post {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .category-grid {
                grid-template-columns: 1fr;
            }
            
            .footerNav ul {
                flex-direction: column;
                align-items: center;
            }
            
            .footerNav ul li a {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="#"><img src="images/logo.png" alt="Transport"></a>
            </div>

            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="main-nav">
                <div class="nav-links">
                    <a href="#" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Mes billets</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Itinéraires</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                        <span>Alertes</span>
                    </a>
                </div>

                <div class="auth-buttons">
                    <a href="code/connexions/inscription.php" class="btn-login"><i class="fas fa-lock"></i> Connexion</a>
                    <a href="#" class="btn-post">Réserver</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Slider -->
    <section class="slider">
        <div id="containerSlider">
            <div class="slidingImage"> <img src="images/13441553.jpeg" alt="Réseau de bus"> </div>
            <div class="slidingImage"> <img src="images/14980170.jpeg" alt="Lignes ferroviaires"> </div>
            <div class="slidingImage"> <img src="images/53589709.jpeg" alt="Réservation de taxis"> </div>
            <div class="slidingImage"> <img src="images/15.jpg" alt="Réservation de taxis"> </div>
            <div class="slidingImage"> <img src="images/public-transportt.jpg" alt="Réservation de taxis"> </div>
        </div>
    </section>

    <!-- Catégories -->
    <section class="categories" id="categories">
        <div class="container">
            <h2 class="section-title">Nos Services de Transport</h2>
            <div class="category-grid">
                <a href="#" class="category-card">
                    <i class="fas fa-bus"></i>
                    <span>Bus</span>
                </a>
                <a href="#" class="category-card">
                    <i class="fas fa-train"></i>
                    <span>Train</span>
                </a>
                <a href="#" class="category-card">
                    <i class="fas fa-taxi"></i>
                    <span>Taxis</span>
                </a>
                <a href="#" class="category-card">
                    <i class="fas fa-ship"></i>
                    <span>Bâteau</span>
                </a>
                <a href="#" class="category-card">
                    <i class="fas fa-plane"></i>
                    <span>Avion</span>
                </a>
                <a href="#" class="category-card">
                    <i class="fas fa-shuttle-van"></i>
                    <span>Navettes</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Trajets disponibles -->
    <section class="listings">
        <div class="container">
            <h2 class="section-title">Trajets populaires</h2>
            <div class="listing-grid">
                <div class="listing-card">
                    <img src="images/dakar-thies.png" alt="Dakar-Thiès">
                    <div class="listing-info">
                        <h3>Dakar → Thiès</h3>
                        <p class="price">À partir de 2,500 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 1h30</p>
                    </div>
                </div>
                <div class="listing-card">
                    <img src="images/dakar-saintlouis.jpg" alt="Dakar-Saint-Louis">
                    <div class="listing-info">
                        <h3>Dakar → Saint-Louis</h3>
                        <p class="price">À partir de 5,000 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 3h</p>
                    </div>
                </div>
                <div class="listing-card">
                    <img src="images/dakar-kaolack.webp" alt="Dakar-Kaolack">
                    <div class="listing-info">
                        <h3>Dakar → Kaolack</h3>
                        <p class="price">À partir de 4,500 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 2h15</p>
                    </div>
                </div>
                <div class="listing-card">
                    <img src="images/dakar-kolda.jpeg" alt="Dakar-Kolda">
                    <div class="listing-info">
                        <h3>Dakar → Kolda</h3>
                        <p class="price">À partir de 6,500 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 5h</p>
                    </div>
                </div>
                <div class="listing-card">
                    <img src="images/dakar-ziguinchor.jpg" alt="Dakar-Kaolack">
                    <div class="listing-info">
                        <h3>Dakar → Ziguinchor</h3>
                        <p class="price">À partir de 9,500 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 5h15</p>
                    </div>
            </div> 
                <div class="listing-card">
                    <img src="images/dakar-matam.jpg" alt="Dakar-Matam">
                    <div class="listing-info">
                        <h3>Dakar → Matam</h3>
                        <p class="price">À partir de 7,500 XOF</p>
                        <p class="location"><i class="fas fa-clock"></i> Durée : 6h</p>
                    </div>
                </div>
        </div>
        <a href="#" class="btn-view-all">Voir tous les trajets</a>
    </section>

    <!-- Formulaire de réservation -->
    <section class="booking-form">
        <div class="container">
            <h2 class="section-title">Réserver un billet</h2>
            <form>
                <div class="form-group">
                    <label>Départ</label>
                    <select>
                        <option value="Dakar">Dakar</option>
                        <option value="Thies">Thiès</option>
                        <option value="Saint-Louis">Saint-Louis</option>
                        <option value="Diourbel">Diourbel</option>
                        <option value="Fatick">Fatick</option>
                        <option value="Kaffrine">Kaffrine</option>
                        <option value="Kaolack">Kaolack</option>
                        <option value="Kedougou">Kédougou</option>
                        <option value="Kolda">Kolda</option>
                        <option value="Louga">Louga</option>
                        <option value="Matam">Matam</option>
                        <option value="Tambacounda">Tambacounda</option>
                        <option value="Sedhiou">Sédhiou</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Destination</label>
                    <select>
                        <option value="Thies">Thiès</option>
                        <option value="Dakar">Dakar</option>
                        <option value="Saint-Louis">Saint-Louis</option>
                        <option value="Diourbel">Diourbel</option>
                        <option value="Fatick">Fatick</option>
                        <option value="Kaffrine">Kaffrine</option>
                        <option value="Kaolack">Kaolack</option>
                        <option value="Kedougou">Kédougou</option>
                        <option value="Kolda">Kolda</option>
                        <option value="Louga">Louga</option>
                        <option value="Matam">Matam</option>
                        <option value="Tambacounda">Tambacounda</option>
                        <option value="Sedhiou">Sédhiou</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date de départ</label>
                    <input type="date">
                </div>
                <div class="form-group">
                    <label>Type de transport</label>
                    <select>
                        <option value="all">Tous les transports</option>
                        <option value="bus">Bus</option>
                        <option value="train">Train</option>
                        <option value="taxi">Taxi</option>
                        <option value="bateau">Bâteau</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de place</label>
                    <input type="number" value="1" min="1">
                </div>
                <button type="submit" class="btn-post">Rechercher</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://wa.me/+221786339806?text=Bonjour%2C"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/mouhamed.dieng209?utm_source=ig_web_button_share_sheet&igsh=ODdmZWVhMTFiMw=="><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100011391988654&mibextid=kFxxJD"><i class="fab fa-facebook"></i></a>
                <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/mouhamed-dieng-17774b2b9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i class="fab fa-linkedin"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#categories">Nos services</a></li>
                    <li><a href="#">Tarifs</a></li>
                    <li><a href="#">Horaires</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy; 2025 Transport | <span class="designer">Tous droits réservés</span></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialisation du slider
            $('#containerSlider').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                adaptiveHeight: true
            });

            // Menu mobile
            $('.mobile-menu-btn').click(function() {
                $('.nav-links').toggleClass('active');
            });

            // Fermer le menu mobile quand on clique sur un lien
            $('.nav-link').click(function() {
                if ($(window).width() < 992) {
                    $('.nav-links').removeClass('active');
                }
            });
        });

        // Fermer le menu mobile quand on redimensionne la fenêtre
        $(window).resize(function() {
            if ($(window).width() >= 992) {
                $('.nav-links').removeClass('active');
            }
        });
    </script>
</body>
</html>