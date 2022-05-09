<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación tabla Vehiculos</title>
</head>
<body>
    <section>
        <p>Se crea la tabla "vehiculos" en la Base de Datos "concesionario" </p> 
        <ul>
            <li>Tabla vehiculos (id, marca, modelo, precio)</li>
        </ul>
        <?php
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "concesionario";

            $db = new mysqli($servername,$username,$password,$database);

            $crearTabla = "CREATE TABLE IF NOT EXISTS vehiculos (id INT NOT NULL AUTO_INCREMENT, 
                        marca VARCHAR(25) NOT NULL,
                        modelo VARCHAR(25) NOT NULL, 
                        precio INT NOT NULL,  
                        PRIMARY KEY (id))";
                      
            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 'vehiculos' creada con éxito </p>";
             } else { 
                echo "<p>ERROR en la creación de la tabla vehiculos. Error : ". $db->error . "</p>";
                exit();
             }   
        $db->close();    
        ?> 
    </section>
    <section>
        <p>Se crea la tabla "presupuestos" en la Base de Datos "concesionario" </p> 
        <ul>
            <li>Tabla presupuestos (id, idVehiculo, idCliente)</li>
        </ul>
        <?php
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "concesionario";

            $db = new mysqli($servername,$username,$password,$database);

            $crearTabla = "CREATE TABLE IF NOT EXISTS presupuestos (id INT NOT NULL AUTO_INCREMENT, 
                        idVehiculo VARCHAR(9) NOT NULL,
                        idCliente VARCHAR(9) NOT NULL, 
                        PRIMARY KEY (id))";
                      
            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 'presupuestos' creada con éxito </p>";
             } else { 
                echo "<p>ERROR en la creación de la tabla presupuestos. Error : ". $db->error . "</p>";
                exit();
             }   
        $db->close();    
        ?> 
    </section>
    <section>
        <p>Se crea la tabla "clientes" en la Base de Datos "concesionario" </p> 
        <ul>
            <li>Tabla clientes (id, nombre, apellidos, correo)</li>
        </ul>
        <?php
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "concesionario";

            $db = new mysqli($servername,$username,$password,$database);

            $crearTabla = "CREATE TABLE IF NOT EXISTS clientes (id INT NOT NULL AUTO_INCREMENT, 
                        nombre VARCHAR(25) NOT NULL,
                        apellidos VARCHAR(55) NOT NULL, 
                        correo VARCHAR(55) NOT NULL, 
                        PRIMARY KEY (id))";
                      
            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 'clientes' creada con éxito </p>";
             } else { 
                echo "<p>ERROR en la creación de la tabla clientes. Error : ". $db->error . "</p>";
                exit();
             }   
        $db->close();    
        ?> 
    </section>
    <section>
        <p>Se crea la tabla "estadisticas" en la Base de Datos "concesionario" </p> 
        <ul>
            <li>Tabla estadisticas (id, idVehiculo, nVecesPresup)</li>
        </ul>
        <?php
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "concesionario";

            $db = new mysqli($servername,$username,$password,$database);

            $crearTabla = "CREATE TABLE IF NOT EXISTS estadisticas (id INT NOT NULL AUTO_INCREMENT, 
                        idVehiculo VARCHAR(9) NOT NULL,
                        nVecesPresup INT NOT NULL,
                        PRIMARY KEY (id))";
                      
            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 'estadisticas' creada con éxito </p>";
             } else { 
                echo "<p>ERROR en la creación de la tabla estadisticas. Error : ". $db->error . "</p>";
                exit();
             }   
        $db->close();    
        ?> 
    </section>
</body>
</html>