<?php
	include('../connexion.php');
?>

<html>
	<head>
		<title>Liste des demandes d'inscription</title>
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

				echo '<h4>Liste des demandes d\'inscription : </h4>';
				$recherche = $bdd->prepare('SELECT * FROM utilisateur WHERE confirme = :confirme');
				$recherche->execute(array(
					'confirme' => false));

				echo '<form method="POST" action="valider_inscription.php">';
				while($listeAttente = $recherche->fetch())
				{
					echo '<form method="POST" action="admin.php">';
					echo $listeAttente['prenom_utilisateur'].' '.$listeAttente['nom_utilisateur'].' -> '.$listeAttente['mail_utilisateur'].' <input type="hidden" name="id_utilisateur" value="'.$listeAttente['id_utilisateur'].'"><input type="submit" name="confirmer" value="Accepter">';
					echo '</form>';
					echo '<br>';
				}
				
				echo '<br><br>';
			?>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>