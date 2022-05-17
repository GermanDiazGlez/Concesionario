<?php

include("./BBDD.php");
$bd = new BBDD();
$bd->insertCliente($_POST["nombre"], $_POST["apellidos"], $_POST["email"]);
$bd->insertPresupuesto($_POST["nombre"], $_POST["apellidos"], $_POST["email"], $_POST["id"]);
$bd->insertEstadistica($_POST["id"]);

header("Location: ../correcto.html");
exit();
