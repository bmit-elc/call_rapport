<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        	$url = "styles.css";
        	echo "<link rel='stylesheet' href='{$url}'>";
        ?>
    <script src="jsdatei.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     
</head>
<body>
  
<?php
    $CallAccountingList = simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");
    foreach ($CallAccountingList->CallAccounting as $CallAccounting){
        if($CallAccounting->Time == '14:32:00'){
            echo $CallAccounting->CallDuration;

        }    
    }
    ?>
    
    
    <br>
    <label for="date">Bitte selektieren Sie ein Datum:</label>
    <input type="date" placeholder="Datum" id="date" />
    <button id="getData">Daten holen</button>

    <div id="result">
    <canvas id="myChart"></canvas>
    </div>
  

    
</body>
</html>