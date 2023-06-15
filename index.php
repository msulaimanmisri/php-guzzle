<?php

require 'vendor/autoload.php';
require 'env.php';

use GuzzleHttp\Client;

$per_page = 12;
$orientation = 'portrait';
$data = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $client = new Client();
        $response = $client->get("https://api.unsplash.com/search/photos?query=$keyword&client_id=$client_id&per_page=$per_page&orientation=$orientation");
        $data = $response->getBody()->getContents();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
    .unsepelesh-img-size {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
    </style>

    <title>Guzzle from scatch</title>
</head>

<body class="bg-light">
    <div class="container text-center my-5">
        <div class="col-12 col-md-8 mx-auto">
            <div class="greeting">
                <h1 class="display-4 fw-bold">
                    <a href="/" class="text-dark text-decoration-none"> Unsepelesh. </a>
                </h1>
                <span class="text-muted">
                    A simple web application for me to refresh my knowledge about Guzzle HTTP.
                </span>
            </div>

            <div class="formBody my-5">
                <form action="" class="form-group" method="POST">
                    <input type="text" class="form-control text-center text-muted fs-1" name="keyword">
                    <div class="form-text">** Please insert any image keywords that you wanted. E.g Cats. Then click
                        Enter.</div>
                </form>
            </div>

            <div class="imageResults">
                <div class="row h-100">
                    <?php
                    if (!empty($data)) {
                        $result = json_decode($data, true);

                        foreach ($result['results'] as $photo) {
                            $imageUrl = $photo['urls']['regular'];
                            echo '<div class="col-3 p-1">';
                            echo '<img src="' . $imageUrl . '" alt="unsepelesh-image" class="unsepelesh-img-size rounded-3" loading="lazy">';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>