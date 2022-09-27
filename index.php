<?php
session_start();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'Homepage';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuildYourPC</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<header>
    <div class="banner">
        <?php include 'includes/navbar.inc.php'; ?>
        <?php include 'includes/' . $page . '.inc.php'; ?>
    </div>
</header>
</body>
</html>