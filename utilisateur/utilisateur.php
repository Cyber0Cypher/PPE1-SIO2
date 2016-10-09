<?php
	session_start();
	include('../connexion.php');

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
			<h1 style="text-align:center;font-size:40px">Bienvenue sur votre espace</h1>
		</header>
		<div id="main">
		<?php
		/* Récupération du mail de l'utilisateur connecté*/
		$mail_utilisateur = $_SESSION['mail'];
		$id_utilisateur = $_SESSION['id'];

		/*--Vérification que l'utilisateur n'a pas déjà une place d'attribué--*/
		$place = $bdd->prepare('SELECT * FROM place WHERE id_utilisateur = :id_utilisateur');
		$place->execute(array(
			'id_utilisateur' => $id_utilisateur));
		$place = $place->fetch();

		if($place)
		{
			echo '<p>Numéro de place attribué : '.$place['id_place'].'</p><br>
			<p>Votre rang dans la file d\'attente :</p><br>
			<p>Place précedenment attribuées :</p><br>';
		}
		else
		{
			echo '
			<center>
				<p>Vous n\'avez fait actuellement aucune demande de réservation de place</p>
				<br><br><br>
				<form method="POST" action="attribution_place.php">
					<input style="float: none; width: 200px; height : 50px" type="submit" value="Réserver une place">
				</form>
			</center>';
		}
		?>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php
	}
?>