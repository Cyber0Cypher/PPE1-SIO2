<?php
	include('../connexion.php');
	
	/*Ajout de l'utilisateur après confirmation par l'administrateur*/
			
	if(isset($_POST['confirmer']))
	{	
		$id_utilisateur = $_POST['id_utilisateur'];
		$req = $bdd->prepare('UPDATE utilisateur SET confirme = :confirme WHERE id_utilisateur = :id_utilisateur');
		$req->execute(array('confirme' => true, 'id_utilisateur' => $id_utilisateur));

		header("location: ./admin.php");
    	exit();
	}
?>