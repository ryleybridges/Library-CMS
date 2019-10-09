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
                <a class="btn btn-outline-primary" href="movies/addMovies.php">Add new Movie</a>
            </div>
        </div>

        <div class="row d-flex">
            <div class="col-12 col-md-3">
                 <div class="card mb-4 shadow-sm h-100">
                     <img class="card-img-top" src="images/IronMan1.jpg" alt="Card image cap">
                     <div class="card-body">
                         <p class="card-text">Iron Man</p>
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="btn-group">
                                 <a href="movies/singleMovie.php" class="btn btn-sm btn-outline-info">View</a>
                                 <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </div>
    </div>

    <?php require('../templates/footer.php'); ?>
</body>
</html>
