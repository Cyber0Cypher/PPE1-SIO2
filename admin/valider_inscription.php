<?php
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
	
	/*Ajout de l'utilisateur après confirmation par l'administrateur*/
			
	if(isset($_POST['confirmer']))
	{	
		$id_utilisateur = $_POST['id_utilisateur'];
		$req = $bdd->prepare('UPDATE utilisateur SET confirme = :confirme WHERE id_utilisateur = :id_utilisateur');
		$req->execute(array('confirme' => true, 'id_utilisateur' => $id_utilisateur));

		header("location: ./demande_inscription.php");
    	exit();
	}
}
?>