<?php
require 'koneksi.php';

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = "SELECT * FROM user WHERE email='$email'";
    $cekhasil = mysqli_query($conn, $cek);

    if (mysqli_num_rows($cekhasil) > 0) {
        echo "
        <script>
        alert('email sudah digunakan! Silakan coba yang lain.');
        window.location.href = 'signup.php';
        </script>";
    } else {

        $query = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password')";
        $result = mysqli_query($conn, $query);

    if ($result) {
            echo "
            <script>
            alert('SignIn Berhasil!');
            window.location.href = 'index.php';
            </script>";
    } else {
            echo "
            <script>
            alert('SignIn Gagal, Silahkan Coba Lagi: " . mysqli_error($conn) . "');
            window.location.href = 'index.php';
            </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Sign Up</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
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
                <button type="submit" name="signup">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>