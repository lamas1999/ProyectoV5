<?php
include_once("../clases/conexion.php");
include_once("../clases/usuario.php");
require_once("../clases/ctrl_session.php");
//---------- USES DE LAS CLASES DE NAMESPACES ----
use \clases\ctrl_session\Ctrl_Session;
use \clases\conexion\Conexion;
use \clases\usuario\Usuario;
//-----------------------------------------------
Ctrl_Session::verificar_inicio_session();


$cnx = new Conexion();
$usuario = new Usuario($cnx);

$id = Ctrl_Session::get_id_usuario();
$nombre = "";
$apellido = "";
$email = "";
$login = "";
$password = "";
$telefono = "";
$imagen = "";
$error = "";


if ($usuario->traerporid($id)) {
    $nombre = $usuario->get_nombre();
    $apellido = $usuario->get_apellido();
    $email = $usuario->get_email();
    $login = $usuario->get_login();
    $telefono = $usuario->get_telefono();
    $imagen = $usuario->get_imagen();
}
?>

<?php include("incluir_header.php"); ?>

<?php include("incluir_nav.php"); ?>

<!-- ----------------------- -->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user" aria-hidden="true"></i> Perfil de usuario</h1>
            <p>Datos de usuario</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item">Perfil de usuario</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <label class="col-sm-2">
                            <?php
                            if ($imagen == "") { ?>
                                <img style="border:1px solid #eaeaea;border-radius:50px;" src="../assets/img/login-default.png" width="75">
                            <?php
                            } else { ?>
                                <img style="border:1px solid #eaeaea;border-radius:50px;" src="../fotos/<?php echo $imagen; ?>" width="75">
                            <?php
                            }
                            ?>
                        </label>
                        <label style="font-size:25px;margin-top:10px;"><?php echo $nombre . " " . $apellido; ?></label>
                        <div class="tile-footer"></div>
                  
                        <div class="form-group">
                            <label for="" class=""> <b>Nombre </b></label>
                            <label for="" style="text-align:left">: <?php echo $nombre; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="" class=""> <b>Apellido</b></label>
                            <label for="" style="text-align:left">: <?php echo $apellido; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="" class=""> <b>Email</b></label>
                            <label for="" style="text-align:left">: <?php echo $email; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="" class=""> <b>Login</b></label>
                            <label for="" style="text-align:left">: <?php echo $login; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="" class=""> <b>Telefono </b></label>
                            <label for="" style="text-align:left">: <?php echo $telefono; ?></label>
                        </div>
                                
                        <div class="content">
                            <!--si la varible errores no esta vacia-->
                            <?php if (isset($_GET["msg"])) : ?>
                                <div class="alert alert-dismissible alert-success">
                                    <button class="close" type="button" data-dismiss="alert">×</button> <?php echo $_GET["msg"]; ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </form>
                    <div class="tile-footer">
                        <a href="frm-mperfil.php" class="btn btn-primary">Modificar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- --------------------->
<?php include("incluir_footer.php"); ?>
</body>
</html>