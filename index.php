<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <script src="jsdatei.js" defer></script>
    <title>Document</title>
    <?php
    $xml=simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");
    $jsonData = json_encode($xml);
    
    ?>
    <script>
        const jsonData = <?php echo $jsonData; ?>
        console.log(data);
    </script>
</head>
<body>
    <label for="date">Bitte selektieren Sie ein Datum:</label>
    <input type="date" placeholder="Datum" id="date" />
    <button id="getData">Get Data</button>

    <div id="result"></div>
    

</body>
</html>