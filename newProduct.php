<?php
include 'operations.php';
$exito = false;

if(isset($_POST['SubmitButton'])){
    $estatus = agregar_producto($_POST);
    if($estatus){
        echo "<h3>Producto Creado correctamente.</h3>";
        $exito = true;  
    }
    else{
        echo "La creación falló.<br>$estatus";
    }
}
?>
<html>
    <body>
        <?php
            if(!$exito){
        ?>
            <div id="formDiv">
                <form action="" method="post">
                    id Producto:         <input type="text" name="id"          required ><br>
                    Nombre:              <input type="text" name="nombre"      required ><br>
                    Descripcion:         <input type="text" name="descripcion" required ><br>
                    Valor Unitario:      <input type="number" name="valor"       required ><br>
                    Cantidad Disponible: <input type="number" name="cantidad"    required ><br>
                    <input type="submit" name ="SubmitButton" value="Crear">
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

