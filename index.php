<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" media="screen" rel='stylesheet' href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
        <!--Container für die Labels der Daten und der Liste-->

        <div class="nav-buttons">
            <button class="buttons" id="button1">Button 1</button>
            <button class="buttons" id="button2">Button 2</button>
            <button class="buttons" id="button3">Button 3</button>
        </div>

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
        </div>
    </main>

</body>

</html>