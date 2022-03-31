<?php
include('index.php');

if( !empty($_GET['ville_depart']) ){
	//Si le client a saisi un nom de produit, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `produit` WHERE `nom` LIKE :nom");
	$requete->bindParam(':nom', $_GET['nom']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `produit`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['produit'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);

// Ajout de produit 

if( !empty($_GET['nom']) && !empty($_GET['description']) && !empty($_GET['token']) && !empty($_GET['prix']) && !empty($_GET['stock']) && !empty($_GET['reference']) && !empty($_GET['created_at']) && !empty($_GET['updated_at']) ){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `produit` (`id`, `nom`, `description`, `token`, `prix`, `stock`, `reference` , `created_at` , `updated_at` ) VALUES (NULL, :nom, :description, :token, :prix, :stock, :reference, :created_at, :updated_at);");
	$requete->bindParam(':nom', $_GET['nom']);
	$requete->bindParam(':description', $_GET['description']);
	$requete->bindParam(':token', $_GET['token']);
	$requete->bindParam(':prix', $_GET['prix']);
	$requete->bindParam(':stock', $_GET['stock']);
    $requete->bindParam(':reference', $_GET['reference']);
    $requete->bindParam(':created_at', $_GET['created_at']);
    $requete->bindParam(':created_at', $_GET['created_at']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le produit a bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);

// Suppresion 

/*if( !empty($_GET['id']) ){
	//Si le client a saisis un id

	$requete = $pdo->prepare("DELETE FROM `vols` WHERE `id` = :id");
	$requete->bindParam(':id', $_GET['id']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le vol est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);





CREATE TABLE `api_5hds_gestion_stock`.`utilisateur` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(30) NOT NULL , `prenom` VARCHAR(255) NOT NULL , `token` VARCHAR(30) NOT NULL , `roleUser` VARCHAR(30) NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/