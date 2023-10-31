<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    $url = "css/style.css";
    echo "<link rel='stylesheet' href='{$url}'>";
    ?>
    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script> const data = "<?php echo $List; ?>";</script>
</head>

<body>

    
    <label for="date">Bitte selektieren Sie ein Datum:</label>
    <input type="date" placeholder="Datum" id="date" />
    <button id="getData">Daten holen</button>

    <div id="result">
        <canvas id="myChart"></canvas>
    </div>

</body>

</html>