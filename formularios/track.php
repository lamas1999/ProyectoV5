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
            <h1><i class="fa fa-globe" aria-hidden="true"></i> Obtner localización</h1>
            <p>Datos de la posisición actual</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item">Obtner localización</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <!-- ------------------- -->
                    <p id="display"></p>
                    <p>
                        This is a demo tracking page.
                        You will normally create a rider login page, or convert this into a webapp.
                    </p>
                    <!-- ------------- -->

                    <script type="text/javascript">
                        var track = {
                            display: null, // Holder for the <p> element, for visual feedback
                            rider: 999, // Rider ID - Hardcode this somewhere in your own system session or in the web app
                            delay: 20000, // Delay in between each position update, in milliseconds
                            timer: null, // Holder for the interval object
                            update: function() {
                                // track.update() : update server of current location

                                navigator.geolocation.getCurrentPosition(function(pos) {
                                    // AJAX DATA
                                    var data = new FormData();
                                    data.append('req', 'update');
                                    data.append('rider_id', track.rider);
                                    data.append('lat', pos.coords.latitude);
                                    data.append('lng', pos.coords.longitude);

                                    // AJAX
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', "ajax_track.php", true);
                                    xhr.onload = function() {
                                        var res = JSON.parse(this.response);
                                        // OK
                                        if (res.status == 1) {
                                            track.display.innerHTML = 'Lat: ' + pos.coords.latitude + 'Lng: ' + pos.coords.longitude;
                                        }
                                        // ERROR
                                        else {
                                            track.display.innerHTML = res.message;
                                        }
                                    };
                                    xhr.send(data);
                                });
                            }
                        };

                        // INIT ON PAGE LOAD
                        window.addEventListener("load", function() {
                            track.display = document.getElementById("display");
                            if (navigator.geolocation) {
                                // Set on an interval so that you don't drain the smartphone battery
                                // Nor kill the server for the matter
                                track.update();
                                setInterval(track.update, track.delay);
                            } else {
                                track.display.innerHTML = "Geolocation is not supported by your browser!";
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</main>

<?php include("incluir_footer.php"); ?>
</body>

</html>