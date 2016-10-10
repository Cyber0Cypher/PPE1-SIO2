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

/*--Récupération de l'ID de la place--*/
$id_place = $_POST['id_place'];

/*---Suppression de l'utilisateur dans la table "place"---*/
$req = $bdd->prepare('UPDATE place SET id_utilisateur = :id_utilisateur, id_reservation = :id_reservation WHERE id_place = :id_place');
$req->execute(array(
	'id_utilisateur' => " ",
	'id_reservation' => " ",
	'id_place' => $id_place));


header("location: utilisateur.php");
exit();
}
?>