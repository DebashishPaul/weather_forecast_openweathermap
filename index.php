<?php
$apiKey = "c7203576bab1114c641760dd55be2304";
$cityId = "1337179";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>




<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
    <style>
        body{
            background-color: cadetblue;
            font-family: monospace;
            
        }
        .report-container{
            background-color: aliceblue;
            text-align: center;
            margin-left:  400px;
            margin-right:  400px;padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><script>
    
    var today = new Date();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        document.write(time);
    </script></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
        <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C /
        <span class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
    
    
</body>
</html>







