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


    <?php /*
    $CallAccountingList = simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");
    $i = 0;
    foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
        if ($CallAccounting->Time == '14:32:00') {
            $Data[$i] = $CallAccounting->CallDuration;

            $i++;
        }
    }
    $List = implode(', ', $Data);
    echo $List;  */
    ?> 

    <?php
    $CallAccountingList = simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");

    foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
        $Date = (string) $CallAccounting->Date;
        $Time = (string) $CallAccounting->Time;
        $CallDuration = (string) $CallAccounting->CallDuration;
        $DialledNumber = (string) $CallAccounting->DialledNumber;

        // Hier können Sie die gewünschten Daten weiterverarbeiten oder in Arrays speichern.
    
        echo "Date: $Date, Time: $Time, Call Duration: $CallDuration, Dialled Number: $DialledNumber<br>";
    }
    ?>

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