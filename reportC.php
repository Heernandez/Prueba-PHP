<?php
include 'operationsR.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <h1 align="center"><?php echo "VALOR DE COMPRA DE CLIENTE POR PRODUCTO ENTRE ".$_POST["FechaInicio"]." Y ".$_POST["FechaFin"] ?></h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre Cliente</td>
        <td>Nombre Producto</td>
        <td>Valor Compra</td>
    </tr>
    <?php 
       
        $resultados = productos_cliente_rango($_POST["FechaInicio"],$_POST["FechaFin"])->fetchAll();
        var_dump($resultados);

        if (!$resultados){
            echo "<tr><td colspan=3 style ='text-align:center'>No hay ventas registradas en el rango de consulta.</td></tr>";
        }
        else{
            foreach($resultados as $datos){
                ?>
                    <tr>
                        <td><?php echo $datos["NOMBRE_CLIENTE"]?></td>
                        <td><?php echo $datos["NOMBRE_PRODUCTO"]?></td>
                        <td><?php echo $datos["VALOR"]?></td>
                    </tr>
                <?php   
            }
        }
     ?>
    </table>
    <button id="myButton" >Volver</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
                location.href = "/Prueba-PHP/reports.php";
        };
    </script>
    

</body>
</html>


