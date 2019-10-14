<?php
    require('../templates/header.php');
    $movieID = $_GET['id'];
    $sql = "SELECT movies.`_id` as moviesID, `title`, `genre`, `year`, `runtime`, `description`, directors.`name` as director_name FROM `movies` INNER JOIN movies ON movies.director_id = directors._id WHERE movies._id = $moviesID";
    $result = mysqli_query($dbc, $sql);
    if($result && mysqli_affected_rows($dbc) > 0){
        $singleMovie = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else if($result && mysqli_affected_rows($dbc) === 0){
        header('Location: ../errors/404.php');
    } else {
        die('Something went wrong with getting a single movie');
    }
 ?>
<body>
    <?php require('../templates/navigation.php'); ?>

    <div class="container">
        <?php require('../templates/navscroller.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1><?php echo $singleMovie['title']; ?></h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="">Edit</a>
                <button class="btn btn-outline-danger" type="button" name="button" data-toggle="modal" data-target="#confirmModal">Delete</button>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-sm-4 align-self-center">
                <img class="img-fluid" src="images/IronMan1.jpg" alt="">
            </div>
            <div class="col-12 col-sm-8 align-self-center">
                <h3><?php echo $singleMovie['title']; ?></h3>
                <h4><?php echo $singleMovie['year']; ?></h4>
                <h5><?php echo $singleMovie['director_id']; ?></h5>
                <h5><?php echo $singleMovie['runtime'] ?> minutes</h5>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <p><?php echo $singleMovie['description']; ?></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?php echo $singleMovie['title']; ?>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php require('../templates/footer.php'); ?>
</body>
</html>
