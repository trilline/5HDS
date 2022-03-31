<?php
include('index.php');

// modification d'utilisateur 

if( (!empty($_POST['id'])) && (!empty($_POST['nom'])) ){
	//Si toutes les données sont saisie par le client
	$requete = $pdo->prepare("UPDATE `utilisateur` SET `nom` = ':nom' WHERE `utilisateur`.`id` = ':id' ;");
    $requete->bindParam(':id', $_POST['id']);
	$requete->bindParam(':nom', $_POST['nom']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le user a bien été modifié';
        var_dump($resultats);
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);