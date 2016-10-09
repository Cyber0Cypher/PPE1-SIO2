<?php
session_start();

if(!isset($_SESSION['mail']) OR !isset($_SESSION['mdp']))
{
  header("location: ../index.php");
  exit();
}
else
{

include('../connexion.php');

$recherche = $bdd->query('SELECT * FROM place');
$nb_place = $recherche->rowCount();

if(isset($_POST['valider']))
{
	$nb_place_avant = $nb_place;
	$nb_place = $_POST['nb_place'];

	if($nb_place_avant>$nb_place)
	{
		for ($i=$nb_place+1; $i<=$nb_place_avant; $i++)
		{
			$req = $bdd->query('DELETE FROM place WHERE id_place = "'.$i.'"');
		}
	}
	
	if($nb_place_avant<$nb_place)
	{
		for ($i=$nb_place_avant+1; $i<=$nb_place; $i++)
		{
			$req = $bdd->prepare('INSERT INTO place VALUES (:id_place,:id_utilisateur,:id_reservation)');
			$req->execute(array(
				'id_place' => $i,
				'id_utilisateur'=> 0,
				'id_reservation'=> 0));
		}
	}
}
?>
<html>
	<head>
		<title>Gestion du parking</title>
		<link rel="stylesheet" href="../style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;">Gestion du parking</h1>
		</header>
		<div id="main">
		<center>
			<a class="bouton" href="admin.php">Revenir à la page d'accueil</a>
			<br><br>
			<form method="POST" action="parking.php">
				<label for="nb_place">Nombre de place dans le parking</label><br><br>
				<input type="number" name="nb_place" value="<?php echo $nb_place; ?>">
				<input type="submit" name="valider" value="Valider">
			</form>
		</center>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php } ?>