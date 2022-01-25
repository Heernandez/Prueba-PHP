<?php
include 'operations.php';

$exito = false;

if(isset($_POST['SubmitButton'])){
    $estatus = actualizar_producto($_POST);
    if($estatus){
        echo "<h3>Producto Actualizado correctamente.</h3>";
        $exito = true;
       
    }
    else{
        echo "La actualización falló.<br>$estatus";
    }
    

}



?>
<html>
    <body>
        <?php
            $resultado = obtener_producto($_POST["id"]);
            if (!$resultado){
                echo "<h3>El producto con id:".$_POST["id"]." no existe.</h3>";
                $exito =true;
            }
            if(!$exito){

        ?>
        <div id="formDiv">
            <form action="" method="post">
                idProducto:          <input type="text" name="id"           value="<?php echo $_POST["id"] ?>" readonly   ><br>
                Nombre:              <input type="text" name="nombre"       value="<?php echo $resultado["NOMBRE"]?>"     ><br>
                Descripcion:         <input type="text" name="descripcion"  value="<?php echo $resultado["DESCRIPCION"]?>"><br>
                Valor Unitario:      <input type="text" name="valor"        value="<?php echo $resultado["VALOR_UNIT"]?>" ><br>
                Cantidad Disponible: <input type="text" name="cantidad"     value="<?php echo $resultado["CANT_DISP"]?>"  ><br>
                <input type="submit" name ="SubmitButton" value="Actualizar">
            </form>
        </div>
        
        <?php 
        } 
        ?>
        <button id="myButton" >Volver</button>
        <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "/Prueba-PHP/index.php";
            };
        </script>
    </body>

</form>
</html>
