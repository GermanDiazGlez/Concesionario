<?php

header('Content-Type: application/json');


include("../BBDD.php");
$bd = new BBDD();
$vehiculos = $bd->selectVehiculos();


http_response_code(200);
echo json_encode($vehiculos);
