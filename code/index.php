<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
     <link rel="stylesheet" type="file" href="../images/1.jpg">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
</head>
<style>
    .menu {
        padding: 0.5rem;
        background-color: #fff;
        position: relative;
        display: flex;
        justify-content: center;
        border-radius: 15px;
        box-shadow: 0 10px 25px 0 rgba(0, 0, 0, 0.075);
        margin: 0 auto; 
        max-width: 800px; 
        width: 100%; 
    }

    .link {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 50px;
        border-radius: 8px;
        position: relative;
        z-index: 1;
        overflow: hidden;
        transform-origin: center left;
        transition: width 0.2s ease-in;
        text-decoration: none;
        color: inherit;
    }

    .link:before {
        position: absolute;
        z-index: -1;
        content: "";
        display: block;
        border-radius: 8px;
        width: 100%;
        height: 100%;
        top: 0;
        transform: translateX(100%);
        transition: transform 0.2s ease-in;
        transform-origin: center right;
        background-color: #eee;
    }

    .link:hover,
    .link:focus {
        outline: 0;
        width: 130px;
    }

    .link:hover:before,
    .link:focus:before,
    .link:hover .link-title,
    .link:focus .link-title {
        transform: translateX(0);
        opacity: 1;
    }

    .link-icon {
        width: 28px;
        height: 28px;
        display: block;
        flex-shrink: 0;
        left: 18px;
        position: absolute;
    }

    .link-icon svg {
        width: 28px;
        height: 28px;
    }

    .link-title {
        transform: translateX(100%);
        transition: transform 0.2s ease-in;
        transform-origin: center right;
        display: block;
        text-align: center;
        text-indent: 28px;
        width: 100%;
    }

    /* Slider */
    #containerSlider {
        margin: auto;
        width: 90%;
        height: 70vh;
        text-align: center;
        position: relative;
        top: 100px;
        box-sizing: border-box;
    }

    #containerSlider img {
        width: 100%;
        height: 65vh;
        object-fit: cover;
    }

    /* Footer */
    footer {
        background-color: #111;
        margin-top: 100px;
    }

    .footerContainer {
        width: 100%;
        padding: 70px 30px 20px;
    }

    .socialIcons {
        display: flex;
        justify-content: center;
    }

    .socialIcons a {
        text-decoration: none;
        padding: 10px;
        background-color: white;
        margin: 10px;
        border-radius: 50%;
    }

    .socialIcons a i {
        font-size: 2em;
        color: black;
        opacity: 0.9;
    }

    .socialIcons a:hover {
        background-color: #111;
        transition: 0.5s;
    }

    .socialIcons a:hover i {
        color: white;
        transition: 0.5s;
    }

    .footerNav {
        margin: 30px 0;
    }

    .footerNav ul {
        display: flex;
        justify-content: center;
        list-style-type: none;
    }

    .footerNav ul li a {
        color: white;
        margin: 20px;
        text-decoration: none;
        font-size: 1.3em;
        opacity: 0.7;
        transition: 0.5s;
    }

    .footerNav ul li a:hover {
        opacity: 1;
    }

    .footerBottom {
        background-color: #000;
        padding: 20px;
        text-align: center;
    }

    .footerBottom p {
        color: white;
    }

    .designer {
        opacity: 0.7;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 400;
        margin: 0px 5px;
    }
