<?php
    require('../templates/header.php');

    $sql = "SELECT `_id`, `title` FROM `movies` WHERE 1";
    $result = mysqli_query($dbc, $sql);
    if ($result) {
        $allMovies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        die('Something went wrong with getting all of our movies');
    }
?>
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
                <a class="btn btn-outline-primary" href="movies/addMovies.php">Add new Movie</a>
            </div>
        </div>

        <div class="row d-flex">
            <?php if($allMovies): ?>
                <?php foreach($allMovies as $singleMovie): ?>
                    <div class="col-12 col-md-3">
                        <div class="card mb-4 shadow-sm h-100">
                            <img class="card-img-top" src="images/IronMan1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?php echo $singleMovie['title']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="books/singleMovie.php?id=<?php echo $singleMovie['_id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="books/editMovie.php?id=<?php echo $singleMovie['_id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>Sorry, there aren't any movies in the library right now.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
    <?php require('../templates/footer.php'); ?>
</body>
</html>
