<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ajusta esto para mayor seguridad

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

// Paso 1: Obtener el código de autorización (esto normalmente lo haces en el frontend)
// Se omite aquí porque ya lo tienes

// Paso 2: Obtener el token de acceso
//$response = $client->post('https://accounts.spotify.com/api/token', [
//    'form_params' => [
//        'grant_type' => 'authorization_code',
//        'code' => $_GET['AQDop0ifCHQcN_b3OBm75hyg1u7-n-4MLbFpWWyiYDYOVv-MAZSPw1JgJHC_G4lLpC-7QLtHRIStYrpAu2Y-4NY4D5Gaa0455bwAIeyrO2vG5voib_cO3Q4sqkYUyBl35iNvl7Qoi83ehUNhNy94barRbuk6_p5AAnaV7RyOgkzTzg'], // Asumimos que envías el 'code' como parámetro GET
//        'redirect_uri' => 'http://localhost:3000/callback',
//        'client_id' => '82c52475ecbb416c802b74ae296bf970',
//        'client_secret' => 'db4cb3dbbafe45c689ea087e914c9ab8',
//    ]
//]);

//$tokenData = json_decode($response->getBody());
$accessToken = 'BQACFdSZWrCMss1yekNNY6QFOT6mMvyw0oY6e1Ro_G3Jx1hzoi5gU2oWT6wzwx2p0Qf66vXx1hpa9nxTHMJdVSDAGCb_F4juTxxhbV-npLWiayie9uH3ziBaPu7ZrnE4UyqFl31teewMy8LEB1wxtT8SQNEm5nLSdlHirQEHxPD7bQ';

// Paso 3: Hacer una petición a la API de Spotify
$response = $client->get('https://api.spotify.com/v1/search', [
    'headers' => [
        'Authorization' => 'Bearer ' . $accessToken
    ],
    'query' => [
        'q' => 'estimul',
        'type' => 'album'
    ]
]);

$data = json_decode($response->getBody());

echo json_encode($data); // Devolvemos los datos de Spotify como JSON
?>
