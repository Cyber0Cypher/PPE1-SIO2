<?php
include('connexion.php');

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

echo $mail;

$requete = $bdd->query('SELECT * FROM utilisateur WHERE mail_utilisateur= "'.$mail.'" AND mdp_utilisateur="'.$mdp.'"');
$login = $requete->fetch();

if(!$login)
{
	header("location: ./index.php?login=ko");
        exit();
}

if($login)
{
	header("location: ./index.php?login=ok");
        exit();
}
?>