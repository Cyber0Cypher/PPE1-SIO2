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

/*--Récupération de l'ID de l'utilisateur--*/
$id_utilisateur = $_SESSION['id'];

/*--Récupération du nombre de place dans le parking--*/
$place = $bdd->query('SELECT * FROM place');
$nb_place = $place->rowCount();

/*--Interrogation de la base pour savoir si il y a des places libres--*/
$libre = $bdd->query('SELECT * FROM place WHERE id_reservation = 0 AND id_utilisateur = 0');
$libre = $libre->rowCount();

if($libre<=0)
{
	header("location: utilisateur.php?libre=0");
	exit();
}
else
{
	do
	{
		$id_place = rand(1,$nb_place);

		$place = $bdd->prepare('SELECT * FROM place WHERE id_place = :id_place AND id_reservation != 0 AND id_utilisateur != 0');
		$place->execute(array(
			'id_place' => $id_place));
		$place_non_libre = $place->fetch();
	}while ($place_non_libre);
}

$req = $bdd->prepare('INSERT INTO reservation VALUES (:id_reservation,NOW(),DATE_ADD(NOW(), INTERVAL 2 DAY),:id_place,:id_utilisateur)');
$req->execute(array(
	'id_reservation' => NULL,
	'id_place' => $id_place,
	'id_utilisateur' => $id_utilisateur));

$req->closeCursor();

/*--Récupération de l'ID de la réservation correspondant à la place réservé--*/
$reservation = $bdd->prepare('SELECT * FROM reservation WHERE id_place = :id_place');
$reservation->execute(array('id_place' => $id_place));
$reservation = $reservation->fetch();
$id_reservation = $reservation['id_reservation'];

/*---Ajout de l'utilisateur dans la table "place"---*/
$req = $bdd->prepare('UPDATE place SET id_utilisateur = :id_utilisateur, id_reservation = :id_reservation WHERE id_place = :id_place');
$req->execute(array(
	'id_utilisateur' => $_SESSION['id'],
	'id_reservation' => $id_reservation,
	'id_place' => $id_place));

header("location: utilisateur.php");
exit();
}
?>