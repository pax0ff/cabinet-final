<?php
require_once("utils/Database/Database.php");
require_once("utils/Session.php");



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centrul Medical Brancusi | CRM</title>
    <link rel="stylesheet" href="utils/general.css">
    <link href="utils/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="utils/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="utils/bootstrap/css/bootstrap-utilities.css" rel="stylesheet">

</head>
<body>
<?php require_once("header.php"); ?>
    <div class="container-fluid image_fixed">
        <div class="text-center justify-content-center col-lg-12 col-md-12 col-sm-12">
            <?php

            if(isset($_GET['logout'])) {
                $logout = $_GET['logout'];
                if($logout==1) {
                    echo '<p>V-ati deconectat cu succes! Puteti accesa din nou platforma <a href="login" class="text-danger">AICI</a></p>';
                }
            }

            ?>
        </div>
    </div>




    <?php require_once("footer.php"); ?>
</body>

</html>
