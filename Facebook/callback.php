<?php

// Récupérer le code d'autorisation Facebook à partir de la requête
$code = $_GET['code'];

// Configuration des clés d'application Facebook
$appID = 'VOTRE_APP_ID';
$appSecret = 'VOTRE_APP_SECRET';
$redirectURI = 'VOTRE_URL_DE_CALLBACK';

// Échange du code d'autorisation contre un jeton d'accès
$accessTokenUrl = "https://graph.facebook.com/v12.0/oauth/access_token?client_id=$appID&redirect_uri=$redirectURI&client_secret=$appSecret&code=$code";
$response = file_get_contents($accessTokenUrl);

// Récupérer les données JSON retournées
$data = json_decode($response, true);

// Afficher les données de l'utilisateur ou faire autre chose avec les données récupérées
var_dump($data);

?>
