<?php
	include('../connexion.php');
	
	/*Ajout de l'utilisateur après confirmation par l'administrateur*/
			
	if(isset($_POST['refuser']))
	{	
		$id_utilisateur = $_POST['id_utilisateur'];
		$req = $bdd->prepare('UPDATE utilisateur SET confirme = :confirme WHERE id_utilisateur = :id_utilisateur');
		$req->execute(array('confirme' => false, 'id_utilisateur' => $id_utilisateur));

		header("location: ./liste_utilisateur.php");
    	exit();
	}
?>