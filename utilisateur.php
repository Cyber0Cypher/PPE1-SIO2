<?php
	session_start();
	include('connexion.php');
	
?>

<html>
	<head>
		<title>Espace administrateur</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1 style="text-align:center;font-size:40px">Bienvenue sur votre espace</h1>
		</header>
		<div id="main">
			<div id="left">
				<p>Numéro de place attribué :</p><br>
				<p>Votre rang dans la file d'attente :</p><br>
				<p>Place précedenment attribuées :</p><br>
			</div>
			<div id="password">
				<h3 style="text-align: center">Modification du mot de passe</h3>
				<form method= "post" action ="">
					<label>Ancien mot de passe</label>
					<input type="text" name="OldPwd" required="required"></br></br>
					<label>Nouveau mot de passe</label>
					<input type="text" name="NewPwd" required="required"></br></br>
					<label>Confirmation du mot de passe</label>
					<input type="text" name="TestPwd" required="required"></br></br>
					<p class="center"><input style="float:none;height : 30px" type="submit" value="Changer le mot de passe"/></p>
				</form>
			</div>
			<div class="center" style="clear: right;">
				<br><br><br>
				<form method="POST" action="">
					<input style="float: none; width: 200px; height : 50px" type="submit" value="Réserver une place">
				</form>
			</div>
		</div>
		<br><center><a class="bouton" style="background-color: #bcbfca" href="../deconnexion.php">Déconnexion</a></center>
	</body>
</html>