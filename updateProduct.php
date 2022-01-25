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
            
            if(!$exito){
                $resultado = obtener_producto($_POST["idUpdate"]);
                if (!$resultado){
                    echo "<h3>El producto con id:".$_POST["idUpdate"]." no existe.</h3>";
                    $exito =true;
                }
                else{
        ?>
            <div id="formDiv">
                <form action="" method="post">
                    id Producto:          <input type="text" name="id"           value="<?php echo $_POST["idUpdate"] ?>" readonly   ><br>
                    Nombre:              <input type="text" name="nombre"       value="<?php echo $resultado["NOMBRE"]?>"     required><br>
                    Descripcion:         <input type="text" name="descripcion"  value="<?php echo $resultado["DESCRIPCION"]?>"required><br>
                    Valor Unitario:      <input type="number" name="valor"        value="<?php echo $resultado["VALOR_UNIT"]?>" required><br>
                    Cantidad Disponible: <input type="number" name="cantidad"     value="<?php echo $resultado["CANT_DISP"]?>"  required><br>
                    <input type="submit" name ="SubmitButton" value="Actualizar">
                </form>
            </div>    
        <?php 
                }
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
