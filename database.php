<?php
$servername = "localhost";
$username = "root";
$password = "";

// Verbindung zur MySQL-Datenbank herstellen
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Datenbank erstellen, wenn sie nicht existiert
$createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS call_report";
if ($conn->query($createDatabaseSQL) === TRUE) {
    // echo "Datenbank 'call_report' wurde erstellt oder existiert bereits.<br>";
} else {
    echo "Fehler beim Erstellen der Datenbank: " . $conn->error;
}

// Datenbank auswählen
$conn->select_db("call_report");

// Tabelle erstellen, wenn sie nicht existiert
$dropTableSQL = "DROP TABLE IF EXISTS CallAccounting";
if ($conn->query($dropTableSQL) === TRUE) {
    // echo "Tabelle 'CallAccounting' wurde gelöscht oder existiert nicht.<br>";
} else {
    echo "Fehler beim Löschen der Tabelle: " . $conn->error;
}

$createTableSQL = "CREATE TABLE IF NOT EXISTS CallAccounting (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SubscriberName VARCHAR(255),
    DialledNumber VARCHAR(255),
    Date DATE,
    Time TIME,
    RingingDuration TIME,
    CallDuration TIME,
    Type VARCHAR(255),
    CallType VARCHAR(255)
)";

if ($conn->query($createTableSQL) === TRUE) {
    // echo "Tabelle 'CallAccounting' wurde erstellt oder existiert bereits.<br>";
} else {
    echo "Fehler beim Erstellen der Tabelle: " . $conn->error;
}

// CSV-Datei öffnen und Daten einlesen
$csvFile = fopen("data.csv", "r");

// Schleife durch die Zeilen der CSV-Datei
while (($row = fgetcsv($csvFile)) !== false) {
    // Erstelle den INSERT-Befehl
    $SubscriberName = $conn->real_escape_string($row[0]);
    $DialledNumber = $conn->real_escape_string($row[1]);
    $Date = $conn->real_escape_string($row[2]);
    $Time = $conn->real_escape_string($row[3]);
    $RingingDuration = $conn->real_escape_string($row[4]);
    $CallDuration = $conn->real_escape_string($row[5]);
    $Type = $conn->real_escape_string($row[6]);
    $Calltype = $conn->real_escape_string($row[7]);

    $sql = "INSERT INTO CallAccounting (SubscriberName, DialledNumber, Date, Time, RingingDuration, CallDuration, Type, CallType) VALUES ";
    $sql .= "('$SubscriberName', '$DialledNumber', '$Date', '$Time', '$RingingDuration', '$CallDuration', '$Type', '$Calltype')";

    // Führe den INSERT-Befehl aus
    if ($conn->query($sql) === TRUE) {
        // echo "Datensatz hinzugefügt: $sql<br>";
    } else {
        echo "Fehler beim Hinzufügen des Datensatzes: " . $conn->error;
    }
}

// Schließe die CSV-Datei
fclose($csvFile);

// Schließe die Verbindung zur Datenbank
$conn->close();
?>
