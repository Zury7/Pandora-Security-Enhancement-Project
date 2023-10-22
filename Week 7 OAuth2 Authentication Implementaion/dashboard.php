<!-- dashboard.php -->
<?php
require 'vendor/autoload.php'; // Load the Google API PHP client library
session_start();
if (isset($_SESSION['access_token'])) {
    $clientID = '786932442007-gm5799fijn1oevqh72so22amjqqjiln4.apps.googleusercontent.com'; // Replace with your own client ID
    $clientSecret = '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'; // Replace with your own client secret
    $redirectURI = 'http://localhost:3000/redirect.php'; // Update with your redirect URL
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectURI);
    $client->setAccessToken($_SESSION['access_token']);

    $oauth2 = new Google_Service_Oauth2($client);
    $userData = $oauth2->userinfo->get();
    if (isset($_POST['logout'])) {
    // Logout button was clicked
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
        }
     echo ' 
     <div class="background-image"></div>
         <div class="outer-container">
             <div class="logout-container">
                 <div class="login-content">
             <h1>Hello !! </h1>
             <h1>Welcome to Pandora Company Limited !</h1> 
             <div class="company-logo"><img src="blue-flower.png" alt="Google Logo"></div>
             
            <div class="logout-form"><form method="post" action="dashboard.php"><input type="submit" name="logout" value="Logout" class="logout-button">
            </form>
            </div>
            
            </div></div></div></div>';
} else {
    header('Location: login.php');
}
?>
<!-- dashboard.php -->
<!DOCTYPE html>
<html><head><link rel="stylesheet" type="text/css" href="styles.css"></head><body></body>
</html>

