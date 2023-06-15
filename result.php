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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>