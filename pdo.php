<?php
$hote = 'localhost';
$port = "3306";
$nom_bdd = 'api_5HDS_gestion_stock';
$utilisateur ='root';
$mot_de_passe ='';

try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd, $utilisateur,$mot_de_passe);

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}