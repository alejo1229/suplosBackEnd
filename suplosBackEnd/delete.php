<?php

include("conexion.php");

$id = $_POST["id"];
$eliminar = "DELETE FROM guardados WHERE id = '$id'";

$resultado = mysqli_query($conexion,$eliminar);

if($resultado){
    echo 'Eliminado';
}else{
    echo 'No se pudo eliminar';
}
