<?php
include 'operations.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 align="center">LISTADO DE PRODUCTOS</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Codigo del Producto</td>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Valor Unitario</td>
        <td>Cantidad Disponible</td>
    </tr>
    <?php 
        $productos = obtener_productos();

        if (!$productos){
            echo "<tr><td colspan=5 style ='text-align:center'>No hay productos para mostrar...</td></tr>";
        }
        else{
            foreach($productos as $datos){
                ?>
                    <tr>
                        <td><?php echo $datos["IDPRODUCTO"]?></td>
                        <td><?php echo $datos["NOMBRE"]?></td>
                        <td><?php echo $datos["DESCRIPCION"]?></td>
                        <td><?php echo $datos["VALOR_UNIT"]?></td>
                        <td><?php echo $datos["CANT_DISP"]?></td>
                    </tr>
                <?php   
            }
        }
        
     ?>
    </table>
    <button id="myButton" >Volver</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
                location.href = "/Prueba-PHP/index.php";
        };
    </script>

</body>