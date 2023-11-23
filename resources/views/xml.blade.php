@php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "call_report";

// Verbindung zur MySQL-Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

$CallAccountingList = simplexml_load_file(public_path("TicketCollector.xml")) or die("Error: Cannot create object");

foreach ($CallAccountingList->CallAccounting as $CallAccounting) {
    $SubscriberName = $conn->real_escape_string((string) $CallAccounting->SubscriberName);
    $DialledNumber = $conn->real_escape_string((string) $CallAccounting->DialledNumber);
    $Date = $conn->real_escape_string((string) $CallAccounting->Date);
    $Time = $conn->real_escape_string((string) $CallAccounting->Time);
    $RingingDuration = $conn->real_escape_string((string) $CallAccounting->RingingDuration);
    $CallDuration = $conn->real_escape_string((string) $CallAccounting->CallDuration);

    $CommunicationType = $conn->real_escape_string((string) $CallAccounting->CommunicationType);
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

    // SQL-Abfrage, um Daten in die Tabelle einzufügen
    $sql = "INSERT INTO CallAccounting (SubscriberName, DialledNumber, Date, Time, RingingDuration, CallDuration, Type, CallType) VALUES ";
    $sql .= "('$SubscriberName', '$DialledNumber', '$Date', '$Time', '$RingingDuration', '$CallDuration', '$Type', '$calltype')";

    if ($conn->query($sql) !== TRUE) {
        echo "Fehler beim Hinzufügen des Datensatzes: " . $conn->error;
    }
}

// Verbindung zur Datenbank schließen
$conn->close();

include("database.php");
@endphp