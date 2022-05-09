<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Concesionario</title>
  </head>
  <body>
    <h1>200-Creación de la Base de Datos con MySQLi</h1>
    <section>
      <?php
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
          
            $db = new mysqli($servername,$username,$password);
             
            if($db->connect_error) { exit ("
      <p>ERROR de conexión:".$db->connect_error."</p>
      "); } else {echo "
      <p>Conexión establecida con " . $db->host_info . "</p>
      ";} $cadenaSQL = "CREATE DATABASE IF NOT EXISTS concesionario COLLATE
      utf8_spanish_ci"; if($db->query($cadenaSQL) === TRUE){ echo "
      <p>Base de datos 'concesionario' creada con éxito</p>
      "; } else { echo "
      <p>
        ERROR en la creación de la Base de Datos 'concesionario'. Error: " .
        $db->error . "
      </p>
      "; exit(); } $db->close(); ?>
    </section>
  </body>
</html>
