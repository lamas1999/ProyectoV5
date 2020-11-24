<?php
include_once("../clases/conexion.php");
include_once("../clases/usuario.php");
require_once("../clases/ctrl_session.php");


//---------- USES DE LAS CLASES DE NAMESPACES ----
use \clases\ctrl_session\Ctrl_Session;
//-----------------------------------------------
Ctrl_Session::verificar_inicio_session();

use \clases\conexion\Conexion;
use \clases\usuario\Usuario;


$cnx = new Conexion();
$usuario = new Usuario($cnx);

$id = Ctrl_Session::get_id_usuario();
$nombre = "";
$apellido = "";
$imagen = "";

if ($usuario->traerporid($id)) {
    $nombre = $usuario->get_nombre();
    $apellido = $usuario->get_apellido();
    $imagen = $usuario->get_imagen();
}
?>

<?php include("incluir_header.php"); ?>

<?php include("incluir_nav.php"); ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-map-marker" aria-hidden="true"></i> Geolocalización</h1>
            <p>Inicia la busqueda en el mapa</p>
        <div id="menu-mapa">
            <input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked" />
            <label for="streets-v11">Mapa</label>
            <input id="satellite-v9" type="radio" name="rtoggle" value="satellite" />
            <label for="satellite-v9">Satélite</label>
        </div>
  
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        </ul>
    </div>

    <div id="map" class="mapa tile">  </div> 
    <script src="../assets/js/scrip-mapbox.js"></script>
 
   
    
</main>

<?php include("incluir_footer.php"); ?>
</body>

</html>