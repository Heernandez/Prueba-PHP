<html>
<body>
    <h2>Buscar Producto por ID</h2>
    <form action="product.php" method="get">
        Ingrese el id del producto: <input type="number" name="idProducto" required><br>
        <input type="submit"  value ="Buscar producto" >
    </form>

    <h2>Listar Productos Existentes</h2>
    <form action="products.php" method="get">
        <input type="submit"  value ="Listado de productos">
    </form>

    <h2>Actualizar Producto por ID</h2>
    <form action="updateProduct.php" method="post">
        Ingrese el id del producto a editar: <input type="number" name="idUpdate"  required><br>
        <input type="submit" value ="Continuar">
    </form>

    <h2>Eliminar Producto por ID</h2>
    <form action="deleteProduct.php" method="post">
        Ingrese el id del producto a eliminar: <input type="number" name="idDelete" required ><br>
        <input type="submit" value ="Continuar">
    </form>

    <h2>Agregar Nuevo Producto </h2>
    <form action="newProduct.php" method="post">
        <input type="submit" value ="Agregar Nuevo Producto">
    </form>

    <h2>Registrar Compra </h2>
    <form action="sale.php" method="post">
        <input type="submit" value ="Realizar Facturacion">
    </form>

    <h2>Reportes </h2>
    <form action="reports.php" method="post">
        <input type="submit" value ="Ir a Generacion de Reportes">
    </form>






