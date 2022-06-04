<?php
    include("conexion.php");
    $ciudad = $_GET["ciudad2"];
    $tipo = $_GET["tipo2"];
    $consulta = "SELECT * FROM guardados WHERE ciudad = '$ciudad' AND tipo = '$tipo'";
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table border="1">
    <caption>Reporte</caption>
    <tr>
        <th>id</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Teléfono</th>
        <th>Codigo Postal</th>
        <th>Tipo</th>
        <th>Precio</th>
    </tr>
    <?php
        $resultado = mysqli_query($conexion,$consulta);
        while($row = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["direccion"] ?></td>
        <td><?= $row["ciudad"] ?></td>
        <td><?= $row["telefono"] ?></td>
        <td><?= $row["codigo_postal"] ?></td>
        <td><?= $row["tipo"] ?></td>
        <td><?= $row["precio"] ?></td>
    </tr>
    <?php
        }
        mysqli_free_result($resultado);
    ?>

</table>