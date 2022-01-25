<?php
include 'operations.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 align="center">DETALLE DE PRODUCTO</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Codigo del Producto</td>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Valor Unitario</td>
        <td>Cantidad Disponible</td>
    </tr>
    <?php 
       $resultado = obtener_producto($_GET["idProducto"]);
       if (!$resultado){
            echo "<tr><td colspan=5 style ='text-align:center'>El producto con id:".$_GET["idProducto"]." no existe...</td></tr>";
       }
       else{
     
        ?>
            <tr>
                <td><?php echo $resultado["IDPRODUCTO"]?></td>
                <td><?php echo $resultado["NOMBRE"]?></td>
                <td><?php echo $resultado["DESCRIPCION"]?></td>
                <td><?php echo $resultado["VALOR_UNIT"]?></td>
                <td><?php echo $resultado["CANT_DISP"]?></td>
            </tr>
        <?php
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