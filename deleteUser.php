<?php
include('index.php');

// Suppresion 

if( !empty($_Post['id']) ){

	//On recupère un id 

	$requete = $pdo->prepare("DELETE FROM `utilisateur` WHERE `id` = ':id' ");
	$requete->bindParam(':id', $_POST['id']);

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