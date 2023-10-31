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

    // Erstellen eines leeren Arrays für die neuen Daten
    $newDataArray = [];

    foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
        $SubscriberName = (string) $CallAccounting->SubscriberName;
        $DialledNumber = (string) $CallAccounting->DialledNumber;
        $RingingDuration = (string) $CallAccounting->RingingDuration;
        $CallDuration = (string) $CallAccounting->CallDuration;
        $Date = (string) $CallAccounting->Date;
        $Time = (string) $CallAccounting->Time;

        // Prüfen ob incoming oder outgoing
        $CommunicationType = (string) $CallAccounting->CommunicationType;

        // Prüfen, ob Call Duration 00:00:00 ist
        $Type = ($CallDuration == '00:00:00') ? 'missed' : 'caught';

        // Bestimme den CallType basierend auf der CommunicationType
        if (in_array($CommunicationType, ['IncomingPrivate', 'IncomingTransit', 'IncomingTransferPrivate', 'IncomingTransferTransit'])) {
            $calltype = 'incoming';
        } elseif (in_array($CommunicationType, ['OutgoingPrivate', 'OutgoingTransferTransit', 'OutgoingTransferPrivate', 'OutgoingTransit'])) {
            $calltype = 'outgoing';
        } elseif ($CommunicationType == 'BreakIn') {
            $calltype = 'breakIn';
        } elseif ($CommunicationType == 'FacilityRequest') {
            $calltype = 'facilityRequest';
        } else {
            $calltype = 'unknown'; // Fallback für unbekannte CommunicationType
        }

        // Die neuen Daten in ein assoziatives Array einfügen
        $newDataArray[] = [
            'SubscriberName' => $SubscriberName,
            'DialledNumber' => $DialledNumber,
            'RingingDuration' => $RingingDuration,
            'CallDuration' => $CallDuration,
            'Date' => $Date,
            'Time' => $Time,
            'Type' => $Type,
            'CallType' => $calltype,
        ];
    }

    // CSV-Datei öffnen und Daten überschreiben
    $csvFile = fopen("data.csv", "w"); // "w" öffnet die Datei im Schreibmodus (überschreiben)
    
    // Neue Daten in die CSV-Datei schreiben
    fputcsv($csvFile, array_keys($newDataArray[0])); // Schreibe Spaltennamen
    foreach ($newDataArray as $data) {
        fputcsv($csvFile, $data);
    }

    // CSV-Datei schließen
    fclose($csvFile);
    ?>

    <?php include ('database.php');?>

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