<?php
  /*TODO: Llamando Cadena de Conexion */
  require_once("config/conexion.php");

  if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
    require_once("models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    $usuario->login();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <link href="public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/bracket.css">
    <title>Acceso</title>
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
      <form action="" method="post">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
          <!-- Capturando mensaje de error -->
          <?php
            if (isset($_GET["m"])){
              switch($_GET["m"]){
                case "1";
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong class="d-block d-sm-inline-block-force">Error!</strong> Datos Incorrectos
                    </div>
                  <?php
                break;

                case "2";
                  ?>
                    <div class="alert alert-warning" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong class="d-block d-sm-inline-block-force">Error!</strong> Campos vacios
                    </div>
                  <?php
                break;
              }
            }
          ?>

          <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> MI PORTAFOLIO <span class="tx-normal">]</span></div>

          <div class="tx-center mg-b-30">MARCO TULIO SANCHEZ ESPINOSA</div>

          <div class="form-group">
              <input type="text" id="usu_correo" name="usu_correo" class="form-control" placeholder="Ingrese Correo Electronico">
          </div>
          <div class="form-group">
              <input type="password" id="usu_pass" name="usu_pass" class="form-control" placeholder="Ingrese Contraseña">
          </div>
          <input type="hidden" name="enviar" class="form-control" value="si">
          <button type="submit" class="btn btn-info btn-block">Acceder</button>
        </div>
      </form>
    </div>

    <script src="public/lib/jquery/jquery.js"></script>
    <script src="public/lib/popper.js/popper.js"></script>
    <script src="public/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
