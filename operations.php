<?php
include 'conection.php';

function registrar_nuevo_producto($id,$nombre,$desc,$valor,$disp){
    # almacena un nuevo producto, retorna true si fue exitoso o false sino se adicionó el registro

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
    return $resultado;
    #retorna el array con la informacion o false

}

#function actualizar_producto($id,$nombre,$desc,$valor,$disp){
function actualizar_producto($data){
    # actualiza la informacion de un producto, devuelve true si fue exitoso
    # se usará para actualizar tanto el stock, como las demás variables en caso de que cambie las caracteristicas del producto (alza precio, cambio nombre, etc)
    
    $conn = db_connect();
    $conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
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

function eliminar_producto(){
    # elimina un producto
}

function esta_disponible($id="10012",$cantidad=5){
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
    return $resultado;

}




# terminar consultas para generar los reportes
?>
