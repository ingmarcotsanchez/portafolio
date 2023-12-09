<?php
  /* Llamamos al archivo de conexion.php */
  require_once("../config/conexion.php");
  if(isset($_SESSION["usu_id"])):
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("modulos/MainHead.php"); ?>

    <title>Mi Experiencia</title>
  </head>

  <body>

    <?php require_once("modulos/MainMenu.php"); ?>

    <?php require_once("modulos/MainHeader.php"); ?>

    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Mi Experiencia</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Mi Experiencia Laboral</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Mantenimiento</h6>
            <p class="mg-b-30 tx-gray-600">Mi Experiencia Laboral</Label></p>

            <button class="btn btn-outline-primary" id="add_button" onclick="nuevo()"><i class="fa fa-plus-square mg-r-10"></i> Nuevo Registro</button>

            <p></p>

            <div class="table-wrapper"></div>
                <table id="experiencia_data" class="table display responsive wrap">
                <thead>
                    <tr>
                      <th class="wd-15p">Título</th>
                      <th class="wd-15p">Lugar</th>
                      <th class="wd-15p">Año Inicio</th>
                      <th class="wd-15p">Año Final</th>
                      <th class="wd-20p">Tipo</th>
                      <th class="wd-10p"></th>
                      <th class="wd-10p"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                </table>
            </div>

        </div>
      </div>
    </div>

    <?php require_once("mntModalexperiencias.php"); ?>

    <?php require_once("modulos/MainJs.php"); ?>
    <script type="text/javascript" src="js/mntExperiencia.js"></script>
  </body>
</html>
<?php
  else:
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
?>
<?php endif; ?>