<?php
require('../templates/header.php');

if($_POST){
    extract($_POST);

    $errors = array();

    if(empty($title)){
        array_push($errors, 'The title is empty, please enter a title');
    }else if(strlen($title) < 5){
        array_push($errors, 'The title length must be at least 5 characters');
    }else if(strlen($title) > 100){
        array_push($errors, 'The title length must be no more than 100 characters');
    }

    if(empty($director)){
        array_push($errors, 'The director is empty, please enter a director');
    }else if(strlen($director) < 5){
        array_push($errors, 'The director length must be at least 5 characters');
    }else if(strlen($director) > 30){
        array_push($errors, 'The director length must be no more than 30 characters');
    }

    if(empty($genre)){
        array_push($errors, 'The genre is empty, please enter a genre');
    }else if(strlen($genre) < 2){
        array_push($errors, 'The genre length must be at least 2 characters');
    }else if(strlen($genre) > 30){
        array_push($errors, 'The genre length must be no more than 30 characters');
    }

    if(empty($year)){
        array_push($errors, 'The release year is empty, please enter a year');
    }else if(strlen($year) > 4){
        array_push($errors, 'The year length must be no more than 4 characters');
    }

    if(empty($runtime)){
        array_push($errors, 'The runtime length is empty, please enter the film\'s runtime');
    }else if(strlen($runtime) > 3){
        array_push($errors, 'The runtime length is too long - please limit it to three numbers');
    }else if($runtime < 60){
        array_push($errors, 'Runtime length is too short for a full length film - please enter a longer runtime or a different film');
    }

    if(empty($description)){
        // var_dump('description is empty');
        array_push($errors, 'The description is empty, please enter a value');
    }else if(strlen($description) < 10){
        // var_dump('the length must be at least 5');
        array_push($errors, 'The title length must be at least ten characters');
    }else if(strlen($description) > 65535){
        // var_dump('the length must be under 65,535');
        array_push($errors, 'The title length must be no more than 65,535 characters');
    }

    if(empty($errors)){
        $safeTitle = mysqli_real_escape_string($dbc, $title);
        $safeDirector = mysqli_real_escape_string($dbc, $director);
        $safeGenre = mysqli_real_escape_string($dbc, $genre);
        $safeYear = mysqli_real_escape_string($dbc, $year);
        $safeRuntime = mysqli_real_escape_string($dbc, $runtime);
        $safeDescription = mysqli_real_escape_string($dbc, $description);

        // $sql = "INSERT INTO `directors`(`name`) VALUES ('$safeDirector')";
        // $result = mysqli_query($dbc, $sql);
        // if($result && mysqli_affected_rows($dbc) > 0){
        //     var_dump('director was added');
        // } else {
        //     die('Something went wrong with adding in a director');
        // }

        $directorID = 1;
        $moviesSql ="INSERT INTO `movies`(`title`, `genre`, `year`, `runtime`, `description`, `director_id`) VALUES ('$safeTitle','$safeGenre',$safeYear,$safeRuntime,'$safeDescription',$authorID)";
        // die($booksSql);
        $moviesResult = mysqli_query($dbc, $moviesSql);
        if($moviesResult && mysqli_affected_rows($dbc) > 0){
            header('Location:singleMovie.php');
        } else {
            die('Something went wrong with adding in a movie');
        }
    }
}
?>
<body>
    <?php require('../templates/navigation.php'); ?>

    <div class="container">
        <?php require('../templates/navscroller.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1>Add New Movie</h1>
            </div>
        </div>

        <?php if($_POST && !empty($errors)): ?>
            <div class="row mb-2">
                <div class="col">
                    <div class="alert alert-danger pb-0" role="alert">
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mb-2">
            <div class="col">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                      <label for="title">Movie Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="Enter movie title" value="<?php if($_POST){ echo $title; }; ?>">
                    </div>

                    <div class="form-group director-group">
                      <label for="director">Director</label>
                      <input type="text" autocomplete="off" class="form-control"  name="director" placeholder="Enter movies director" value="<?php if($_POST){ echo $director; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="genre">Genre</label>
                      <input type="text" autocomplete="off" class="form-control"  name="genre" placeholder="Enter movies genre" value="<?php if($_POST){ echo $genre; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="text" autocomplete="off" class="form-control"  name="year" placeholder="Enter movies release year" max="<?php echo date('Y'); ?>" value="<?php if($_POST){ echo $year; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="runtime">Runtime</label>
                      <input type="number" autocomplete="off" class="form-control"  name="runtime" placeholder="Enter movies runtime" value="<?php if($_POST){ echo $runtime; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="description">Movie Description</label>
                      <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description about the movie"><?php if($_POST){ echo $description; }; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload an Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
                </form>
            </div>
        </div>

    </div>

    <?php require('../templates/footer.php'); ?>
</body>
</html>
