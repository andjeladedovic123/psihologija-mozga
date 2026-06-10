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
    <title>Déjà Vu</title>
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
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="container">

    <!-- HERO SEKCIJA -->
    <section class="sadrzaj">

        <h2>🧠 Déjà Vu — osećaj koji vara mozak</h2>

        <p>
            Zamislite da ste u potpuno novoj situaciji, ali imate snažan osećaj da ste to već doživeli.
            Taj fenomen se zove <b>déjà vu</b>.
        </p>

    </section>

    <!-- DEFINICIJA -->
    <section class="sadrzaj">

        <h3>Šta je Déjà Vu?</h3>

        <p>
            Déjà vu je psihološki fenomen u kojem osoba ima utisak da je trenutna situacija već ranije doživljena,
            iako zna da to nije moguće.
        </p>

        <p>
            To je kratkotrajni “bag” u memoriji koji stvara osećaj poznatosti bez stvarnog sećanja.
        </p>

    </section>

    <!-- TEORIJE -->
    <section class="sadrzaj">

        <h3>Teorije objašnjenja</h3>

        <ul>
            <li>🧠 Mozak pogrešno klasifikuje novo iskustvo kao staro</li>
            <li>⚡ Kratki “prekid” u obradi memorije</li>
            <li>🔄 Podsvesno prepoznavanje sličnih obrazaca</li>
        </ul>

    </section>

    <!-- VIDEO -->
    <section class="sadrzaj">

        <h3>Video objašnjenje</h3>

        <video controls>
            <source src="dv.mp4" type="video/mp4">
            Vaš pregledač ne podržava video.
        </video>

    </section>

    <!-- ZAKLJUČAK -->
    <section class="sadrzaj">

        <h3>Zaključak</h3>

        <p>
            Déjà vu nam pokazuje koliko je ljudski mozak kompleksan.
            Iako traje samo nekoliko sekundi, ovaj fenomen i dalje nema potpuno objašnjenje.
        </p>

    </section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>