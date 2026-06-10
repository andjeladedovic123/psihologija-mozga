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
    <title>Mandela Efekat</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>Psihološki fenomeni</h1>

    <nav>
        <ul class="meni">
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
        <h2>🧠 Mandela efekat</h2>
        <p>
            Fenomen u kojem veliki broj ljudi deli isto pogrešno sećanje na neki događaj ili informaciju.
        </p>
    </section>

    <!-- UVOD -->
    <section class="sadrzaj">
        <h3>Šta je Mandela efekat?</h3>

        <p>
            Mandela efekat opisuje situaciju kada grupa ljudi ima isto lažno sećanje na neki događaj koji se nikada nije desio.
            Ime je dobio po Nelsonu Mandeli, jer su mnogi verovali da je umro u zatvoru 1980-ih, iako je preminuo 2013. godine.
        </p>

        <p>
            Ovaj fenomen pokazuje da ljudsko pamćenje nije savršeno — već se stalno menja i “rekonstruiše”.
        </p>
    </section>

    <!-- TEORIJA -->
    <section class="sadrzaj">
        <h3>Zašto nastaje?</h3>

        <ul>
            <li>🧠 Mozak popunjava praznine u sećanju</li>
            <li>👥 Društveni uticaj i “kolektivno uverenje”</li>
            <li>📺 Pogrešne informacije koje se ponavljaju</li>
            <li>🔄 Mešanje stvarnih i izmišljenih sećanja</li>
        </ul>
    </section>

    <!-- PRIMERI -->
    <section class="sadrzaj">
        <h3>Primeri Mandela efekta</h3>

        <p>
            Jedan od poznatih primera je logo “Monopoly Man” za kojeg mnogi veruju da ima monokl — iako ga nikada nije imao.
        </p>

        <p>
            Takođe, mnogi pogrešno pamte nazive filmova, brendova i citata.
        </p>
    </section>

    <!-- GALERIJA -->
    <section class="sadrzaj">

        <h3>Vizuelni primeri</h3>

        <div style="display:flex; gap:20px; flex-wrap:wrap;">
            <img src="m2.jfif" alt="Mandela efekat" style="width:45%; border-radius:12px;">
            <img src="monopol.jpg" alt="Monopoly efekat" style="width:45%; border-radius:12px;">
        </div>

    </section>

    <!-- ZAKLJUČAK -->
    <section class="sadrzaj">
        <h3>Zaključak</h3>

        <p>
            Mandela efekat pokazuje koliko je ljudsko pamćenje podložno greškama.
            Naša sećanja nisu video-snimci, već “priče” koje mozak stalno menja i prilagođava.
        </p>
    </section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>