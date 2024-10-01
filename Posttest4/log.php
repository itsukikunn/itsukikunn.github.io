<?php
$user = "user";
$gmail = "user123@gmail.com";
$pass = "123";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($username === $user && $gmail === $email && $password === $pass) {
    header("Location: user.php?username=" . ($username));
exit;
} else {
    echo "<script>alert('Login gagal! Username, email, atau password salah.'); </script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>