<?php require('../templates/header.php'); ?>
<body>
    <?php require('../templates/navigation.php'); ?>

    <div class="container">
        <?php require('../templates/navscroller.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1>All Movies</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="movies/addMovie.php">Add new Movie</a>
            </div>
        </div>

    </div>

    <?php require('../templates/footer.php'); ?>
</body>
</html>
