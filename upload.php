<?php

include 'operations.php';

if(isset($_POST['SubmitButton'])){

$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false){
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    $estatus = agregar_producto($_POST,$imgContent);
    if($estatus){
        echo "<h3>Producto Creado correctamente.</h3>";
        $exito = true;  
    }
    else{
        echo "No se pudo crear el nuevo producto.<br>$estatus";
    }
}
}

?>