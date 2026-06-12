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
    <style>
        .question-card {
            margin-bottom: 1.2rem;
            padding: 1.2rem 1.5rem;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: border-color 0.3s;
        }
        .question-card.active  { border-color: #4a90d9; }
        .question-card.answered { border-color: #27ae60; opacity: 0.8; pointer-events: none; }
        .question-card.expired  { border-color: #e74c3c; opacity: 0.7; pointer-events: none; }

        .q-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.6rem;
        }
        .q-broj { font-size: 13px; color: #999; font-weight: 600; text-transform: uppercase; }

        .timer-box { display: flex; align-items: center; gap: 8px; }
        .timer-ring { width: 38px; height: 38px; }
        .timer-ring circle { fill: none; stroke-width: 3.5; }
        .timer-ring .bg { stroke: #eee; }
        .timer-ring .fg {
            stroke-dasharray: 88;
            stroke-dashoffset: 0;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            transition: stroke-dashoffset 1s linear, stroke 0.4s;
        }
        .timer-num { font-size: 13px; font-weight: 700; min-width: 28px; }
        .timer-num.ok     { color: #27ae60; }
        .timer-num.warn   { color: #e67e22; }
        .timer-num.danger { color: #e74c3c; }

        .q-text { font-size: 16px; margin: 0.4rem 0 0.8rem; }

        .q-opcije { display: flex; gap: 10px; }
        .opt-btn {
            flex: 1;
            padding: 9px 14px;
            background: #f5f5f5;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.15s;
        }
        .opt-btn:hover { background: #e8e8e8; }
        .opt-btn.selected { background: #d6eaff; border-color: #4a90d9; color: #1a5fa8; font-weight: 600; }

        .isteklo-poruka { font-size: 13px; color: #e74c3c; margin-top: 8px; font-style: italic; }

        .progress-label { font-size: 13px; color: #888; margin-bottom: 4px; }
        .progress-track { background: #eee; border-radius: 4px; height: 6px; margin-bottom: 1.4rem; overflow: hidden; }
        .progress-fill  { height: 100%; background: #27ae60; border-radius: 4px; width: 0%; transition: width 0.3s; }
    </style>
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
<form method="POST" action="quiz_result.php" class="sadrzaj" id="quiz-form">

    <h2>Test: Kako tvoj mozak funkcioniše?</h2>
    <p style="color:#666; margin-bottom:1rem;">Svako pitanje ima <strong>15 sekundi</strong>. Ako ne odgovoriš na vreme, računa se kao netačno.</p>

    <!-- Skrivena polja — popunjava ih JavaScript -->
    <input type="hidden" name="q1" id="val-q1" value="0">
    <input type="hidden" name="q2" id="val-q2" value="0">
    <input type="hidden" name="q3" id="val-q3" value="0">
    <input type="hidden" name="q4" id="val-q4" value="0">

    <div class="progress-label" id="progress-label">0 / 4 odgovoreno</div>
    <div class="progress-track"><div class="progress-fill" id="progress-fill"></div></div>

    <!-- Pitanje 1 -->
    <div class="question-card active" id="card-q1">
        <div class="q-header">
            <span class="q-broj">Pitanje 1</span>
            <div class="timer-box">
                <svg class="timer-ring" viewBox="0 0 36 36">
                    <circle class="bg" cx="18" cy="18" r="14"/>
                    <circle class="fg" cx="18" cy="18" r="14" id="arc-q1" style="stroke:#27ae60"/>
                </svg>
                <span class="timer-num ok" id="num-q1">15s</span>
            </div>
        </div>
        <p class="q-text">1. Da li ti se često dešava déjà vu?</p>
        <div class="q-opcije">
            <button type="button" class="opt-btn" onclick="answer('q1','1',this)">Da</button>
            <button type="button" class="opt-btn" onclick="answer('q1','0',this)">Ne</button>
        </div>
    </div>

    <!-- Pitanje 2 -->
    <div class="question-card" id="card-q2">
        <div class="q-header">
            <span class="q-broj">Pitanje 2</span>
            <div class="timer-box">
                <svg class="timer-ring" viewBox="0 0 36 36">
                    <circle class="bg" cx="18" cy="18" r="14"/>
                    <circle class="fg" cx="18" cy="18" r="14" id="arc-q2" style="stroke:#27ae60"/>
                </svg>
                <span class="timer-num ok" id="num-q2">15s</span>
            </div>
        </div>
        <p class="q-text">2. Da li primećuješ stvari koje drugi ne primete?</p>
        <div class="q-opcije">
            <button type="button" class="opt-btn" onclick="answer('q2','1',this)">Da</button>
            <button type="button" class="opt-btn" onclick="answer('q2','0',this)">Ne</button>
        </div>
    </div>

    <!-- Pitanje 3 -->
    <div class="question-card" id="card-q3">
        <div class="q-header">
            <span class="q-broj">Pitanje 3</span>
            <div class="timer-box">
                <svg class="timer-ring" viewBox="0 0 36 36">
                    <circle class="bg" cx="18" cy="18" r="14"/>
                    <circle class="fg" cx="18" cy="18" r="14" id="arc-q3" style="stroke:#27ae60"/>
                </svg>
                <span class="timer-num ok" id="num-q3">15s</span>
            </div>
        </div>
        <p class="q-text">3. Da li lako pamtiš detalje?</p>
        <div class="q-opcije">
            <button type="button" class="opt-btn" onclick="answer('q3','1',this)">Da</button>
            <button type="button" class="opt-btn" onclick="answer('q3','0',this)">Ne</button>
        </div>
    </div>

    <!-- Pitanje 4 -->
    <div class="question-card" id="card-q4">
        <div class="q-header">
            <span class="q-broj">Pitanje 4</span>
            <div class="timer-box">
                <svg class="timer-ring" viewBox="0 0 36 36">
                    <circle class="bg" cx="18" cy="18" r="14"/>
                    <circle class="fg" cx="18" cy="18" r="14" id="arc-q4" style="stroke:#27ae60"/>
                </svg>
                <span class="timer-num ok" id="num-q4">15s</span>
            </div>
        </div>
        <p class="q-text">4. Da li ti se dešava da nešto izgleda "čudno poznato"?</p>
        <div class="q-opcije">
            <button type="button" class="opt-btn" onclick="answer('q4','1',this)">Da</button>
            <button type="button" class="opt-btn" onclick="answer('q4','0',this)">Ne</button>
        </div>
    </div>

    <br>
    <button type="submit" id="submit-btn" disabled>Pogledaj rezultat</button>

</form>
</main>

<script>
const questions = ['q1','q2','q3','q4'];
const TIME = 15;
const timers = {};
const answered = {};

startTimer('q1');

function startTimer(qid) {
    let remaining = TIME;
    const arc = document.getElementById('arc-' + qid);
    const num = document.getElementById('num-' + qid);
    const circumference = 88;

    timers[qid] = setInterval(function() {
        remaining--;
        arc.style.strokeDashoffset = circumference * (1 - remaining / TIME);
        num.textContent = remaining + 's';

        const pct = remaining / TIME;
        if (pct > 0.5) {
            arc.style.stroke = '#27ae60';
            num.className = 'timer-num ok';
        } else if (pct > 0.25) {
            arc.style.stroke = '#e67e22';
            num.className = 'timer-num warn';
        } else {
            arc.style.stroke = '#e74c3c';
            num.className = 'timer-num danger';
        }

        if (remaining <= 0) {
            clearInterval(timers[qid]);
            expireQuestion(qid);
        }
    }, 1000);
}

function answer(qid, val, btn) {
    if (answered[qid]) return;
    clearInterval(timers[qid]);
    answered[qid] = true;

    document.getElementById('val-' + qid).value = val;

    const card = document.getElementById('card-' + qid);
    card.classList.remove('active');
    card.classList.add('answered');
    card.querySelectorAll('.opt-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');

    updateProgress();
    activateNext(qid);
}

function expireQuestion(qid) {
    if (answered[qid]) return;
    answered[qid] = true;
    document.getElementById('val-' + qid).value = '0';

    const card = document.getElementById('card-' + qid);
    card.classList.remove('active');
    card.classList.add('expired');
    card.querySelector('.q-opcije').innerHTML = '<span style="color:#e74c3c;font-size:14px;">⏱ Vreme isteklo</span>';

    const msg = document.createElement('p');
    msg.className = 'isteklo-poruka';
    msg.textContent = 'Nisi odgovorio/la na vreme — računa se kao netačno.';
    card.appendChild(msg);

    updateProgress();
    activateNext(qid);
}

function activateNext(qid) {
    const idx = questions.indexOf(qid);
    if (idx + 1 < questions.length) {
        const nextId = questions[idx + 1];
        document.getElementById('card-' + nextId).classList.add('active');
        startTimer(nextId);
    }
    if (Object.keys(answered).length === questions.length) {
        document.getElementById('submit-btn').disabled = false;
    }
}

function updateProgress() {
    const done = Object.keys(answered).length;
    document.getElementById('progress-fill').style.width = (done / questions.length * 100) + '%';
    document.getElementById('progress-label').textContent = done + ' / ' + questions.length + ' odgovoreno';
}
</script>

</body>
</html>
