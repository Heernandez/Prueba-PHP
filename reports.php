<html>
<body>
    <h2>Clientes con mas compras por mes</h2>
    <div id="div1">
        <form action="reportA.php" method="post">
            <select name="mes" id="mes">
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
            <select name="anho" id="anho">
                <?php 
                    $fecha = date("d-m-Y");  
                    $anho = (int)(string)(date("Y"));
                    echo "el año es $anho";
                    
                    for($i=0;$i<=3;$i++){
                ?>
                        <option value=<?php echo $anho-$i ?>><?php echo $anho-$i ?></option>

                <?php
                    }
                ?>
            </select>
            <input type="submit" value ="Consultar">
        </form>
    </div>

    <h2> Producto Mas Vendidos del Mes</h2>
    <div id="div2">
        <form action="reportB.php" method="post">
            <select name="mes" id="mes">
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
            <select name="anho" id="anho">
                <?php 
                    $fecha = date("d-m-Y");  
                    $anho = (int)(string)(date("Y"));
                    echo "el año es $anho";
                    
                    for($i=0;$i<=3;$i++){
                ?>
                        <option value=<?php echo $anho-$i ?>><?php echo $anho-$i ?></option>

                <?php
                    }
                ?>
            </select>
            <input type="submit" value ="Consultar">
        </form>
    </div>
    <h2> Valor Compras por Producto de Cada Cliente por Mes</h2>
    <div id="div3">
        <form action="reportC.php" method="post">
            <label>Fecha Inicio</label>
            <input type="date" id="FechaInicio" name="FechaInicio"
                    value ="2022-01-01"
                    min = "2018-01-01" max="2022-12-31">
            <label>Fecha Fin</label>
            <input type="date" id="FechaFin" name="FechaFin"
                    value ="2022-01-01"
                    min = "2018-01-01" max="2022-12-31">
            <input type="submit" value ="Consultar">
        </form>
    </div>

    <button id="myButton" >Volver</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
                location.href = "/Prueba-PHP/index.php";
        };
    </script>

</body>
</html>