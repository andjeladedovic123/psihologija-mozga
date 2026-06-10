<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* UZMI PODATKE KORISNIKA */
$user = $conn->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();

/* UZMI PORUKE KORISNIKA */
$messages = $conn->query("
    SELECT * FROM messages 
    WHERE user_id=$user_id 
    ORDER BY created_at DESC
");
$quiz = $conn->query("
    SELECT * FROM quiz_results 
    WHERE user_id=$user_id 
    ORDER BY created_at DESC
");
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Moj profil</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>Moj profil</h1>

    <nav>
        <ul class="meni">
            <li><a href="index.php">Početna</a></li>
            <li><a href="dejavu.php">Déjà Vu</a></li>
            <li><a href="mandela.php">Mandela</a></li>
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

    <!-- PROFIL INFO -->
    <section class="sadrzaj">

        <h2>👤 Korisnik: <?php echo $user['username']; ?></h2>
        <p>Email: <?php echo $user['email']; ?></p>

        <?php
        $count = $messages->num_rows;
        echo "<p>📩 Broj poslatih poruka: <b>$count</b></p>";
        ?>

    </section>

    <!-- ISTORIJA PORUKA -->
    <section class="sadrzaj">

        <h2>🧾 Moje poruke</h2>

        <?php while($row = $messages->fetch_assoc()) { ?>

            <div style="background:white; padding:15px; margin:10px 0; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">

                <p><b>Poruka:</b> <?php echo $row['message']; ?></p>
                <small>📅 <?php echo $row['created_at']; ?></small>

            </div>

        <?php } ?>

    </section>
    <section class="sadrzaj">
        <section class="sadrzaj">

    <h2>🧠 Istorija kvizova</h2>

    <?php while($q = $quiz->fetch_assoc()) { ?>

        <div style="background:white;padding:15px;margin:10px 0;border-radius:10px;">
            <p><b>Rezultat:</b> <?php echo $q['result_text']; ?></p>
            <p><b>Score:</b> <?php echo $q['score']; ?>/4</p>
            <small><?php echo $q['created_at']; ?></small>
        </div>

    <?php } ?>

</section>
    </section>
    <button onclick="toggleStats()">📊 Prikaži statistiku</button>

<div id="stats" style="display:none;">
    <p>Analiza aktivnosti korisnika...</p>
</div>

<script>
function toggleStats(){
    let el = document.getElementById("stats");
    if(el.style.display === "none"){
        el.style.display = "block";
    } else {
        el.style.display = "none";
    }
}
</script>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>