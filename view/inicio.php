<?php
  /* Llamamos al archivo de conexion.php */
  require_once("../config/conexion.php");
  if(isset($_SESSION["usu_id"])):
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("modulos/MainHead.php"); ?>
    <title>Empresa::Home</title>
  </head>

  <body>
    <?php require_once("modulos/MainMenu.php"); ?>
    <?php require_once("modulos/MainHeader.php"); ?>
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        <p class="mg-b-0">Do big things with Bracket, the responsive bootstrap 4 admin template.</p>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today's Visits</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">1,975,224</p>
                  <span class="tx-11 tx-roboto tx-white-6">24% higher yesterday</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today Sales</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">$329,291</p>
                  <span class="tx-11 tx-roboto tx-white-6">$390,212 before tax</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">54.45%</p>
                  <span class="tx-11 tx-roboto tx-white-6">23% average duration</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">32.16%</p>
                  <span class="tx-11 tx-roboto tx-white-6">65.45% on average time</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
        <div class="col-lg-12">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">TOP 10 Clientes</h6>
              </div><!-- card-header -->
              <table class="table table-responsive mg-b-0 tx-12">
                <thead>
                  <tr class="tx-10">
                    <th class="wd-10p pd-y-5">&nbsp;</th>
                    <th class="pd-y-5">Nombre</th>
                    <th class="pd-y-5">Estado</th>
                    <th class="pd-y-5">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pd-l-20">
                      <img src="http://via.placeholder.com/280x280" class="wd-36 rounded-circle" alt="Image">
                    </td>
                    <td>
                      <a href="" class="tx-inverse tx-14 tx-medium d-block">Mark K. Peters</a>
                      <span class="tx-11 d-block">TRANSID: 1234567890</span>
                    </td>
                    <td class="tx-12">
                      <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Email verified
                    </td>
                    <td>Just Now</td>
                  </tr>
                  <tr>
                    <td class="pd-l-20">
                      <img src="http://via.placeholder.com/280x280" class="wd-36 rounded-circle" alt="Image">
                    </td>
                    <td>
                      <a href="" class="tx-inverse tx-14 tx-medium d-block">Karmen F. Brown</a>
                      <span class="tx-11 d-block">TRANSID: 1234567890</span>
                    </td>
                    <td class="tx-12">
                      <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Pending verification
                    </td>
                    <td>Apr 21, 2017 8:34am</td>
                  </tr>
                  <tr>
                    <td class="pd-l-20">
                      <img src="http://via.placeholder.com/280x280" class="wd-36 rounded-circle" alt="Image">
                    </td>
                    <td>
                      <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                      <span class="tx-11 d-block">TRANSID: 1234567890</span>
                    </td>
                    <td class="tx-12">
                      <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Purchased success
                    </td>
                    <td>Apr 10, 2017 4:40pm</td>
                  </tr>
                  <tr>
                    <td class="pd-l-20">
                      <img src="http://via.placeholder.com/280x280" class="wd-36 rounded-circle" alt="Image">
                    </td>
                    <td>
                      <a href="" class="tx-inverse tx-14 tx-medium d-block">Ariel T. Hall</a>
                      <span class="tx-11 d-block">TRANSID: 1234567890</span>
                    </td>
                    <td class="tx-12">
                      <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Payment on hold
                    </td>
                    <td>Apr 02, 2017 6:45pm</td>
                  </tr>
                  <tr>
                    <td class="pd-l-20">
                      <img src="http://via.placeholder.com/280x280" class="wd-36 rounded-circle" alt="Image">
                    </td>
                    <td>
                      <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                      <span class="tx-11 d-block">TRANSID: 1234567890</span>
                    </td>
                    <td class="tx-12">
                      <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                    </td>
                    <td>Mar 30, 2017 10:30am</td>
                  </tr>
                </tbody>
              </table>
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href=""><i class="fa fa-angle-down mg-r-5"></i>Ampliar información</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->

      </div><!-- br-pagebody -->
      <footer class="br-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Bracket. All Rights Reserved.</div>
          <div>Attentively and carefully made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <?php require_once("modulos/MainJs.php"); ?>
    <script type="text/javascript" src="js/inicio.js"></script>
  </body>
</html>
<?php
  else:
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
?>
<?php endif; ?>
