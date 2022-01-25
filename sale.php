<?php
include 'operations.php';
?>



<html>
    <body>
        <?php
        if (guardar_venta()){
            echo "<h2>Compra registrada con exito.</h2>";
        }
        else{
            echo "<h2>La compra no fue registrada.</h2>";
        }
        ?>
        <button id="myButton" >Volver</button>
        <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
        location.href = "/Prueba-PHP/index.php";
            };
        </script>
    </body>
</html>