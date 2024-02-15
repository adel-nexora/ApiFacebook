<?php

// Récupérer le code d'autorisation Instagram à partir de la requête
$code = $_GET['code'];

// Configuration des clés d'application Instagram
$clientID = 'VOTRE_CLIENT_ID';
$clientSecret = 'VOTRE_CLIENT_SECRET';
$redirectURI = 'VOTRE_URL_DE_CALLBACK';

// Échange du code d'autorisation contre un jeton d'accès
$accessTokenUrl = 'https://api.instagram.com/oauth/access_token';
$params = array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirectURI,
    'code' => $code
);

// Envoyer une demande POST pour échanger le code contre un jeton d'accès
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $accessTokenUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Récupérer les données JSON retournées
$data = json_decode($response, true);

// Afficher les données de l'utilisateur ou faire autre chose avec les données récupérées
var_dump($data);

?>
