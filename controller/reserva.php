<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Reserva.php");
    $reserva = new Reserva();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){
        case "mostrar":
            $datos = $reserva->get_reserva();
            //if(is_array($datos)==true and count($datos)<>0){
            //    foreach($datos as $row){
            //        $output["res_titulo"] = $row["res_titulo"];
            //        $output["res_fecha"] = $row["res_fecha"];
            //    }
                echo json_encode($datos);
                var_dump($datos);
            //}
            break;
    }
