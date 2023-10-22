<!-- redirect.php -->

<?php
require 'vendor/autoload.php'; // Load the Google API PHP client library
session_start();

$clientID = '786932442007-gm5799fijn1oevqh72so22amjqqjiln4.apps.googleusercontent.com'; // Replace with your own client ID
$clientSecret = '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'; // Replace with your own client secret
$redirectURI = 'http://localhost:3000/redirect.php'; // Update with your redirect URL

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    header('Location: dashboard.php');
}
?>
