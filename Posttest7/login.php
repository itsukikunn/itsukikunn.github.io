<?php
session_start();
require "koneksi.php";

if (isset($_POST['signup'])) {
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM user WHERE email = '$email' AND username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;

            echo "<script>
                    alert('Login berhasil! Selamat datang $username');
                    document.location.href = 'user.php';
                </script>";
        } else {
            echo "<script>
                    alert('Password salah!');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Username atau email tidak ditemukan! Silakan registrasi terlebih dahulu.');
                document.location.href = 'registrasi.php';
              </script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Login</title>
    <link rel="stylesheet" href="styles/log.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit" name="signup">Login</button>
            </div>
        </form>
        <p style="text-align: center;">Belum punya akun? Registrasi di<a href="signup.php" style="color: blue;"> sini!</a></p>
    </div>
</body>
</html>
