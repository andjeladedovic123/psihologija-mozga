<?php
include "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT id FROM users WHERE email='$email'");

    if ($check->num_rows > 0) {
        $error = "❌ Email već postoji!";
    } else {

        $conn->query("INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')");

        $success = "✅ Uspešna registracija! Idi na login.";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body class="auth-body">

<div class="auth-container">

    <h2>🆕 Registracija</h2>

    <?php if($error != "") echo "<p class='error'>$error</p>"; ?>
    <?php if($success != "") echo "<p class='success'>$success</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Korisničko ime" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Lozinka" required>

        <button type="submit">Registruj se</button>
    </form>

    <p>Već imaš nalog? <a href="login.php">Login</a></p>

</div>

</body>
</html>