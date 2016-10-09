<?php
	session_start();
	include('connexion.php');

/*	if(isset($_SESSION['mail']) AND isset($_SESSION['mdp']))
	{*/
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Parking des ligues</title>
</head>
<body>
	<header>
		<h1 style="text-align:center;font-size:40px">Parking des ligues</h1>
	</header>
	<div id=inscription style="width: auto;height: auto;">
	<?php
	if (isset($_GET['register']) AND $_GET['register']=="ko"){?>
		<p style="color:red">Votre inscription n'a pas été prise en compte<br>Nous vous invitons à vous réinscrire</p>
	<?php } ?>
	<h3 style="text-align:center">Inscription</h3>
		<form method="post" action="register.php">
			<label>Nom</label>
			<input type="text" name="nom" required="required"><br/><br/>
			<label>Prénom</label>
			<input type="text" name="prenom" required="required"><br/><br/>
			<label>Adresse mail</label>
			<input type="mail" name="mail" required="required"><br/><br/>
			<label>Mot secret <span style="font-size: 11px">(en cas de mdp oublié)</span></label>
			<input type="text" name="secret" required="required"><br/><br/>
			<label>Mot de passe</label>
			<input type="password" name="mdp" required="required"><br/><br/>
			<label>Confirmation de mot de passe</label>
			<input type="password" name="cmdp" required="required"><br/><br/><br/>
			<input style="margin-right:calc(50% - 75px);width:150px; height : 30px" type="submit" value="Inscription">
		</form>
	</div>
	<div id=connexion style="width: auto;height: auto;">
	<?php
	if (isset($_GET['register']) AND $_GET['register']=="ok"){?>
		<p style="color:green">Votre inscription a bien été prise en compte<br>Nous vous invitons à vous connecter à présent</p>
	<?php } ?>
	<h3 style="text-align:center">Connexion</h3>
		<form method="post" action="login.php">
			<label>Adresse mail</label>
			<input type="mail" name="mail" required="required"><br/><br/>
			<label>Mot de passe</label>
			<input type="password" name="mdp" required="required"><br/></br>
			<a href="mdp_oublie.php" style="font-size: 12px">Mot de passe oublié ?</a>
			<?php
				if (isset($_GET['login']) AND $_GET['login']=="ko")
				{
					echo'<p style="color:red">Adresse mail ou mot de passe incorrect !</p>';
				} 
				if (isset($_GET['confirme']) AND $_GET['confirme']=="ko")
				{
					echo'<p style="color:red">L\'administrateur n\'a pas encore accepté votre inscription</p>';
				}
			?><br/><br/>
			<input style="margin-right:calc(50% - 75px);width:150px; height : 30px" type="submit" value="Connexion">
		</form>
	</div>
</body>
</html>

<?php 
	/*}*/
?>