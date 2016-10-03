<?php
session_start();
include('connexion.php');

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

$_SESSION['mail'] = $mail;
$_SESSION['mdp'] = $mdp;

$requete = $bdd->query('SELECT * FROM utilisateur WHERE mail_utilisateur= "'.$mail.'" AND mdp_utilisateur="'.$mdp.'"');
$login = $requete->fetch();
$admin = $login['admin'];
$confirme = $login['confirme'];

if(!$login)
{
	header("location: ./index.php?login=ko");
        exit();
}

if(!$confirme)
{
	header("location: ./index.php?confirme=ko");
        exit();
}

if($login AND $admin)
{
	header("location: ./admin/admin.php");
        exit();
}

if($login AND !$admin AND $confirme)
{
	header("location: ./utilisateur.php");
        exit();
}
?>