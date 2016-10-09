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


do
{
	$id_place = rand(1,$nb_place);

	$reservation = $bdd->prepare('SELECT * FROM reservation WHERE id_place = :id_place');
	$reservation->execute(array(
		'id_place' => $id_place));
	$reservation = $reservation->fetch();
}while ($reservation);

$req = $bdd->prepare('INSERT INTO reservation VALUES (:id_reservation,NOW(),NOW(),:id_place,:id_utilisateur)');
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