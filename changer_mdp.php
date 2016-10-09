<?php
	session_start();

	if(!isset($_SESSION['mail']) OR !isset($_SESSION['mdp']))
	{
	  header("location: ./index.php");
	  exit();
	}
	else
	{
?>
<html>
	<head>
		<title>Changer le mot de passe</title>
		<link rel="stylesheet" href="./style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;">Modification du mot de passe</h1>
		</header>
		<div id="main">
		<center>
			<a class="bouton" href="admin/admin.php">Revenir à la page d'accueil</a>
			<br><br>
			<?php
			if(!isset($_POST['new_mdp']))
			{
				if(isset($_GET['verif']) AND $_GET['verif'] == "ko")
				{
					echo '<p style="color:red">Ancien mot de passe ou confirmation du mot de passe incorrecte!</p>';
				}
				echo '
				<h3 style="text-align: center">Modification du mot de passe</h3>
				<form method= "post" action ="changer_mdp.php">
					<label>Ancien mot de passe</label><br>
					<input type="password" name="old_mdp" required="required"></br></br>
					<label>Nouveau mot de passe</label><br>
					<input type="password" name="new_mdp" required="required"></br></br>
					<label>Confirmation du mot de passe</label><br>
					<input type="password" name="new_mdp2" required="required"></br></br>
					<p class="center"><input style="float:none;height : 30px" type="submit" value="Changer le mot de passe"/></p>
				</form>';
			}
			if(isset($_POST['new_mdp']) AND isset($_POST['new_mdp2']) AND isset($_POST['old_mdp']))
			{
				include('connexion.php');

				$mail_utilisateur = $_SESSION['mail'];
				$old_mdp_hache = sha1($_POST['old_mdp']);

				$recherche = $bdd->prepare('SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur AND mdp_utilisateur = :mdp_utilisateur');
				$recherche->execute(array(
					'mail_utilisateur' => $mail_utilisateur,
					'mdp_utilisateur' => $old_mdp_hache));
				$verif = $recherche->fetch();

				if($verif)
				{
					$new_mdp_hache = sha1($_POST['new_mdp']);
					$req = $bdd->prepare('UPDATE utilisateur SET mdp_utilisateur = :new_mdp WHERE mail_utilisateur = :mail_utilisateur');
					$req->execute(array(
						'new_mdp' => $new_mdp_hache,
						'mail_utilisateur' => $mail_utilisateur
						));

					echo 'Votre mot de passe à été changé avec succès !<br><br>';
					echo '<a class="bouton" href="admin/admin.php">Revenir à la page d\'accueil</a>';
				}
				if(!$verif OR $_POST['new_mdp'] != $_POST['new_mdp2'])
				{
					header("location: ./changer_mdp.php?verif=ko");
       			 	exit();
				}
			}
		?>
		</center>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>
<?php } ?>