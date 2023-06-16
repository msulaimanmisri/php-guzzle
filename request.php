<?php


require 'vendor/autoload.php';
require 'env.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$per_page = 100;
$orientation = 'portrait';
$data = '';
$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $client = new Client();

        try {
            $response = $client->get("https://api.unsplash.com/search/photos?query=$keyword&client_id=$client_id&per_page=$per_page&orientation=$orientation");
            $data = $response->getBody()->getContents();
        } catch (ClientException $e) {
            $error = 'Error fetching data. Please try again.';
        }
    }
}