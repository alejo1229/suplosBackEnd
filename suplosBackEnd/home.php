<?php

    include("conexion.php");
    
    $id = $_POST["id"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $telefono = $_POST["telefono"];
    $codigo = $_POST["codigoPostal"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO guardados(id, direccion, ciudad, telefono, codigo_postal, tipo, precio) VALUES ('$id','$direccion','$ciudad','$telefono','$codigo','$tipo','$precio')";
    
    $resultado = mysqli_query($conexion, $query);

    if(!$resultado){
        echo 'Error al insertar';
    }else{
        echo 'Insertado correctamente';
    }

    mysqli_close($conexion);  
?>