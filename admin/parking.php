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
				'id_utilisateur'=> "",
				'id_reservation'=> ""));
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
			<?php
				$place = $bdd->query('SELECT P.id_place id_place,
									U.prenom_utilisateur prenom,
									U.nom_utilisateur nom,
									P.id_utilisateur id_utilisateur,
									P.id_reservation id_reservation,
									R.date_fin date_fin 
									FROM place P
									LEFT JOIN utilisateur U ON U.id_utilisateur = P.id_utilisateur
									LEFT JOIN reservation R ON P.id_reservation = R.id_reservation')
									or die(print_r($bdd->errorInfo()));

				while($donnees = $place->fetch())
				{
					echo '<div style="display: inline-block; border : 2px solid black; padding: 10px; margin: 10px;text-align: center; empty-cells: show;">';
					$duree = $donnees['date_fin'];

					if($donnees['id_utilisateur'] == 0 AND $donnees['id_reservation'] == 0)
					{
						echo $donnees['id_place'].'<br><br>[ LIBRE ]<br><br><br>';
					}
					else
					{
						echo '<span style="font-weight:bold">'.$donnees['id_place'].'</span><br>'.$donnees['prenom'].' '.$donnees['nom'].'<br><br>Expire le :<br>['.$duree.']<br><form method="POST" action="desattribution_place.php"><input type="hidden" name="id_place" value="'.$donnees['id_place'].'"><input type="submit" value="Libérer la place"></form>';
					}
					echo '</div>';
				}
			?>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php } ?>