<?php
session_start(); // Mulai sesi

$username = $password = "";
$usernameErr = $passwordErr = "";
$loginErr = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["u"])) {
            throw new Exception("Masukkan username");
        } else {
            $username = bersihkan_input($_POST["u"]);
        }
        if (empty($_POST["p"])) {
            throw new Exception("Masukkan password");
        } else {
            $password = bersihkan_input($_POST["p"]);
        }

        // Validasi login
        if ($username === "user" && $password === "pass") { // Ganti ini dengan validasi yang sesuai dengan kebutuhan Anda
            $_SESSION['username'] = $username; // Simpan username dalam sesi
            header("Location: welcome.php");
            exit();
        } else {
            throw new Exception("Username atau password salah");
        }
    }
} catch (Exception $e) {
    $loginErr = $e->getMessage();
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
        Username: <input type="text" name="u" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <span class="error"><?php echo $loginErr; ?></span>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
