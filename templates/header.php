<?php
    if(is_dir('vendor')){
        require 'vendor/autoload.php';
    } else {
        require '../vendor/autoload.php';
    }

    // echo __DIR__ . '/..';
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
    $dotenv->load();

    require('connection.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <base href="<?php echo getenv('PROJECT_URL'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Yoobee School of Design Library</title>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
