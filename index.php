<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <script src="jsdatei.js" defer></script>
    <title>Document</title>
</head>
<body>
    <p id="result"></p>
    <?php
    $xml=simplexml_load_file("TicketCollector.xml") or die("Error: Cannot create object");
    echo json_encode($xml);
    print_r($xml);
    ?>

</body>
</html>