<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ajusta esto para mayor seguridad

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

// Paso 1: Obtener el código de autorización (esto normalmente lo haces en el frontend)
// Se omite aquí porque ya lo tienes

// Paso 2: Obtener el token de acceso
$response = $client->post('https://accounts.spotify.com/api/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'code' => $_GET['AQBOMBDP515XLITKGoJ4q84HPOqTXKySuCZgb-f_LlK2Bpp9kSdc1AL1ugj14PQ584xSXhz0JZ3KvvifbUSSUPeW2fnoQj7Xa1wceM4OVl7k2ZWfHQY7mbcTiy6aw5LpXPq2LrDOxdihq3xBOmO7CyLxi_yBjCqMx4QR9JonIFBlnA'], // Asumimos que envías el 'code' como parámetro GET
        'redirect_uri' => 'http://localhost:3000/callback',
        'client_id' => '82c52475ecbb416c802b74ae296bf970',
        'client_secret' => 'db4cb3dbbafe45c689ea087e914c9ab8',
    ]
]);

$tokenData = json_decode($response->getBody());
$accessToken = $tokenData->access_token;

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
