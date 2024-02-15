<?php

// Configuration de l'authentification OAuth avec Facebook

// Remplacez les valeurs suivantes par vos propres clés d'application Facebook
$appID = 'VOTRE_APP_ID';
$appSecret = 'VOTRE_APP_SECRET';
$redirectURI = 'VOTRE_URL_DE_CALLBACK';

// Redirection vers l'URL d'authentification Facebook
$authUrl = "https://www.facebook.com/v12.0/dialog/oauth?client_id=$appID&redirect_uri=$redirectURI";
header('Location: ' . $authUrl);
exit;

?>
