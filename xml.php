<?php
    $CallAccountingList = simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");

    // Erstellen eines leeren Arrays für die neuen Daten
    $newDataArray = [];

    foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
        $SubscriberName = (string) $CallAccounting->SubscriberName;
        $DialledNumber = (string) $CallAccounting->DialledNumber;
        $Date = (string) $CallAccounting->Date;
        $Time = (string) $CallAccounting->Time;
        $RingingDuration = (string) $CallAccounting->RingingDuration;
        $CallDuration = (string) $CallAccounting->CallDuration;

        // Prüfen ob incoming oder outgoing
        $CommunicationType = (string) $CallAccounting->CommunicationType;

        // Prüfen, ob Call Duration 00:00:00 ist
        $Type = ($CallDuration == '00:00:00') ? 'verpasst' : 'angenommen';

        // Bestimme den CallType basierend auf der CommunicationType
        if (in_array($CommunicationType, ['IncomingPrivate', 'IncomingTransit', 'IncomingTransferPrivate', 'IncomingTransferTransit'])) {
            $calltype = 'eingehend';
        } elseif (in_array($CommunicationType, ['OutgoingPrivate', 'OutgoingTransferTransit', 'OutgoingTransferPrivate', 'OutgoingTransit'])) {
            $calltype = 'ausgehend';
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
            'Date' => $Date,
            'Time' => $Time,
            'RingingDuration' => $RingingDuration,
            'CallDuration' => $CallDuration,
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

    <?php include("database.php"); ?>