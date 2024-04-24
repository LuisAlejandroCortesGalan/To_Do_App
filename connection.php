
<?php

// para conectarse al servidor, ambas maneras sirven pero aveces habra que usar una u otra

// $serverName = "localhost";
// $serverName = "127.0.0.1";

// Parámetros de las conexión
$serverName = "127.0.0.1";
$userName = "cief";
$password = "123456";
$dbName = "to_do_app";

$link = "mysql:host=$serverName; port=3306; dbname=$dbName;";
try {

$conn = new PDO($link, $userName, $password);


// echo "Connection established";

} catch (PDOException $e){
print("Error: " . $e->getMessage());

} catch (Exception $e) {
    print("Error: " . $e->getMessage());

}


//PARAMETROS DE CONEXION
