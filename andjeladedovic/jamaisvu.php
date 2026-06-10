<?php
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Jamais Vu</title>
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

    <!-- HERO -->
    <section class="sadrzaj">
        <h2>🧠 Jamais Vu</h2>
        <p>
            Fenomen kada poznata stvar odjednom deluje potpuno nepoznato.
        </p>
    </section>

    <!-- DEFINICIJA -->
    <section class="sadrzaj">

        <h3>Šta je Jamais Vu?</h3>

        <p>
            Jamais vu je suprotan déjà vu-u — umesto da nešto novo deluje poznato,
            ovde nešto poznato odjednom deluje strano i nepoznato.
        </p>

        <p>
            Na primer, kada ponavljate istu reč više puta, ona može početi da izgleda besmisleno.
        </p>

    </section>

    <!-- UZROCI -->
    <section class="sadrzaj">

        <h3>Zašto se javlja?</h3>

        <p>
            Smatra se da nastaje zbog privremenog “zamora” mozga i sistema za prepoznavanje.
        </p>

        <ul>
            <li>🧠 Mentalni umor</li>
            <li>🔁 Preterano ponavljanje stimulusa</li>
            <li>⚡ Privremeni “prekid” u prepoznavanju</li>
            <li>🧩 Neurološke reakcije mozga</li>
        </ul>

        <p>
            Mozak na trenutak gubi osećaj poznatosti i tretira poznato kao novo.
        </p>

    </section>

    <!-- EKSPERIMENT -->
    <section class="sadrzaj">

        <h3>Eksperimenti</h3>

        <p>
            U istraživanjima, ljudi koji ponavljaju istu reč desetine puta često prijavljuju da ona gubi značenje.
        </p>

        <p>
            To pokazuje koliko je percepcija fleksibilna i podložna promenama.
        </p>

    </section>

    <!-- ZAKLJUČAK -->
    <section class="sadrzaj">

        <h3>Zaključak</h3>

        <p>
            Jamais vu nam pokazuje da čak i najpoznatije stvari mogu postati strane —
            zavisno od stanja našeg mozga i pažnje.
        </p>

    </section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>