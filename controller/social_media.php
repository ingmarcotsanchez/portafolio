<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Social_Media.php");
    $social_media = new SocialMedia();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){


        /*TODO: Mostrar informacion de l usuario en la vista perfil */
        case "mostrar":
            $datos = $social_media->get_socialMediaXid($_POST["socmed_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["socmed_icono"] = $row["socmed_icono"];
                    $output["socmed_url"] = $row["socmed_url"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Actualizar datos de perfil */
        case "modificar":
            $social_media->update_socialMedia(
                $_POST["socmed_id"],
                $_POST["socmed_icono"],
                $_POST["socmed_url"]
            );
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["socmed_id"])){
                $social_media->insert_socialMedia($_POST["socmed_icono"],$_POST["socmed_url"]);
            }else{
                $social_media->update_socialMedia($_POST["socmed_id"],$_POST["socmed_icono"],$_POST["socmed_url"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $social_media->delete_socialMedia($_POST["socmed_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
            $datos=$social_media->get_socialMedia();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["socmed_icono"];
                $sub_array[] = $row["socmed_url"];
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["socmed_id"].');"  id="'.$row["socmed_id"].'"class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["socmed_id"].');"  id="'.$row["socmed_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
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