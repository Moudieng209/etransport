<?php
session_start();
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    // Validation des champs
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=Tous les champs sont obligatoires&email=".urlencode($email));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?error=Format d'email invalide&email=".urlencode($email));
        exit();
    }

    // Récupérer l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];

        // Redirection en fonction du rôle
        switch ($user['role']) {
            case 'admin':
                header("Location: ../connexions/chargement.php");
                break;
            case 'chauffeur':
                header("Location: ../page_chauffeur/index.php");
                break;
            case 'client':
                header("Location: ../../page_client_protect.php");
                break;
            default:
                header("Location: index.php");
        }
        exit();
    } else {
        sleep(2); // Délai anti-bruteforce
        header("Location: login.php?error=Email ou mot de passe incorrect&email=".urlencode($email));
        exit();
    }
}

// Si la méthode n'est pas POST
header("Location: login.php");
exit();
?>