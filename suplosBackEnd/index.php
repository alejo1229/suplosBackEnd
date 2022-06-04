<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div class="divider"></div>
            <div class="cards">
                
            </div>
          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>
            <div class="panel-guardados">
                <?php
                    include("conexion.php");

                    $guardados = "SELECT * FROM guardados";
                    $direccion = '';
                    $resultado = mysqli_query($conexion, $guardados);
                    while($row = mysqli_fetch_assoc($resultado)){
                ?>
                <div class="card-guardada">
                    <img src="img/home.jpg" alt="" style="width:160px">
                    <div class="card-guardada-content">
                        <p><?= $row["id"] ?></p>
                        <p>Dirección:<?= $row["direccion"] ?></p>
                        <p>Ciudad: <?= $row["ciudad"] ?></p>
                        <p>Telefono: <?= $row["telefono"] ?></p>
                        <p>Codigo postal: <?= $row["codigo_postal"] ?></p>
                        <p>Tipo: <?= $row["tipo"] ?></p>
                        <p>Precio: <?= $row["precio"] ?></p>
                        <button class="btn-eliminar" style="width:100%" data-id="<?= $row["id"] ?>">Eliminar</button>
                    </div>
                    
                </div>
                <?php
                    }
                ?>
            </div>
          </div>
        </div>
      
      </div>
      <div id="tabs-3">
          <h2 style="font-size:30px">Exportar reporte:</h2>
          <p style="text-align:center">Filtros</p>
          <form action="generarExcel.php">
          <label for="">Ciudad</label>
          <select name="ciudad2" id="selectCiudad2">
              <option value="" selected>Elige una ciudad</option>
          </select>
          <label for="">Tipo</label>
          <select name="tipo2" id="selectTipo2">
              <option value="" selected>Elige un tipo</option>
          </select>
          <input type="submit" value="Generar"  class="btn-generar-excel" style="width: 100%;margin-top: 10px;height: 30px;border: none;background-color: #983c73;color: white;">
          </form>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
