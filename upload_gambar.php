<?php
// Proses upload gambar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.<br>";
        $uploadOk = 0;
    }

    if ($_FILES["gambar"]["size"] > 5000000) {
        echo "Maaf, file anda terlalu besar.<br>";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Maaf, file anda gagal diupload.<br>";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " berhasil diupload.<br>";
            // Redirect to gallery page after successful upload
            header("Location: galery.php");
            exit;
        } else {
            echo "Maaf, ada kesalahan saat mengupload file anda.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>

    <h2>Upload Gambar</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label>Pilih Gambar yang akan diupload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>
</html>
