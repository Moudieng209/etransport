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

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs where role='admin' ORDER BY id ASC");
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("ERREUR: Impossible d'exécuter la requête. " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title>Liste</title>
	<link rel="shortcut icon" href="../../../../../images/liste.png">
    <style>
        .password-toggle {
            cursor: pointer;
            color: #007bff;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }
        .password-dots {
            letter-spacing: 2px;
            font-family: monospace;
        }
        .password-value {
            display: none;
        }
        .password-container.show .password-dots {
            display: none;
        }
        .password-container.show .password-value {
            display: inline;
        }
        .password-container {
            word-break: break-all;
        }
    </style>
</head>
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
                        <a class="nav-link" href="../../connexions/logout_form_amélioré.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
	</div>
<h1 style="display:flexbox; margin-top:0px; margin-left:450px; margin-right:420px;">Liste des administrateurs</h1><br><br>
<table class="table table-bordered table-hover">
		<thead class="thead" style="background: #ffca00;">
		  <tr>
			<th>id</th>
			<th>Prenom</th>
			<th>Nom</th>
            <th>Email</th>
            <th>Password</th>
			<th>Photo</th>
            <th>Date_ajout</th>
            <th>Modifier</th>
            <th>Supprimer</th>
		  </tr>
		</thead>
		<?php 
		$length = count($utilisateurs);
		for ($i=0; $i <$length; $i++) { 
		 	
		 $key = $utilisateurs[$i];
			?> 

		<tr>
			<td><?php echo $key['id']; ?></td>
			<td><?php echo $key['prenom']; ?></td>
			<td><?php echo $key['nom']; ?></td>
			<td><?php echo $key['email']; ?></td>
			<td class="password-container">
                <span class="password-dots">••••••••••••••••</span>
                <span class="password-value"><?php echo $key['password']; ?></span>
                <span class="password-toggle" onclick="togglePassword(this.parentElement)">
                    <i class='bx bx-show'></i> Afficher
                </span>
            </td>
			<td><img src="../../../../../images/<?php echo $key['photo']; ?>" alt="Photo" style="width: 50px; height: 50px;"></td>
			<td><?php echo $key['date_inscription']; ?></td>
			<td><a href="modification.php?id=<?php echo $key['id']; ?>" class= "btn btn-primary"><i class="bx bxs-pencil"></i></a></td>
			<th><a href="supprime.php?id=<?php echo $key['id']; ?>" class="btn btn-danger" onclick ="return confirm('êtes vous sûre de vouloir supprimer cette utilisateur?')"><i class="bx bxs-trash"></i></a></th>
		</tr>
		<?php }?>

	</table>

    <script>
        function togglePassword(container) {
            container.classList.toggle('show');
            
            const toggleText = container.querySelector('.password-toggle');
            if (container.classList.contains('show')) {
                toggleText.innerHTML = '<i class="bx bx-hide"></i> Masquer';
            } else {
                toggleText.innerHTML = '<i class="bx bx-show"></i> Afficher';
            }
        }
    </script>
</body>
</html>