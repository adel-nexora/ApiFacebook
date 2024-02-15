<?php
// Vérifiez si le code d'autorisation est présent dans les paramètres de la requête
if (isset($_GET['code'])) {
    // Récupérez le code d'autorisation
    $code = $_GET['code'];
    
    // Paramètres de requête pour échanger le code d'autorisation contre un jeton d'accès
    $params = array(
        'client_id' => 'YOUR_APP_ID',
        'client_secret' => 'YOUR_APP_SECRET',
        'redirect_uri' => 'http://localhost/callback.php',
        'code' => $code
    );

    // Effectuer une demande pour échanger le code d'autorisation contre un jeton d'accès
    $token_url = 'https://graph.facebook.com/v12.0/oauth/access_token?' . http_build_query($params);
    $response = file_get_contents($token_url);
    $params = json_decode($response, true);

    // Vérifiez si le jeton d'accès est présent dans la réponse
    if (isset($params['access_token'])) {
        // Récupérez le jeton d'accès
        $access_token = $params['access_token'];

        // Utilisez le jeton d'accès pour accéder aux données de l'utilisateur via l'API Facebook
        // Par exemple, récupérez les informations de profil de l'utilisateur
        $profile_url = 'https://graph.facebook.com/me?fields=id,name,email&access_token=' . $access_token;
        $profile_data = json_decode(file_get_contents($profile_url), true);

        // Affichez les informations de profil de l'utilisateur
        echo "<h1>Bienvenue, " . $profile_data['name'] . "!</h1>";
        echo "<p>Votre adresse e-mail est : " . $profile_data['email'] . "</p>";
    } else {
        echo "Échec de l'échange du code d'autorisation contre un jeton d'accès.";
    }
} else {
    echo "Code d'autorisation non trouvé dans les paramètres de la requête.";
}
?>
