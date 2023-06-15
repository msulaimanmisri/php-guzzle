<?php
require 'request.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Cari Gambo - A simple web application for image searches</title>
</head>

<body class="bg-light">

    <?php require 'nav.php'; ?>

    <div class="container text-center my-5">
        <div class="col-12 col-md-8 mx-auto">
            <div class="greeting">
                <h1 class="display-4 fw-bold">
                    <a href="/" class="text-dark text-decoration-none"> Cari Gambo. </a>
                </h1>
                <span class="text-muted">
                    A simple web application for you to search almost any free royalty images
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
                    if (!empty($error)) {
                        echo '<div class="container">';
                        echo '<div class="alert alert-danger"><span>' . $error . '</span></div>';
                        echo '</div>';
                    } elseif (!empty($data)) {
                        $result = json_decode($data, true);

                        foreach ($result['results'] as $photo) {
                            $imageUrl = $photo['urls']['regular'];
                            echo '<div class="col-12 col-md-3 p-1">';
                            echo '<img src="' . $imageUrl . '" alt="unsepelesh-image" class="unsepelesh-img-size rounded-3" loading="lazy">';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>