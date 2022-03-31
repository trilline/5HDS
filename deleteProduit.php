<?php
include('index.php');

// Suppresion 

if( !empty($_Delete['id']) ){

	//On recupère un id 

	$requete = $pdo->prepare("DELETE FROM `produit` WHERE `id` = ':id' ");
	$requete->bindParam(':id', $_Delete['id']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le user est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);