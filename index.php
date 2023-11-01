<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call Report</title>
    <link type="text/css" media="screen" rel='stylesheet' href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

</head>

<body>

    <header>
        <nav class="navbar">
            <img src="img/espas_logo.svg" alt="espas logo" class="espas_logo">
            <div class="currentDate">
                <div class="todayDate"></div>
                <div class="timeNow"></div>
            </div>
        </nav>
    </header>

    <main>
        <?php
        // Verbindung zur MySQL-Datenbank herstellen
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "call_report";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        // SQL-Abfrage, um alle eindeutigen SubscriberName-Werte abzurufen
        $sql = "SELECT DISTINCT SubscriberName FROM callaccounting WHERE SubscriberName != 'SubscriberName'";
        $result = $conn->query($sql);

        // HTML-Optionen für den Select-Button erstellen
        $selectOptions = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subscriberName = $row["SubscriberName"];
                $selectOptions .= "<option value='$subscriberName'>$subscriberName</option>";
            }
        }

        // Verbindung zur Datenbank schließen
        $conn->close();
        ?>

        <div class="content">
            <div class="nav-buttons">
                <select class="buttons btn-lg custom-select" id="customerButton" type="button" aria-haspopup="true"
                    aria-expanded="false">
                    <option selected>Select Customer</option>
                    <?php echo $selectOptions; // Die Optionen aus der Datenbank einfügen ?>
                </select>
                <button class="buttons btn-lg" id="startButton">Select starting Date</button>
                <button class="buttons btn-lg" id="endButton">Select end Date</button>
            </div>


            <?php

            // Daten für die infinite_scroll Liste auslesen
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "call_report";

            // Verbindung zur MySQL-Datenbank herstellen
            $conn = new mysqli($servername, $username, $password, $dbname);

            // SQL Query
            $sql = "SELECT SubscriberName, DialledNumber, RingingDuration, CallDuration, Time, Date, CallType, Type FROM callaccounting WHERE SubscriberName != 'SubscriberName' ORDER BY Date DESC, Time DESC";
            $result = $conn->query($sql);

            // HTML für eine scrolling list
            echo '<div class="scrolling-list">';
            echo '<div class="infinite_scrolling_list_container">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Name</th>';
            echo '<th scope="col">Nummer</th>';
            echo '<th scope="col">Anrufdauer</th>';
            echo '<th scope="col">Klingeldauer</th>';
            echo '<th scope="col">Uhrzeit</th>';
            echo '<th scope="col">Datum</th>';
            echo '<th scope="col">Anruf</th>';
            echo '<th scope="col">Typ</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody">';

            if (mysqli_num_rows($result) > 0) {
                // output der query
            
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>' . '<td>' . $row["SubscriberName"] . "</td>" . '<td>' . $row["DialledNumber"] . "</td>" . '<td>' . $row["CallDuration"] .'<td>' . $row["RingingDuration"] . "</td>" . '<td>' . $row["Time"] . "</td>" . '<td>' . $row["Date"] . "</td>" . '<td>' . $row["CallType"] . "</td>" . '<td>' . $row["Type"] . '</td>' . "</tr>";

                }
            } else {
                echo "0 results";
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';


            $conn->close();
            ?>

            <?php include("xml.php"); ?>
        </div>
        <!--Container für die Labels der Daten und der Liste

        <div class="infinite_scrolling_list_container">
            <div class="infinite_scrolling_list">
                <ul>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                </ul>
            </div>

        </div> -->

    </main>

</body>

</html>