</style>
<body>
<!-- Début Navbar -->
<div class="menu">
    <a class="link" href="#">
        <span class="link-icon">
            <!-- Icône Home -->
            <svg viewBox="0 0 256 256" fill="currentColor" height="28" width="28" xmlns="http://www.w3.org/2000/svg">
                <rect fill="none" height="256" width="256"></rect>
                <path
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    d="M213.3815,109.61945,133.376,36.88436a8,8,0,0,0-10.76339.00036l-79.9945,72.73477A8,8,0,0,0,40,115.53855V208a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8V115.53887A8,8,0,0,0,213.3815,109.61945Z"
                ></path>
            </svg>
        </span>
        <span class="link-title">Home</span>
    </a>
    <a class="link" href="#">
        <span class="link-icon">
            <!-- Icône Réservation (calendrier) -->
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                height="28"
                width="28"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M19 4H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM16 2v4M8 2v4M3 10h18"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                />
            </svg>
        </span>
        <span class="link-title">Réserv...</span>
    </a>
    <a class="link" href="#">
        <span class="link-icon">
            <!-- Icône Trajet (carte) -->
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                height="28"
                width="28"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    fill="none"
                />
            </svg>
        </span>
        <span class="link-title">Journeys</span>
    </a>
    <a class="link" href="#">
        <span class="link-icon">
            <!-- Icône Chat -->
            <svg
                viewBox="0 0 256 256"
                fill="currentColor"
                height="28"
                width="28"
                xmlns="http://www.w3.org/2000/svg"
            >
                <rect fill="none" height="256" width="256"></rect>
                <path
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    d="M45.42853,176.99811A95.95978,95.95978,0,1,1,79.00228,210.5717l.00023-.001L45.84594,220.044a8,8,0,0,1-9.89-9.89l9.47331-33.15657Z"
                ></path>
                <line
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    y2="112"
                    x2="160"
                    y1="112"
                    x1="96"
                ></line>
                <line
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    y2="144"
                    x2="160"
                    y1="144"
                    x1="96"
                ></line>
            </svg>
        </span>
        <span class="link-title">Chat</span>
    </a>
    <a class="link" href="#">
        <span class="link-icon">
            <!-- Icône Search -->
            <svg
                viewBox="0 0 256 256"
                fill="currentColor"
                height="28"
                width="28"
                xmlns="http://www.w3.org/2000/svg"
            >
                <rect fill="none" height="256" width="256"></rect>
                <circle
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    r="84"
                    cy="116"
                    cx="116"
                ></circle>
                <line
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    y2="224.00098"
                    x2="223.99414"
                    y1="175.40039"
                    x1="175.39356"
                ></line>
            </svg>
        </span>
        <span class="link-title">Search</span>
    </a>
    <a class="link" href="connexions/login.php">
        <span class="link-icon">
            <!-- Icône Profile -->
            <svg
                viewBox="0 0 256 256"
                fill="currentColor"
                height="28"
                width="28"
                xmlns="http://www.w3.org/2000/svg"
            >
                <rect fill="none" height="256" width="256"></rect>
                <circle
                    stroke-width="16"
                    stroke-miterlimit="10"
                    stroke="currentColor"
                    fill="none"
                    r="64"
                    cy="96"
                    cx="128"
                ></circle>
                <path
                    stroke-width="16"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="none"
                    d="M30.989,215.99064a112.03731,112.03731,0,0,1,194.02311.002"
                ></path>
            </svg>
        </span>
        <span class="link-title">Profile</span>
    </a>
</div>
<!-- Fin Navbar -->

<!-- Début Slider -->
<section class="slider">
    <div id="containerSlider">
        <div class="slidingImage"> <img src="../images/1.jpg" alt="image1"> </div>
        <div class="slidingImage"> <img src="../images/8.jpg" alt="image2"> </div>
        <div class="slidingImage"> <img src="../images/7.jpg" alt="image3"> </div>
        <div class="slidingImage"> <img src="../images/9.jpg" alt="image4"> </div>
    </div>
</section>
<!-- Fin Slider -->

<!-- Footer -->
<footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href="https://wa.me/+221786339806?text=Bonjour%2C"><i class='bx bxl-whatsapp'></i></a>
            <a href="https://www.instagram.com/mouhamed.dieng209?utm_source=ig_web_button_share_sheet&igsh=ODdmZWVhMTFiMw=="><i class='bx bxl-instagram'></i></a>
            <a href="https://www.facebook.com/profile.php?id=100011391988654&mibextid=kFxxJD"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.twitter.com"><i class='bx bxl-twitter'></i></a>
            <a href="https://www.linkedin.com/in/mouhamed-dieng-17774b2b9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i class='bx bxl-linkedin'></i></a>
        </div>
    </div>
    <div class="footerNav">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">A Propos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="footerBottom">
        <p>Copyright &copy; 2025 Tous droits sont reservés. <span class="designer">par Mouhamadou Lamine Dieng</span></p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('#containerSlider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script>
</body>
</html>