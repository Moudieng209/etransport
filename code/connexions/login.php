<?php
// session_start();

// Si l'utilisateur est déjà connecté, redirigez-le vers la page d'accueil
if (isset($_SESSION['id'])) {
    header("Location: ../../page_client_protect.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion</title>
    <style>
        body {
            background-image: url('../../images/travel.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 90vh;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            padding-left: 20px;
            padding-top: 110px;
        }

        .home-button {
            position: absolute;
            top: 5px;
            left: 5px;
            color: grey;
            /* background-color: #ffca00; */
            padding: 8px 15px;
            /* border-radius: 20px; */
            text-decoration: none;
            font-weight: bold;
            /* box-shadow: 0 2px 5px rgba(0,0,0,0.2); */
            transition: all 0.2s ease-in-out;
            /* z-index: 1000; */
        }

        .home-button:hover {
            /* transform: scale(1.05); */
            /* background-color: #ffd700; */
        }

        .container {
            max-width: 350px;
            background: #F8F9FD;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 3px solid #ffca00;
            box-shadow: #85bdd7 0px 30px 30px -20px;
            margin-left: 50px;
        }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: #ffca00;
            margin-bottom: 20px;
        }

        .form {
            margin-top: 10px;
        }

        .error-message {
            background: #fbd0d9;
            color: #b8302e;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #f8b6c1;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #c3e6cb;
        }

        .form .input {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 10px;
            border-radius: 20px;
            margin-top: 10px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent;
            font-size: 14px;
        }

        .form .input:focus {
            outline: none;
            border-inline: 1px solid #ffca00;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #ffca00;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, #ffca00 0%, #ffca00 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border: none;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-size: 14px;
        }

        .form .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(243, 204, 12, 0.77) 0px 23px 10px -20px;
        }

        .social-account-container {
            margin-top: 25px;
        }

        .social-account-container .title {
            display: block;
            text-align: center;
            font-size: 10px;
            color: rgb(170, 170, 170);
        }

        .social-account-container .social-accounts {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 5px;
        }

        .social-account-container .social-accounts .social-button {
            background: linear-gradient(45deg, #000000 0%, rgb(112, 112, 112) 100%);
            border: 5px solid white;
            padding: 5px;
            border-radius: 50%;
            width: 40px;
            aspect-ratio: 1;
            display: grid;
            place-content: center;
            box-shadow: #85bdd7 0px 12px 10px -8px;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .agreement {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .agreement a {
            text-decoration: none;
            color: #ffca00;
            font-size: 9px;
        }
    </style>
</head>
<body>
    <a class="home-button" href="../../index.php">Accueil</a>

    <div class="container">
        <div class="heading">Se connecter</div>
        <form action="authentification.php" class="form" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>
            
            <?php if (isset($_GET['success'])) { ?>
                <div class="success-message">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php } ?>

            <input required class="input" type="email" name="email" id="email" placeholder="E-mail" 
                   value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>">
                   
            <input required class="input" type="password" name="password" id="password" placeholder="Mot de passe">
            
            <span class="forgot-password"><a href="#">Mot de passe oublié ?</a></span>
            <input class="login-button" type="submit" value="Se connecter">
        </form>

        <div class="social-account-container">
            <span class="title">Se connecter avec</span>
            <div class="social-accounts">
                <button class="social-button google">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                        <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                    </svg>
                </button>
                <button class="social-button apple">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                        <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                    </svg>
                </button>
                <button class="social-button twitter">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <span class="agreement"><a href="inscription.php">Je n'ai pas de compte ?</a></span>
    </div>
</body>
</html>