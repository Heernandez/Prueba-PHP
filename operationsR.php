<?php

include 'conection.php';

function rango_mes($mes,$año){

    $mes = strtoupper($mes);
    $resultado = array("2022-01-01","2022-01-31");
    switch($mes){

        case "ENERO": 
            $resultado[0]= $año."-01-01"; 
            $resultado[1]= $año."-01-31"; 
            break;
        case "FEBRERO": 
            $resultado[0]= $año."-02-01"; 
            $resultado[1]= $año."-02-28"; 
            break;
        case "MARZO": 
            $resultado[0]= $año."-03-01"; 
            $resultado[1]= $año."-03-31"; 
            break;
        case "ABRIL": 
            $resultado[0]= $año."-04-01"; 
            $resultado[1]= $año."-04-30"; 
            break;
        case "MAYO": 
            $resultado[0]= $año."-05-01"; 
            $resultado[1]= $año."-05-31"; 
            break;
        case "JUNIO": 
            $resultado[0]= $año."-06-01"; 
            $resultado[1]= $año."-06-30"; 
            break;
        case "JULIO": 
            $resultado[0]= $año."-07-01"; 
            $resultado[1]= $año."-07-31"; 
            break;
        case "AGOSTO": 
            $resultado[0]= $año."-08-01"; 
            $resultado[1]= $año."-08-31"; 
            break;
        case "SEPTIEMBRE":
            $resultado[0]= $año."-09-01"; 
            $resultado[1]= $año."-09-30"; 
            break;
        case "OCTUBRE": 
            $resultado[0]= $año."-10-01"; 
            $resultado[1]= $año."-10-31"; 
            break;
        case "NOVIEMBRE": 
            $resultado[0]= $año."-11-01"; 
            $resultado[1]= $año."-11-30"; 
            break;
        case "DICIEMBRE": 
            $resultado[0]= $año."-12-01"; 
            $resultado[1]= $año."-12-31"; 
            break;
        default: echo "Mes no válido";
            $resultado[0]= $año."-01-01"; 
            $resultado[1]= $año."-01-31"; 
            break;
    }
    return $resultado;
}

function mejores_clientes_por_mes($mes,$año){

    $conn = db_connect();
    $resultado = false;
    $limite = rango_mes($mes,$año);
    #echo "Limites :".$limite[0]."  ".$limite[1];
    try{
        $sql = 'select c.IDCLIENTE,c.NOMBRE, R.COMPRA as COMPRA from customer as c, 
                (select IDCLIENTE ,sum(valor) as COMPRA from sale
                where FECHAVENTA >="'.$limite[0].'" and FECHAVENTA <="'.$limite[1].'"
                group by IDCLIENTE
                order by COMPRA DESC
                limit 5) as R
                where c.IDCLIENTE = R.IDCLIENTE
                order by R.COMPRA DESC;';
        
            #echo $sql;
        $resultado = $conn->query($sql);
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;
}

function productos_por_mes($mes,$año){

    $conn = db_connect();
    $resultado = false;
    $limite = rango_mes($mes,$año);
    #echo "Limites :".$limite[0]."  ".$limite[1];
    try{
        $sql = 'select s.IDPRODUCTO,R.NOMBRE,SUM(s.CANTIDAD) AS CANTIDAD
                from sale as s, (SELECT * FROM PRODUCT) AS R
                where FECHAVENTA >="'.$limite[0].'" and FECHAVENTA <="'.$limite[1].'"
                and s.IDPRODUCTO = R.IDPRODUCTO
                group by s.IDPRODUCTO
                ORDER BY CANTIDAD DESC
                LIMIT 5;';
        #echo $sql;
        $resultado = $conn->query($sql);
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;
}


function productos_cliente_rango($inicio,$fin){

    $conn = db_connect();
    $resultado = false;
   
    try{
        $sql = 'SELECT c.NOMBRE AS NOMBRE_CLIENTE,P.NOMBRE AS NOMBRE_PRODUCTO,SUM(s.VALOR) AS VALOR
                FROM sale as s, (SELECT * FROM CUSTOMER) as C,(SELECT * FROM PRODUCT) as P
                where FECHAVENTA >="'.$inicio.'" and FECHAVENTA <="'.$fin.'"
                and  s.IDCLIENTE = C.IDCLIENTE AND
                S.IDPRODUCTO = P.IDPRODUCTO
                GROUP BY s.IDCLIENTE,s.IDPRODUCTO
                ORDER BY s.IDCLIENTE DESC
                ';


        #echo $sql;
        $resultado = $conn->query($sql);
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    #var_dump($resultado);
    return $resultado;
}

?>