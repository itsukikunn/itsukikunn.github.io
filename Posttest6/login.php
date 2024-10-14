<?php
session_start();

$server ='localhost:3307';
$user = 'root';
$password = '';
$db_name = 'dbuser';

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die('Gagal terhubung ke database: ' . mysqli_connect_error());
}

if (isset($_POST['signup'])) {
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM user WHERE email = '$email' AND username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            $_SESSION['username'] = $username;
            header("Location: user.php");
            exit;
        } else {
            echo "<script>alert('Login gagal! Password salah.');</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Login gagal! Username atau email tidak ditemukan.');</script>";
        echo "<script>window.location.href='login.php';</script>";
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
    </div>
</body>
</html>
