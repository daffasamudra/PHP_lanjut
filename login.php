<?php
$username = $password = "";
$usernameErr = $passwordErr = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["u"])) {
        $usernameErr = "Masukkan username";
    } else {
        $username = bersihkan_input($_POST["u"]);
    }
    if (empty($_POST["p"])) {
        $passwordErr = "Masukkan password";
    } else {
        $password = bersihkan_input($_POST["p"]);
    }

    if (!empty($username) && !empty($password)) {
        // Set cookie dengan username, cookie akan berlaku selama 30 detik
        setcookie("username", $username, time() + 30, "/");
        // Redirect ke halaman lain jika login berhasil
        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>

</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="u" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
