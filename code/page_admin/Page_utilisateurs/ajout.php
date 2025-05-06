<?php
require_once "connexion.php";
session_start();

// Vérification de l'authentification et du rôle
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../connexions/login.php?error=Accès non autorisé");
    exit();
}

// Vérification des variables prénom et nom
if (!isset($_SESSION['prenom']) || !isset($_SESSION['nom'])) {
    header("Location: ../connexions/login.php?error=Session incomplète - Veuillez vous reconnecter");
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
    <title>Form_ajout</title>
</head>
<style>
    body {
        background-image: url('../../../images/travel.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  background-color: #fff;
  padding: 15px;
  border-radius: 20px;
  position: relative;
  position: fixed;
  border: 2px solid #ffca00;
  box-shadow: 0px 0px 20px #ffca00;
  margin: 80px 20px;
  font-family: 'Poppins', sans-serif;

}

.title {
  font-size: 28px;
  color: #ffca00;;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}

.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: #ffca00;;
}

.title::before {
  width: 18px;
  height: 18px;
  background-color: #ffca00;;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.message, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}

.signin {
  text-align: center;
}

.signin a {
  color: #ffca00;;
}

.signin a:hover {
  text-decoration: underline #ffca00;;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: green;
}

.submit {
  border: none;
  outline: none;
  background-color: #ffca00;;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.submit:hover {
  background-color: rgb(56, 90, 194);
}

.file-input-container {
  position: relative;
  margin-top: 15px;
}

.file-input-label {
  display: block;
  padding: 10px;
  background-color: #f8f9fa;

border: 1px dashed #ccc;
  border-radius: 10px;
  text-align: center;
  cursor: pointer;
}

.file-input-label:hover {
  border-color: #ffca00;
}

.file-input {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;

 cursor: pointer;
}

.file-name {
  display: block;
  margin-top: 5px;
  font-size: 12px;
  color: #666;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }
  to {

 transform: scale(1.8);
    opacity: 0;
  }
}

.navbar {
  width: 100%;
  position: fixed;
  top: 0;
  z-index: 1000;
}
</style>
<body>
<div>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../dashboard.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Page_utilisateurs/index.php">Liste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../connexions/logout_form_amélioré.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
</div>
<form class="form" action="ajout_traitement.php" method="POST" enctype="multipart/form-data">
    <!-- <div class="logo">
        <img src="../../../images/logo.png" alt="Logo" style="width: 100px; height: auto;">
    </div> -->
    <p class="title">Enregistrement </p>
    <p class="message">Veuillez remplir les informations ci-dessous</p>
        <div class="flex">
        <label>
            <input required="" placeholder="" type="text" class="input">
            <span>Prénom</span>
        </label>

        <label>
            <input required="" placeholder="" type="text" class="input">
            <span>Nom</span>
        </label>
    </div>  
    
    <div class="flex">

    <label>
        <input required="" placeholder="" type="email" class="input">
        <span>Email</span>
    </label> 
        
    <label>
        <input required="" placeholder="" type="password" class="input">
        <span>Password</span>
    </label>
    </div>
    <label>
        <select required class="input" name="role" style="padding: 15px 10px;">
            <option value=""></option>
            <option value="admin">Administrateur</option>
            <option value="client">Client</option>
            <option value="chauffeur">Chauffeur</option>
        </select>
        <span>Rôle</span>
    </label>
    
    <div class="file-input-container">
        <label class="file-input-label">
            <i class='bx bx-cloud-upload' style="font-size: 24px; color: #ffca00;"></i><br>
            Choisir une photo
            <input type="file" class="file-input" name="photo" accept="image/*" required>
        </label>
        <span class="file-name">Formats acceptés: JPG, PNG, GIF</span>
    </div>
    
    <button type="submit" class="submit">Enregistrer</button>
</form>

<script>
// Afficher le nom du fichier sélectionné
document.querySelector('.file-input').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
    document.querySelector('.file-name').textContent = fileName;
    
    // Vérification de l'extension du fichier
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(fileName)) {
        alert('Veuillez sélectionner un fichier image valide (JPG, PNG, GIF)');
        e.target.value = '';
        document.querySelector('.file-name').textContent = 'Formats acceptés: JPG, PNG, GIF';
    }
});
</script>
</body>
</html>