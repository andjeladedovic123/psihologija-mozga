<?php
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

          header("Location: dashboard.php");
exit;

        } else {
            $error = "❌ Pogrešna lozinka!";
        }

    } else {
        $error = "❌ Korisnik ne postoji!";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body class="auth-body">

<div class="auth-container">

    <h2>🔐 Login</h2>

    <?php if($error != "") echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Lozinka" required>

        <a href="index.php"><button type="submit">Uloguj se</button></a>
    </form>

    <p>Nemate nalog? <a href="register.php">Registrujte se</a></p>

</div>

</body>
</html>