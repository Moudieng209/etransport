<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $photo = $_POST['photo'] ?? '';
    $role = $_POST['role'] ?? 'client'; 

    // Validation des données
    if (empty($prenom) || empty($nom) || empty($email) || empty($password)) {
        header("Location: inscription.php?error=Tous les champs sont obligatoires");
        exit();
    }

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        header("Location: inscription.php?error=Cet email est déjà utilisé");
        exit();
    }

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insérer l'utilisateur
    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (prenom, nom, email, password, photo, role, date_inscription) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$prenom, $nom, $email, $hashedPassword, $photo, $role]);
        
        header("Location: login.php?success=Compte créé avec succès");
        exit();
    } catch (PDOException $e) {
        header("Location: inscription.php?error=Erreur lors de la création du compte");
        exit();
    }
} else {
    header("Location: inscription.php");
    exit();
}
?>