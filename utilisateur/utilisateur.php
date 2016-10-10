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
			<h1 style="text-align:center;font-size:35px">Bienvenue sur votre espace</h1>
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

		/*--Places précédemment attribuées--*/
		$reservation = $bdd->prepare('SELECT * FROM reservation WHERE id_utilisateur = :id_utilisateur ORDER BY date_debut DESC');
		$reservation->execute(array(
			'id_utilisateur' => $id_utilisateur));

		/*--Message avertissement : plus de place libre--*/
		if(isset($_GET['libre']) AND $_GET['libre'] == 0)
		{
			echo '<center style="color:red">Aucune place libre pour le moment !</center><br>';
		}

		if($place)
		{
			echo '<p>Numéro de place attribué : '.$place['id_place'].'</p><br>
			<p>Votre rang dans la file d\'attente :</p><br>
			<p>Places précédemment attribuées :</p>
			';
			while($precedentes = $reservation->fetch())
			{
				echo '- ['.$precedentes['date_debut'].'] -> place N°'.$precedentes['id_place'].'<br>';
			}

			echo '
			<center>
				<br><br><br>
				<form method="POST" action="desattribution_place.php">
					<input type="hidden" name="id_place" value="'.$place['id_place'].'">
					<input style="float: none; width: 200px; height : 50px" type="submit" value="Libérer la place">
				</form>
			</center>';
		}
		else
		{
			echo '<p>Places précédemment attribuées :</p>';
			while($precedentes = $reservation->fetch())
			{
				echo '- ['.$precedentes['date_debut'].'] -> place N°'.$precedentes['id_place'].'<br>';
			}

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