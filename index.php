<?php
require __DIR__.'/bootstrap.php'; //kodas bendras visiems
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <h1>Hello page</h1>
    <a href="<?= URL ?>login.php">Login</a>
    <a href="<?= URL ?>private.php">Private</a>
</body>
</html>

<!-- constanta nuskaityti bet negalima keisti, ji superglobali ir patenka i funkcijas
jeigu const define kode, ytai ji matosi vusur -->