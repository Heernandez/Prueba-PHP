<?php
include 'conection.php';

function agregar_producto($data){
    # almacena un nuevo producto, retorna true si fue exitoso o false sino se adicionó el registro
    $id = $data["id"];
    $nombre = $data["nombre"];
    $desc = $data["descripcion"];
    $valor = $data["valor"];
    $disp = $data["cantidad"];

    $conn = db_connect();
    $resultado = false;
    
    if ($id == "" || $nombre == "" || $valor < 0 || $disp < 0){

        echo "Los campos no cumplen con las especificaciones";
        $resultado = false;
    }
    else{

        $values = "("."'".$id."'".","."'".$nombre."'".","."'".$desc."'".",".$valor.",".$disp.")";
        #echo $values;
        try{
            $res = $conn->query("insert into product values ".$values);
            $resultado = true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            $resultado = false;
            }
        }
    $conn = NULL;
    return $resultado;
}

function obtener_productos(){
    # se consultan los productos existente, sino hay se retorna false
    $conn = db_connect();
    $resultado = false;
    try{
        $resultado = $conn->query("select * from product"); 
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;
}

function obtener_producto($id){
  
    # retorna la informacion de un producto si existe
    
    #$id = $_GET["idProducto"];
    $resultado = false;

    if ($id == ""){
        $resultado = false;
    }
    else{
        $conn = db_connect();
     
        try{
            $sql = "select * from product where IDPRODUCTO =".$id;
            $res = $conn->query($sql)->fetch();
            if ($res){
                $resultado = $res;     
            }
            else{
                $resultado = false;
            }                              
        }
        catch (PDOException $e){
            #echo $e->getMessage();
            $resultado = false;
        }

    }
    $conn = NULL;
    return $resultado;
   
}

#function actualizar_producto($id,$nombre,$desc,$valor,$disp){
function actualizar_producto($data){
    # actualiza la informacion de un producto, devuelve true si fue exitoso
    # se usará para actualizar tanto el stock, como las demás variables en caso de que cambie las caracteristicas del producto (alza precio, cambio nombre, etc)
    
    $conn = db_connect();
    #$conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $resultado = false;
    $id = $data["id"];
    $nombre = $data["nombre"];
    $desc = $data["descripcion"];
    $valor = $data["valor"];
    $disp = $data["cantidad"];
    
    if ($id == "" || $nombre == "" || $valor < 0 || $disp < 0){
        echo "Los campos no cumplen con las especificaciones";
        $resultado = false;
    }
    else{

      
        try{
            $sql = "update PRODUCT set NOMBRE ='".$nombre."',DESCRIPCION ='".$desc."',VALOR_UNIT= ".$valor.",CANT_DISP = ".$disp." where IDPRODUCTO ='".$id."'";
            #echo "$sql  <br>";
            $res = $conn->query($sql);
            $resultado = true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            $resultado = false;
            }
        }
    $conn = NULL;
    return $resultado;
    
}

function eliminar_producto($id){
    # elimina un producto
    $conn = db_connect();
    $resultado = false;
    if ($id == "" ){
        echo "El id no debe ser vacio";
        $resultado = false;
    }
    else{
        $existeProducto = obtener_producto($id);
        if($existeProducto == true){
            try{
                $sql = "delete from PRODUCT where IDPRODUCTO ='".$id."'";
                #echo "la consulta es : $sql";
                $conn->query($sql);
                $conn->query("commit;");
                $resultado = true;
                
            }
            catch (PDOException $e){
                echo $e->getMessage();
                $resultado = false;
            }
        }
        else{
            $resultado = false;
        }
    }
    $conn = NULL;
    return $resultado;
}

function esta_disponible($id,$cantidad){
    # valida si para un producto, hay disponible la cantidad solicitada o no
    $conn = db_connect();
    $resultado = false;
     
    try{
        $sql = "select CANT_DISP from product where IDPRODUCTO =".$id;
        $res = $conn->query($sql)->fetch();
        if ($res){
              
            if ($res["CANT_DISP"]>= $cantidad){
                # hay disponibles
                echo "La cantidad solicitada está disponible.";
                $resultado = true;

            }
            else{
                echo "La cantidad solicitada no está disponible.";
                $resultado = false;
            }
        }
        else{
            $resultado = false;
        }                              
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;

}

function lista_cliente(){
    # se consultan los cliente existente, sino hay se retorna false
    $conn = db_connect();
    $resultado = false;
    try{
        $resultado = $conn->query("select * from customer"); 
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;

}

function obtener_cliente($id){
  
    # retorna la informacion de un cliente si existe
    
    $resultado = false;

    if ($id == ""){
        $resultado = false;
    }
    else{
        $conn = db_connect();
     
        try{
            $sql = "select * from customer where IDCLIENTE =".$id;
            $res = $conn->query($sql)->fetch();
            if ($res){
                $resultado = $res;     
            }
            else{
                $resultado = false;
            }                              
        }
        catch (PDOException $e){
            #echo $e->getMessage();
            $resultado = false;
        }

    }
    $conn = NULL;
    return $resultado;
   
}

function factura_existe($id){

    # valida si un idFactura condultado existe, retorna true o false en caso contrario
    $conn = db_connect();
    $resultado = false;
    try{
        $sql = "select * from SALE where IDFACTURA =".$id;
        $res = $conn->query($sql)->fetch();
        if ($res){
              
            $resultado = true;
        }
        else{
            $resultado = false;
        }  
                              
    }
    catch (PDOException $e){
        #echo $e->getMessage();
        $resultado = false;
    }
    $conn = NULL;
    return $resultado;

}

function guardar_venta($data=NULL){

    $data = array(
        array("IDPRODUCTO"=>"10001","IDCLIENTE"=>"1235","CANTIDAD"=>10,"VALOR"=>10),
        array("IDPRODUCTO"=>"10002","IDCLIENTE"=>"1235","CANTIDAD"=>10,"VALOR"=>20),
        array("IDPRODUCTO"=>"10003","IDCLIENTE"=>"1235","CANTIDAD"=>10,"VALOR"=>30),
        array("IDPRODUCTO"=>"10004","IDCLIENTE"=>"1235","CANTIDAD"=>10,"VALOR"=>40),
    );
    /*
    $data = array(
        array("IDPRODUCTO"=>"10001","IDCLIENTE"=>"1234","CANTIDAD"=>10,"VALOR"=>10),
        array("IDPRODUCTO"=>"10002","IDCLIENTE"=>"1234","CANTIDAD"=>10,"VALOR"=>20),
        array("IDPRODUCTO"=>"10003","IDCLIENTE"=>"1234","CANTIDAD"=>10,"VALOR"=>30),
        array("IDPRODUCTO"=>"10004","IDCLIENTE"=>"1234","CANTIDAD"=>10,"VALOR"=>40),
    );
    */
    # Generacion de ID Unico para la factura
    $generacion = true;
    $id = NULL;
    do{ 
        $idFactura = uniqid("FAC");
        $generacion = factura_existe($idFactura);
    }
    while($generacion);
    # Captura de la fecha actual para el registrar en la venta
    
    $fecha = (string)(date("Y"))."-".(string)(date("m"))."-".(string)(date("d"));
    #echo "la fecha es $fecha";

    # Se supone, los datos de la venta llegan en una lista ( todos de la misma venta) con los campos : IDPRODUCTO,IDCLIENTE,CANTIDAD,VALOR (se recibe el valor unit, y se calcula el valor y se revisa si aplica desc)

    $conn = db_connect();
    $resultado = false;
    try{
        foreach($data as $item){
            $values = "("."'".$idFactura."','".
                    $item["IDPRODUCTO"]."','".
                    $item["IDCLIENTE"]."',".
                    $item["CANTIDAD"].",".
                    ($item["CANTIDAD"] >5 ? 0.9*$item["VALOR"]*$item["CANTIDAD"]:$item["VALOR"]*$item["CANTIDAD"]).",'".
                    $fecha."');";
            
            $res = $conn->query("insert into sale values ".$values);
            
        }
        $resultado = true;
    }
    catch (PDOException $e){
        echo $e->getMessage();
        $resultado = false;
    }
    
    $conn = NULL;
    return $resultado;

}



?>
