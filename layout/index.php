<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Boxes list</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class='wrapper'>
        <div class='row'>
            <?php array_map(
                            function ($option) {return include "layout/box.php";},
                            include 'options.php'
              );?>
        </div>
    </div>
    <?php include "layout/modal.php"?>
    <script src="assets/js/component.js"></script>
</body>

</html>