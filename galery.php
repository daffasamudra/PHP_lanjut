<?php
// Menampilkan galeri gambar
$dir = 'gambar/';
$fileList = glob($dir . '*');

echo '<h1>Galeri Gambar</h1>';
echo '<div style="display: flex; flex-wrap: wrap;">';

foreach ($fileList as $filename) {
    if (is_file($filename)) {
        echo '<div style="margin: 10px;">';
        echo '<img src="' . $filename . '" alt="' . basename($filename) . '" style="width: 150px; height: auto;">';
        echo '</div>';
    }
}

echo '</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gambar</title>
</head>
<body>
</body>
</html>
