<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $conn->query("
        INSERT INTO messages (user_id, name, email, message)
        VALUES ('$user_id', '$name', '$email', '$message')
    ");

    $success = "✅ Poruka uspešno poslata!";
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Galerija i Kontakt</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>Psihološki fenomeni</h1>

    <nav>
        <ul class="meni">
            <li><a href="index.php">Početna</a></li>
            <li><a href="dejavu.php">Déjà Vu</a></li>
            <li><a href="mandela.php">Mandela Efekat</a></li>
            <li><a href="frekvencija.php">Iluzija učestalosti</a></li>
            <li><a href="jamaisvu.php">Jamais Vu</a></li>
            <li><a href="galerija.php">Galerija</a></li>
             <li><a href="quiz.php">Kviz</a></li>

            <li><a href="profil.php">Moj profil</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="container">

<!-- ================= GALERIJA ================= -->
<section class="sadrzaj">

    <h2>🖼 Galerija fenomena</h2>

    <div style="display:flex; flex-wrap:wrap; gap:15px;">

        <div class="galerija">
            <img src="dejavu.jfif">
            <div class="desc">Déjà Vu</div>
        </div>

        <div class="galerija">
            <img src="dusko.jpg">
            <div class="desc">Mandela efekat</div>
        </div>

        <div class="galerija">
            <img src="javu.jfif">
            <div class="desc">Jamais Vu</div>
        </div>

        <div class="galerija">
            <img src="frekvencija.jpg">
            <div class="desc">Iluzija učestalosti</div>
        </div>

    </div>

</section>

<!-- ================= KONTAKT FORMA ================= -->
<section class="sadrzaj">

    <h2>📩 Kontakt forma</h2>

    <?php if($success != "") echo "<p style='color:green;font-weight:bold;'>$success</p>"; ?>

    <form method="POST">

        <input type="text" name="name" placeholder="Vaše ime" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" placeholder="Vaša poruka..." required></textarea>

        <button type="submit">Pošalji</button>

    </form>

</section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>