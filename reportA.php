<?php
include 'operationsR.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <h1 align="center"><?php echo "CLIENTES CON MAS COMPRAS DE ".strtoupper($_POST["mes"])." ".strtoupper($_POST["anho"]) ?></h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Id Cliente</td>
        <td>Nombre Cliente</td>
        <td>Valor Compra</td>
    </tr>
    <?php 
        $clientes = mejores_clientes_por_mes(strtoupper($_POST["mes"]),$_POST["anho"])->fetchAll();

        if (!$clientes){
            echo "<tr><td colspan=3 style ='text-align:center'>No hay ventas registradas en el año y mes de consulta.</td></tr>";
        }
        else{
            foreach($clientes as $datos){
                ?>
                    <tr>
                        <td><?php echo $datos["IDCLIENTE"]?></td>
                        <td><?php echo $datos["NOMBRE"]?></td>
                        <td><?php echo $datos["COMPRA"]?></td>
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


