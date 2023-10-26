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


    <?php
    $CallAccountingList = simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");

    // Erstellen eines leeren Arrays für die Daten
    $dataArray = [];

    foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
        $SubscriberName = (string) $CallAccounting->SubscriberName;
        $DialledNumber = (string) $CallAccounting->DialledNumber;
        $CallDuration = (string) $CallAccounting->CallDuration;
        $Date = (string) $CallAccounting->Date;
        $Time = (string) $CallAccounting->Time;

        // Prüfen, ob Call Duration 00:00:00 ist
        $Type = ($CallDuration == '00:00:00') ? 'missed' : 'incoming';

        // Überprüfen, ob Subscriber Name leer ist
        if (empty($SubscriberName)) {
            $SubscriberName = 'none';
        }

        // Die Daten in ein assoziatives Array einfügen
        $dataArray[] = [
            'SubscriberName' => $SubscriberName,
            'DialledNumber' => $DialledNumber,
            'CallDuration' => $CallDuration,
            'Date' => $Date,
            'Time' => $Time,
            'Type' => $Type,
        ];
    }

    // CSV-Datei erstellen und Daten schreiben
    $csvFile = fopen("data.csv", "w");

    foreach ($dataArray as $data) {
        fputcsv($csvFile, $data);
    }

    fclose($csvFile);

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