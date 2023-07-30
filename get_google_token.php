<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('your_client_id');
$client->setClientSecret('your_client_secret');
$client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
$client->addScope("https://www.googleapis.com/auth/drive");
$client->setAccessType('offline'); // esto es para obtener un token de actualización

$authUrl = $client->createAuthUrl();

// solicita la autorización del usuario
echo "Ve a la siguiente URL y autoriza la aplicación:\n$authUrl\n";
echo "Ingresa el código de autorización:\n";
$authCode = trim(fgets(STDIN));

// intercambia el código de autorización por tokens de acceso y actualización
$token = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($token);

// si hay un token de actualización, guárdalo
if (isset($token['refresh_token'])) {
    file_put_contents('google_drive_token.txt', $token['refresh_token']);
}
