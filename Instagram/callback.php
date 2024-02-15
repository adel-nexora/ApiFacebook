<?php
// Vérifiez si le code d'autorisation est présent dans les paramètres de la requête
if (isset($_GET['code'])) {
    // Récupérez le code d'autorisation
    $code = $_GET['code'];

    // Paramètres de requête pour échanger le code d'autorisation contre un jeton d'accès
    $params = array(
        'client_id' => 'YOUR_CLIENT_ID',
        'client_secret' => 'YOUR_CLIENT_SECRET',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://localhost/callback.php',
        'code' => $code
    );

    // Configuration de la requête pour échanger le code d'autorisation contre un jeton d'accès
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.instagram.com/oauth/access_token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Traitement de la réponse pour obtenir le jeton d'accès
    $data = json_decode($response, true);

    // Vérifiez si le jeton d'accès est présent dans la réponse
    if (isset($data['access_token'])) {
        // Récupérez le jeton d'accès
        $access_token = $data['access_token'];

        // Utilisez le jeton d'accès pour accéder aux données de l'utilisateur via l'API Instagram
        // Par exemple, récupérez les informations de profil de l'utilisateur
        $profile_url = 'https://graph.instagram.com/me?fields=id,username&access_token=' . $access_token;
        $profile_data = json_decode(file_get_contents($profile_url), true);

        // Affichez les informations de profil de l'utilisateur
        echo "<h1>Bienvenue, " . $profile_data['username'] . "!</h1>";
    } else {
        echo "Échec de l'échange du code d'autorisation contre un jeton d'accès.";
    }
} else {
    echo "Code d'autorisation non trouvé dans les paramètres de la requête.";
}
?>
