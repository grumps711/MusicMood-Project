// Instalar Guzzle vía Composer: composer require guzzlehttp/guzzle

<?php 
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$response = $client->post('https://accounts.spotify.com/api/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'code' => 'AQDFj766HzTHLTTxquaR1dxWrsEraF49p0_pQkI6kAutqHq1RFTy4G0r2qHEXbesuhOSMPQoi-ZOH5Q5EFHM-bZYBGNap8jiewNy4ofZdyGpfzb6wK8eGMUOHimlYuyM8XJ6WCg1Eng2S2e9FJFTcyGpRVRS7UkHDirc9z4UiJnX1g',
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