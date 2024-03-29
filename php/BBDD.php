<?php
class BBDD
{
    protected $servername;
    protected $username;
    protected $password;
    protected $database;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "DBUSER2021";
        $this->password = "DBPSWD2021";
        $this->database = "concesionario";
        $this->initBD();
    }

    function initBD()
    {
        $db = new mysqli($this->servername, $this->username, $this->password);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $cadenaSQL = "CREATE DATABASE IF NOT EXISTS " . $this->database . " COLLATE utf8_spanish_ci";
        if ($db->query($cadenaSQL) === FALSE) {
            echo "Error BBDD";
            exit();
        }
        $db->select_db($this->database);



        $crearTabla = "CREATE TABLE IF NOT EXISTS vehiculos (id INT NOT NULL AUTO_INCREMENT, 
                        nombre VARCHAR(25) NOT NULL,
                        modelo VARCHAR(25) NOT NULL, 
                        ano INT NOT NULL,  
                        tipo VARCHAR(25) NOT NULL,  
                        PRIMARY KEY (id))";

        if ($db->query($crearTabla) === FALSE) {
            echo "<p>Tabla 'vehiculos' no ha podido ser creada </p>";
        }

        $result = $db->query("select count(*) as total from vehiculos");
        $row = $result->fetch_row();

        if (!$row[0]) {
            $sql = "INSERT INTO vehiculos (nombre, modelo, ano, tipo) VALUES ('Seat', 'Leon 1', 2001, 'Deportivo');";
            $db->query($sql);
            $sql = "INSERT INTO vehiculos (nombre, modelo, ano, tipo) VALUES ('Ford', 'CMAX', 2008, 'Familiar');";
            $db->query($sql);
            $sql = "INSERT INTO vehiculos (nombre, modelo, ano, tipo) VALUES ('Volskwagen', 'Golf 4', 1998, 'Deportivo');";
            $db->query($sql);
            $sql = "INSERT INTO vehiculos (nombre, modelo, ano, tipo) VALUES ('Aston Martin', 'DB9', 2009, 'Supercoche');";
            $db->query($sql);
            $sql = "INSERT INTO vehiculos (nombre, modelo, ano, tipo) VALUES ('Lamborghini', 'Murcielago', 2003, 'Supercoche');";
            $db->query($sql);
        }



        $crearTabla = "CREATE TABLE IF NOT EXISTS presupuestos (id INT NOT NULL AUTO_INCREMENT, 
                        idVehiculo VARCHAR(9) NOT NULL,
                        idCliente VARCHAR(9) NOT NULL, 
                        PRIMARY KEY (id))";

        if ($db->query($crearTabla) === FALSE) {
            echo "<p>Tabla 'presupuestos' no ha podido ser creada </p>";
        }



        $crearTabla = "CREATE TABLE IF NOT EXISTS clientes (id INT NOT NULL AUTO_INCREMENT, 
                        nombre VARCHAR(25) NOT NULL,
                        apellidos VARCHAR(55) NOT NULL, 
                        correo VARCHAR(55) NOT NULL, 
                        PRIMARY KEY (id))";

        if ($db->query($crearTabla) === FALSE) {
            echo "<p>Tabla 'clientes' no ha podido ser creada </p>";
        }



        $crearTabla = "CREATE TABLE IF NOT EXISTS estadisticas (id INT NOT NULL AUTO_INCREMENT, 
                        idVehiculo VARCHAR(9) NOT NULL,
                        nombre VARCHAR(25) NOT NULL,
                        PRIMARY KEY (id))";

        if ($db->query($crearTabla) === FALSE) {
            echo "<p>Tabla 'estadisticas' no ha podido ser creada </p>";
        }

        $db->close();
    }

    function selectVehiculos()
    {
        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $result = $db->query("select * from vehiculos");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        $db->close();
        return $data;
    }

    function insertCliente($nombre, $apellidos, $email)
    {
        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $sql = "INSERT INTO clientes (nombre, apellidos, correo) VALUES ('" . $nombre . "', '" . $apellidos . "', '" . $email . "')";
        $db->query($sql);
        $db->close();
    }

    function insertPresupuesto($nombre, $apellidos, $email, $id)
    {
        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $result = $db->query("SELECT id from clientes where nombre='" . $nombre . "' and apellidos='" . $apellidos . "' and correo= '" . $email . "'");

        $fila = $result->fetch_row();

        $sql = "INSERT INTO presupuestos (idVehiculo, idCliente) VALUES ('" . $id . "', '" . $fila[0] . "');";
        $db->query($sql);
        $db->close();
    }

    function insertEstadistica($id)
    {
        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $result = $db->query("SELECT nombre from vehiculos where id='" . $id . "'");

        $fila = $result->fetch_row();

        $sql = "INSERT INTO estadisticas (idVehiculo, nombre) VALUES ('" . $id . "', '" . $fila[0] . "')";
        $db->query($sql);
        $db->close();
    }


    function selectEstadisticas()
    {
        $db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($db->connect_error) {
            var_dump($db->connect_error);
            exit();
        }

        $result = $db->query("SELECT count(idVehiculo) as total, nombre FROM estadisticas GROUP by nombre order by total DESC;");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        return $data;
    }
}
