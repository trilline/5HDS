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

// ajout d'utilisateur 

if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['token']) && !empty($_POST['roleUser']) && !empty($_POST['created_at']) && !empty($_POST['updated_at']) ){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `token`, `roleUser`, `created_at` , `updated_at`) VALUES (NULL, :nom, :prenom, randomToken(20), :roleUser, :created_at, :updated_at);");
	$requete->bindParam(':nom', $_POST['nom']);
	$requete->bindParam(':prenom', $_POST['prenom']);
	$requete->bindParam(':token', $_POST['token']);
	$requete->bindParam(':roleUser', $_POST['roleUser']);
	$requete->bindParam(':created_at', $_POST['created_at']);
    $requete->bindParam(':updated_at', $_POST['updated_at']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le user a bien été ajouté';
        var_dump($resultats);
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);