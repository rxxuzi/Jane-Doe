<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/clock.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/coin.css">
    <title>JANE DOE</title>
</head>
<body>

<h1 class="the-title">皇国義勇軍【七生報国】😤🤚</h1>

<div class="container">
    <div class="time-container"></div>
    <div class="real-time"></div>
</div>

<div class="ticker">
    <ul class="coin-container"></ul>
</div>

<div class="news-container"></div>

<script src="js/main.js"></script>
<script src="js/realTime.js"></script>
<script src="js/coin.js"></script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldTimeZoneAreasHigh.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldTimeZonesHigh.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<?php
    include 'animation.php';
    isDisplayAnimation(true);
?>

</body>
</html>
