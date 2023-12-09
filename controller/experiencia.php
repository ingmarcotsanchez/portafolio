<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Experiencia.php");
    $experiencia = new Experiencia();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){


        /*TODO: Mostrar informacion de l usuario en la vista perfil */
        case "mostrar":
            $datos = $experiencia->get_experienceXid($_POST["exp_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["exp_id"] = $row["exp_id"];
                    $output["exp_titulo"] = $row["exp_titulo"];
                    $output["exp_lugar"] = $row["exp_lugar"];
                    $output["exp_annoIni"] = $row["exp_annoIni"];
                    $output["exp_annoFin"] = $row["exp_annoFin"];
                    $output["exp_tipo"] = $row["exp_tipo"];
                }
                echo json_encode($output);
            }
            break;
       
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["exp_id"])){
                $experiencia->insert_experience($_POST["exp_titulo"],$_POST["exp_lugar"],$_POST["exp_annoIni"],$_POST["exp_annoFin"],$_POST["exp_tipo"]);
            }else{
                $experiencia->update_experience($_POST["exp_id"],$_POST["exp_titulo"],$_POST["exp_lugar"],$_POST["exp_annoIni"],$_POST["exp_annoFin"],$_POST["exp_tipo"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $experiencia->delete_experience($_POST["exp_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
            $datos=$experiencia->get_experience();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["exp_titulo"];
                $sub_array[] = $row["exp_lugar"];
                $sub_array[] = $row["exp_annoIni"];
                $sub_array[] = $row["exp_annoFin"];
                if($row["exp_tipo"] == "A"){
                    $sub_array[] = "Académica";
                }else{
                    $sub_array[] = "Profesional";
                }
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["exp_id"].');"  id="'.$row["exp_id"].'"class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["exp_id"].');"  id="'.$row["exp_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
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