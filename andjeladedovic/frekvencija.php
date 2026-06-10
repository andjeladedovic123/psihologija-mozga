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
    <title>Iluzija učestalosti</title>
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
        <h2>👁 Iluzija učestalosti</h2>
        <p>
            Fenomen kada nam se čini da se nešto novo odjednom pojavljuje svuda oko nas.
        </p>
    </section>

    <!-- DEFINICIJA -->
    <section class="sadrzaj">

        <h3>Šta je iluzija učestalosti?</h3>

        <p>
            Iluzija učestalosti (poznata i kao Baader-Meinhof fenomen) nastaje kada primetimo neku novu informaciju,
            a zatim počnemo da je viđamo svuda oko sebe.
        </p>

        <p>
            U stvarnosti, ta informacija nije postala češća — već je naš mozak počeo da je više primećuje.
        </p>

    </section>

    <!-- MOZAK -->
    <section class="sadrzaj">

        <h3>Šta se dešava u mozgu?</h3>

        <p>
            Ovaj fenomen je povezan sa:
        </p>

        <ul>
            <li>🧠 Selektivnom pažnjom</li>
            <li>🔍 Pristrasnošću potvrđivanja</li>
            <li>⚡ Fokusom na nove informacije</li>
        </ul>

        <p>
            Mozak filtrira informacije i “pojačava” ono što mu je trenutno važno.
        </p>

    </section>

    <!-- PRIMER -->
    <section class="sadrzaj">

        <h3>Primer iz svakodnevnog života</h3>

        <p>
            Kada kupite novi telefon, počinjete da primećujete isti model svuda.
            Iako ga je bilo i ranije — vi ga sada jednostavno vidite.
        </p>

    </section>

    <!-- OBJAŠNJENJE -->
    <section class="sadrzaj">

        <h3>Zaključak</h3>

        <p>
            Iluzija učestalosti pokazuje da realnost i percepcija nisu isto.
            Naš mozak ne prikazuje svet objektivno, već filtrirano kroz pažnju i iskustvo.
        </p>

    </section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>