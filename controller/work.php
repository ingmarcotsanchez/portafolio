<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Work.php");
    $work = new Work();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){


        /*TODO: Mostrar informacion de l usuario en la vista perfil */
        case "mostrar":
            $datos = $work->get_workXid($_POST["work_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["work_id"] = $row["work_id"];
                    $output["est_titulo"] = $row["est_titulo"];
                    $output["est_lugar"] = $row["est_lugar"];
                    $output["est_anno"] = $row["est_anno"];
                    $output["est_tipo"] = $row["est_tipo"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["work_id"])){
                $work->insert_work($_POST["fil_id"],$_POST["work_img"],$_POST["work_titulo"],$_POST["work_descripcion"],$_POST["work_fecha"],$_POST["work_rol"],$_POST["work_tecnologia"]);
            }else{
                $work->update_work($_POST["work_id"],$_POST["fil_id"],$_POST["work_img"],$_POST["work_titulo"],$_POST["work_descripcion"],$_POST["work_fecha"],$_POST["work_rol"],$_POST["work_tecnologia"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $work->delete_work($_POST["work_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
            $datos=$work->get_works();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["fil_enlace"];
                $sub_array[] = $row["work_titulo"];
                $sub_array[] = $row["work_fecha"];
                $sub_array[] = $row["work_rol"];
                $sub_array[] = $row["work_tecnologia"];
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["work_id"].');"  id="'.$row["work_id"].'"class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["work_id"].');"  id="'.$row["work_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            
            break;
        
    }