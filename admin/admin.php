<?php
	session_start();

	if(!isset($_SESSION['mail']) OR !isset($_SESSION['mdp']))
	{
	  header("location: ../index.php");
	  exit();
	}
	else
	{
?>
<html>
	<head>
		<title>Espace administrateur</title>
		<link rel="stylesheet" href="../style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;">Bienvenue sur votre espace administrateur</h1>
		</header>
		<div id="main">
				<center>
					<a class="bouton" href="demande_inscription.php">Voir la liste des demandes d'inscription</a><br><br><br>
					<a class="bouton" href="parking.php">Gérer le parking</a><br><br><br>
					<a class="bouton" href="liste_utilisateur.php">Liste des utilisateurs</a><br><br><br>
					<a class="bouton" href="../changer_mdp.php">Changer le mot de passe</a><br><br><br>
				</center>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php
	}
?>