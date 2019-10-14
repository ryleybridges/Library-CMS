<?php require('templates/header.php'); ?>
<body>
    <?php require('templates/navigation.php'); ?>

    <div class="container">
        <?php require('templates/navscroller.php'); ?>
        <div class="alert alert-danger text-center">
          <h1 class="display-1">404!</h1>
          <p class="lead">Error something went wrong</p>
          <hr class="my-4">
          <p>It looks like the page you are requesting doesnt exist, please try something else.</p>
        </div>

    </div>

    <?php require('templates/footer.php'); ?>
</body>
</html>
