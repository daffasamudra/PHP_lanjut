<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
    if (isset($_COOKIE["username"])) {
        echo "<h1>Selamat datang, " . htmlspecialchars($_COOKIE["username"]) . "!</h1>";
    } else {
        echo "<h1>Selamat datang, Tamu!</h1>";
    }
    ?>
</body>
</html>
