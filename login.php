<?php
session_start();
include('connexion.php');

$mail = $_POST['mail'];
$mdp = sha1($_POST['mdp']);

$requete = $bdd->prepare('SELECT * FROM utilisateur WHERE mail_utilisateur= :mail AND mdp_utilisateur= :mdp');
$requete->execute(array('mail' => $mail, 
						'mdp' => $mdp));
$login = $requete->fetch();
$admin = $login['admin'];
$confirme = $login['confirme'];
$id_utilisateur = $login['id_utilisateur'];

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
	$_SESSION['id'] = $id_utilisateur;
	$_SESSION['mail'] = $mail;
	$_SESSION['mdp'] = $mdp;
	header("location: ./admin/admin.php");
        exit();
}

if($login AND !$admin AND $confirme)
{
	$_SESSION['id'] = $id_utilisateur;
	$_SESSION['mail'] = $mail;
	$_SESSION['mdp'] = $mdp;
	header("location: ./utilisateur/utilisateur.php");
        exit();
}
?>