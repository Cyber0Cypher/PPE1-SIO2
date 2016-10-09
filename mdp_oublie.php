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
		<title>Mot de passe oublié</title>
		<link rel="stylesheet" href="./style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;">Mot de passe oublié ?</h1>
		</header>
		<div id="main">
		<center>
			<?php
			if(isset($_POST['mail']) AND isset($_POST['secret']))
			{
				include('connexion.php');
				$mail_utilisateur = $_POST['mail'];
				$secret_utilisateur = $_POST['secret'];

				$recherche = $bdd->prepare('SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur AND secret_utilisateur = :secret_utilisateur');
				$recherche->execute(array(
					'mail_utilisateur' => $mail_utilisateur,
					'secret_utilisateur' => $secret_utilisateur));
				$verif = $recherche->fetch();

				if($verif)
				{
					echo '
					<form method="post" action="mdp_oublie.php">
						<p>Entrez votre nouveau mot de passe</p>
						<input type="password" name="new_mdp" required="required"><br>
						<p>Confirmez votre nouveau mot de passe</p>
						<input type="password" name="new_mdp2" required="required"><br><br>
						<input type="hidden" name="mail" value="'.$mail_utilisateur.'">
						<input type="submit" name="changer" value="Changer le mot de passe">
					</form>';
				}

				else
				{
					header("location: ./mdp_oublie.php?verif=ko");
       			 	exit();
				}
			}

			if(isset($_POST['new_mdp']) AND isset($_POST['new_mdp2']) AND $_POST['new_mdp'] == $_POST['new_mdp2'])
			{

				include('connexion.php');

				$mail_utilisateur = $_POST['mail'];
				$new_mdp_hache = sha1($_POST['new_mdp']);

				$req = $bdd->prepare('UPDATE utilisateur SET mdp_utilisateur = :new_mdp WHERE mail_utilisateur = :mail_utilisateur');
				$req->execute(array(
					'new_mdp' => $new_mdp_hache,
					'mail_utilisateur' => $mail_utilisateur
					));

				echo 'Votre mot de passe à été changé avec succès !<br><br>';
				echo '<a class="bouton" href="index.php">Revenir à la page de connexion</a>';
			}
			else if(isset($_POST['new_mdp']) AND isset($_POST['new_mdp2']) AND $_POST['new_mdp'] != $_POST['new_mdp2'])
			{
				header("location: ./mdp_oublie.php?new_mdp=ko");
       			exit();
			}

			if(!isset($_POST['mail']) AND !isset($_POST['secret']))
			{
				if(isset($_GET['verif']) AND $_GET['verif'] == "ko")
				{
					echo '<p style="color:red">Adresse mail ou mot secret incorrect !</p>';
				}
				if(isset($_GET['new_mdp']) AND $_GET['new_mdp'] == "ko")
				{
					echo '<p style="color:red">Les mots de passe sont différents! Veuillez réessayer</p>';
				}
				echo '
					<form method="post" action="mdp_oublie.php">
						<p>Entrez votre adresse mail</p>
						<input type="mail" name="mail" required="required"><br>
						<p>Entrez votre mot secret</p>
						<input type="text" name="secret" required="required"><br><br>
						<input type="submit" name="reinitialiser" value="Réinitialiser le mot de passe">
					</form>';
			}
			?>
		</center>
		</div>
	</body>
</html>
<?php } ?>