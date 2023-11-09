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

// Schließe die Verbindung zur Datenbank
$conn->close();
?>
