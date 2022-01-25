<?php
function db_connect(){
    # Funcion que realiza la conexion a la bd y retorna la conexion para poder ejecutar consultas
    $dbname = "Tienda";
    $user = "luish";
    $password = "admin123";
    $dbh = NULL;
    $dsn = "mysql:host=localhost;dbname=$dbname";
    try {    
        $dbh = new PDO($dsn,$user,$password);   
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        echo "<h2>La conexión a la BD Falló...".$e->getMessage()."</h2>";
    }
    return $dbh;

}

?>