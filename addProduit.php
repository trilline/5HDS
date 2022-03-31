<?php
include('index.php');

//generation d'un random aléatoire
function randomToken($car){
    $string = "";
    $chaine= "";
    $rand((double) microtime()*1000000);
    for($i=0; $i<$car; $i++){
        $string.=$chaine[rand()% strlen ($chaine)];
    }
    return $string;
}

// ajout d'un produit 

if( !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['token']) && !empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['reference']) && !empty($_POST['created_at']) && !empty($_POST['updated_at']) ){

	$requete = $pdo->prepare("INSERT INTO `produit` (`id`, `nom`, `description`, `token`, `prix`, `stock`, `reference`, `created_at` , `updated_at`) VALUES (NULL, :nom, :description, randomToken(20), :prix, :stock, :reference, :created_at, :updated_at);");
	$requete->bindParam(':nom', $_POST['nom']);
	$requete->bindParam(':description', $_POST['description']);
	$requete->bindParam(':token', $_POST['token']);
	$requete->bindParam(':prix', $_POST['prix']);
    $requete->bindParam(':stock', $_POST['stock']);
    $requete->bindParam(':reference', $_POST['reference']);
	$requete->bindParam(':created_at', $_POST['created_at']);
    $requete->bindParam(':updated_at', $_POST['updated_at']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le produit a bien été ajouté';
        var_dump($resultats);
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);