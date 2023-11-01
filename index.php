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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


    <script> const data = "<?php echo $List; ?>";</script>
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
        <div class="nav-buttons">

            <select class="buttons btn-lg dropdown-toggle" id="inputGroupSelect02" id="customerButton" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <option selected>Select Customer</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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
        $sql = "SELECT DialledNumber, CallDuration, Time, Date, Type FROM callaccounting";
        $result = $conn->query($sql);

        // HTML für eine scrolling list
        echo '<div class="infinite_scrolling_list_container">';
        echo '<div class="infinite_scrolling_list">';
        echo '<ul>';

        if (mysqli_num_rows($result) > 0) {
            // output der query
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>' . $row["DialledNumber"] . "  " . $row["CallDuration"] . "  " . $row["Time"] . "  " . $row["Date"] . "  " . $row["Type"] . "</li>";
            }
        } else {
            echo "0 results";
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';

        $conn->close();
        ?>
        
        <?php include("xml.php"); ?>

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