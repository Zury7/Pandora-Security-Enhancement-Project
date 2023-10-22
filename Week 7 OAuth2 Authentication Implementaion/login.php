<!-- login.php -->

<?php
require 'vendor/autoload.php'; // Load the Google API PHP client library
session_start();

// Replace with your own OAuth2 client credentials
$clientID = '786932442007-gm5799fijn1oevqh72so22amjqqjiln4.apps.googleusercontent.com';
$clientSecret = '$$$$$$$$$$$$$$$$$$$$$$$';
$redirectURI = 'http://localhost:3000/redirect.php'; // Update with your redirect URL

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('email');

if (isset($_SESSION['access_token'])) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
}

if ($client->getAccessToken()) {
    $userData = $client->verifyIdToken();
    $_SESSION['access_token'] = $client->getAccessToken();
    // Redirect to dashboard if the user is authenticated
    header('Location: dashboard.php');
} else {
    echo '
    <div class="background-image"></div>
    <div class="outer-container">
        <div class="login-content">
            <h1>Login to Pandora Company Limited</h1>
            <div class="company-logo"><img src="blue-flower.png" alt="Google Logo"></div>
            <a href="' . $authUrl . '" class="google-login-button">
                <span>Login with Google</span>
            </a>
        </div>
    
</div>';

}
?>
<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
</body>
</html>

