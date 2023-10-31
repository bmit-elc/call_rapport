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
    echo "Datenbank 'call_report' wurde erstellt oder existiert bereits.<br>";
} else {
    echo "Fehler beim Erstellen der Datenbank: " . $conn->error;
}

// Datenbank auswählen
$conn->select_db("call_report");

// Tabelle erstellen, wenn sie nicht existiert
$createTableSQL = "CREATE TABLE IF NOT EXISTS CallAccounting (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SubscriberName VARCHAR(255),
    DialledNumber VARCHAR(255),
    Date DATE,
    Time TIME,
    CallDuration TIME,
    Type VARCHAR(255)
)";
if ($conn->query($createTableSQL) === TRUE) {
    echo "Tabelle 'CallAccounting' wurde erstellt oder existiert bereits.<br>";
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
    $CallDuration = $conn->real_escape_string($row[2]);
    $Date = $conn->real_escape_string($row[3]);
    $Time = $conn->real_escape_string($row[4]);
    $Type = $conn->real_escape_string($row[5]);

    $sql = "INSERT INTO CallAccounting (SubscriberName, DialledNumber, CallDuration, Date, Time, Type) VALUES ";
    $sql .= "('$SubscriberName', '$DialledNumber', '$CallDuration', '$Date', '$Time', '$Type')";

    // Führe den INSERT-Befehl aus
    if ($conn->query($sql) === TRUE) {
        echo "Datensatz hinzugefügt: $sql<br>";
    } else {
        echo "Fehler beim Hinzufügen des Datensatzes: " . $conn->error;
    }
}

// Schließe die CSV-Datei
fclose($csvFile);

// Schließe die Verbindung zur Datenbank
$conn->close();
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