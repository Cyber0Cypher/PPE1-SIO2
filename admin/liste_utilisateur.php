<?php
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
			<a class="bouton" href="admin.php">Revenir à la page d'accueil</a>
			<?php
				/*Liste des demandes d'inscription*/

				echo '<h4>Liste des utilisateurs : </h4>';
				$recherche = $bdd->prepare('SELECT * FROM utilisateur WHERE confirme = :confirme');
				$recherche->execute(array(
					'confirme' => true));

				echo '<table class="tableau">';
				echo '<tr>';
					echo '<th>Prénom</th>';
					echo '<th>Nom</th>';
					echo '<th>Mail</th>';
				echo '</tr>';
				while($liste = $recherche->fetch())
				{
					echo '<tr>';
						echo '<td>'.$liste['prenom_utilisateur'].'</td>';
						echo '<td>'.$liste['nom_utilisateur'].'</td>';
						echo '<td>'.$liste['mail_utilisateur'].'</td>';
					echo '</tr>';
				}
				echo '</table>';
			?>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>