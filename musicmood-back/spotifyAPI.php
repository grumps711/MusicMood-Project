// Instalar Guzzle vía Composer: composer require guzzlehttp/guzzle

<?php 
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$response = $client->post('https://accounts.spotify.com/api/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'code' => 'BQDJ6T7M0NGvBIUClNmvDP9iAKQ5IhQd6AQygFws7qyn_f0k2MQM2hoRNlKxu8nmKsMQyGmwgrpdSzUWJt7L7M2O68hmIYJ8zeAZJEy8g3BT5IZWoew2c4mY1AsZ17Ktsyc3du5vtb9XkDKUS4aEUbB-lFN6ElhoqD6cG7kuEVyR6w',
        'redirect_uri' => 'http://localhost:3000/callback',
        'client_id' => '82c52475ecbb416c802b74ae296bf970',
        'client_secret' => 'db4cb3dbbafe45c689ea087e914c9ab8',
    ]
]);

$tokenData = json_decode($response->getBody());
$accessToken = $tokenData->access_token;

$response = $client->get('https://api.spotify.com/v1/tracks/2TpxZ7JUBn3uw46aR7qd6V', [
    'headers' => [
        'Authorization' => 'Bearer ' . $accessToken
    ]
]);

$data = json_decode($response->getBody());

?>