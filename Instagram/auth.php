<?php

// Configuration de l'authentification OAuth avec Instagram

// Remplacez les valeurs suivantes par vos propres clés d'application Instagram
$clientID = 'VOTRE_CLIENT_ID';
$clientSecret = 'VOTRE_CLIENT_SECRET';
$redirectURI = 'VOTRE_URL_DE_CALLBACK';

// Redirection vers l'URL d'authentification Instagram
$authUrl = "https://api.instagram.com/oauth/authorize/?client_id=$clientID&redirect_uri=$redirectURI&response_type=code";
header('Location: ' . $authUrl);
exit;

?>
