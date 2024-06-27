<?php

function getWeather($city) {
    
    $apiKey = '5235fb3a174ebcbce098b8f1fe73e13c';

    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    

    $recibir_datos = @file_get_contents($apiUrl); //USAMOS LA FUNCION file_get_contents PARA PODER RECIBIR Y ALMAZENAR LOS DATOS EN UNA VARIABLE
    // USAMOS LA @ PARA SUPRIMIR LOS MENSAJES DE ERROR

    if ($recibir_datos == null){ //COMPROBAMOS QUE LA VARIABLE HAYA RECIBIDO INFORMACION Y QUE NO SEA IGUAL A NULL
        echo "Error al inentar acceder a los datos, es posible que la ciudad no exista o no este bien escrita, consulte el documento \"listadoCiudades\" Para ver las ciudades disponibles."; //EN CASO DE ESTARLO MANDAMOS EL MENSAJE DE ERROR
    }
    else{

        $data = json_decode($recibir_datos, true);
        $generalData = $data["main"];
        $windData = $data["wind"];

        echo "<br><h3>Ciudad => $data[name]</h3>";
        echo "<p>Temperatura Actual =>  $generalData[temp] ºC</p>";
        echo "<p>Humedad => $generalData[humidity] %</p>";
        echo "<p>$data[name] cuenta con una temperatura actual de $generalData[temp] ºC y una sensacion termica de $generalData[feels_like] ºC, con una humedad del $generalData[humidity] %. Con vientos de $windData[speed] km/h.</p>";
    }

}   

// Ejemplo de uso
$city = 'Barcelonas';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API CLIMA</title>
    <style>
        body{
            background-color: lightgrey;
            font-family: Calibri;
        }

        form{
            background-color: lightcyan;
            width: 40%;
            box-shadow: 5px 5px 15px black;
            padding: 30px;
            margin: 3% auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input{
            width: 75%;
            margin: 5px;
            padding: 10px;
        }

        #respuesta{
            border: solid 1px black;
            border-radius: 10px;
            width: 75%;
            height: fit-content;
            min-height: 10px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method = "GET">
        <input type="text" placeholder="Ciudad" id ="input" name="ciudad">
        <input type="submit" id="submit">
        <div id="respuesta">
            <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'GET'){ //SE COMPRUEBA SI SE RECIBE UNA SOLICITUD DE TIPO GET

                if(empty($_GET["ciudad"])){// VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
                    echo "<p><b>LOS CAMPOS ESTAN VACIOS</b></p>";
                }
                else{
                    $city = $_GET["ciudad"];
                    getWeather($city);
                }
            }
            
            
            ?>
        <div>
    </form>
</body>
</html>


