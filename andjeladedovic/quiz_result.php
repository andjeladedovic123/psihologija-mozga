<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$score = $_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4'];

/* LOGIKA REZULTATA */
if ($score <= 1) {
    $text = "Mirni posmatrač realnosti 🧘";
} elseif ($score == 2 || $score == 3) {
    $text = "Intuitivan um 🧠";
} else {
    $text = "Visoko perceptivan mozak 🔥";
}

/* UPIS U BAZU */
$conn->query("
    INSERT INTO quiz_results (user_id, score, result_text)
    VALUES ($user_id, $score, '$text')
");
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Rezultat kviza</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>🧠 Psihološki kviz</h1>
</header>

<main class="result-wrapper">

    <div class="result-card">

        <h1>🎯 Rezultat kviza</h1>

        <div class="badge">
            <?php echo $text; ?>
        </div>

        <div class="score">
            Osvojeni poeni: <b><?php echo $score; ?>/4</b>
        </div>

        <p class="desc">
            Tvoj rezultat pokazuje način na koji tvoj mozak obrađuje informacije i percepciju sveta.
        </p>

        <div class="buttons">
            <a href="quiz.php" class="btn-primary">🔁 Ponovi kviz</a>
            <a href="dashboard.php" class="btn-secondary">📊 Dashboard</a>
            <a href="profil.php" class="btn-secondary">👤 Moj profil</a>
        </div>

    </div>

</main>

</body>
</html>

