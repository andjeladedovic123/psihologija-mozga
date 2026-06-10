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
    <title>Psihološki kviz</title>
    <link rel="stylesheet" href="1.0.css">
</head>

<body>

<header>
    <h1>🧠 Psihološki kviz</h1>
    

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

<form method="POST" action="quiz_result.php" class="sadrzaj">

    <h2>Test: Kako tvoj mozak funkcioniše?</h2>

    <p>1. Da li ti se često dešava déjà vu?</p>
    <select name="q1">
        <option value="1">Da</option>
        <option value="0">Ne</option>
    </select>

    <p>2. Da li primećuješ stvari koje drugi ne primete?</p>
    <select name="q2">
        <option value="1">Da</option>
        <option value="0">Ne</option>
    </select>

    <p>3. Da li lako pamtiš detalje?</p>
    <select name="q3">
        <option value="1">Da</option>
        <option value="0">Ne</option>
    </select>

    <p>4. Da li ti se dešava da nešto izgleda “čudno poznato”?</p>
    <select name="q4">
        <option value="1">Da</option>
        <option value="0">Ne</option>
    </select>

    <br><br>
    <button type="submit">Pogledaj rezultat</button>

</form>

</main>

</body>
</html>