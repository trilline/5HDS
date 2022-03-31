<?php
include('index.php');

if( !empty($_GET['nom']) ){
	//Si le client a saisi un nom, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `utilisateur` WHERE `nom` LIKE :nom");
	$requete->bindParam(':nom', $_GET['nom']);
} else {
	//Sinon on affiche tous les utilisateurs
	$requete = $pdo->prepare("SELECT * FROM `utilisateur`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['utilisateur'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
