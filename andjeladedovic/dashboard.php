<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* USER */
$user = $conn->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();

/* STATS - poruke */
$msg_count = $conn->query("SELECT COUNT(*) as c FROM messages WHERE user_id=$user_id")
->fetch_assoc()['c'];

/* STATS - kviz */
$quiz_count = $conn->query("SELECT COUNT(*) as c FROM quiz_results WHERE user_id=$user_id")
->fetch_assoc()['c'];

$last_quiz = $conn->query("
    SELECT * FROM quiz_results 
    WHERE user_id=$user_id 
    ORDER BY created_at DESC 
    LIMIT 1
")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>🧠 Psihološki Dashboard</h1>

    <nav>
        <ul class="meni">
            <li><a href="index.php">Početna</a></li>
            <li><a href="dejavu.php">Déjà Vu</a></li>
            <li><a href="mandela.php">Mandela</a></li>
            <li><a href="frekvencija.php">Iluzija učestalosti</a></li>
            <li><a href="jamaisvu.php">Jamais Vu</a></li>
            <li><a href="quiz.php">Kviz</a></li>

            <li><a href="profil.php">Moj profil</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="container">

<!-- WELCOME -->
<section class="sadrzaj">

    <h2>👋 Dobrodošao, <?php echo $user['username']; ?></h2>

    <p>
        Ovo je tvoj psihološki centar gde pratiš svoje kvizove, poruke i aktivnosti.
    </p>

</section>

<!-- STATS -->
<section class="sadrzaj" style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="flex:1; background:white; padding:20px; border-radius:12px;">
        <h3>📩 Poruke</h3>
        <h2><?php echo $msg_count; ?></h2>
    </div>

    <div style="flex:1; background:white; padding:20px; border-radius:12px;">
        <h3>🧠 Kvizovi</h3>
        <h2><?php echo $quiz_count; ?></h2>
    </div>

    <div style="flex:1; background:white; padding:20px; border-radius:12px;">
        <h3>🎯 Poslednji rezultat</h3>

        <?php if($last_quiz){ ?>
            <p><?php echo $last_quiz['result_text']; ?></p>
            <small><?php echo $last_quiz['score']; ?>/4</small>
        <?php } else { ?>
            <p>Nema podataka</p>
        <?php } ?>

    </div>

</section>

<!-- QUICK ACTIONS -->
<section class="sadrzaj">

    <h2>⚡ Brze akcije</h2>

    <a href="quiz.php"><button>🧠 Uradi kviz</button></a>
    <a href="galerija.php"><button>🖼 Galerija</button></a>
    <a href="profil.php"><button>👤 Moj profil</button></a>

</section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>