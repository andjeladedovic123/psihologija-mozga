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
    <title>Psihološki Fenomeni</title>
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

    <section class="uvod">
        <h2>Zašto se ljudi ponašaju na određene načine?</h2>

        <p>
            Psiholozi ovo pitanje proučavaju već decenijama. 
            Veliki deo onoga što danas znamo o ljudskom umu dolazi iz eksperimenata
            kao što su Ašov konformizam i Zimbardov zatvorski eksperiment.
        </p>

        <p>
            Ove studije pomažu da razumemo ljudsko ponašanje u društvu.
        </p>
    </section>

    <section class="sadrzaj">
        <h2>Šta su psihološki fenomeni?</h2>

        <p>
            Psihološki fenomeni su obrasci mišljenja, ponašanja i percepcije
            koji nastaju kroz interakciju mozga i okruženja.
        </p>

        <p>
            Svi ih doživljavamo, ali ne znamo uvek kako se zovu.
        </p>

        <img src="prva.jpg" alt="Psihologija" class="slika">
    </section>

</main>

<footer>
    <p>&copy; 2025 Psihološki Fenomeni</p>
</footer>

</body>
</html>