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
?>

<html>
	<head>
		<title>Liste des utilisateurs</title>
		<link rel="stylesheet" href="../style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;">Espace administrateur</h1>
		</header>
		<div id="main">
			<center><a class="bouton" href="admin.php">Revenir à la page d'accueil</a></center>
			<?php
				/*Liste des demandes d'inscription*/

				echo '<h4>Liste des utilisateurs : </h4>';
				$recherche = $bdd->prepare('SELECT * FROM utilisateur WHERE confirme = :confirme');
				$recherche->execute(array(
					'confirme' => true));

				echo '<table class="tableau">
						<tr>
							<th>Prénom</th>
							<th>Nom</th>
							<th>Mail</th>
							<th>Désinscrire</th>
						</tr>';
				while($liste = $recherche->fetch())
				{
					echo '<tr>
							<td>'.$liste['prenom_utilisateur'].'</td>
							<td>'.$liste['nom_utilisateur'].'</td>
							<td>'.$liste['mail_utilisateur'].'</td>
							<td><form action="refuser_inscription.php" method="POST"><input type="hidden" name="id_utilisateur" value="'.$liste['id_utilisateur'].'"><input type="submit" name="refuser" value="Désinscrire"></form></td>
						</tr>';
				}
				echo '</table>';
			?>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php } ?>