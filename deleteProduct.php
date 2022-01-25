<?php
include 'operations.php';

?>
<html>
    <body>
        <?php
            $resultado = eliminar_producto($_POST["idDelete"]);
            if ($resultado){
                echo "<h3>El producto con id:".$_POST["idDelete"]." fue eliminado.</h3>";
            }
            else{
                echo "<h3>El producto con id:".$_POST["idDelete"]." no existe.</h3>";
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
