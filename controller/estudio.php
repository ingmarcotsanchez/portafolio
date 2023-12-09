<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Estudio.php");
    $estudio = new Estudio();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){


        /*TODO: Mostrar informacion de l usuario en la vista perfil */
        case "mostrar":
            $datos = $estudio->get_curriculumXid($_POST["est_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["est_titulo"] = $row["est_titulo"];
                    $output["est_lugar"] = $row["est_lugar"];
                    $output["est_anno"] = $row["est_anno"];
                    $output["est_tipo"] = $row["est_tipo"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Actualizar datos de perfil */
        case "modificar":
            $estudio->update_curriculum(
                $_POST["est_id"],
                $_POST["est_titulo"],
                $_POST["est_lugar"],
                $_POST["est_anno"],
                $_POST["est_tipo"]
            );
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["est_id"])){
                $estudio->insert_curriculum($_POST["est_titulo"],$_POST["est_lugar"],$_POST["est_anno"],$_POST["est_tipo"]);
            }else{
                $estudio->update_curriculum($_POST["est_id"],$_POST["est_titulo"],$_POST["est_lugar"],$_POST["est_anno"],$_POST["est_tipo"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $estudio->delete_curriculum($_POST["est_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
            $datos=$estudio->get_curriculum();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["est_titulo"];
                $sub_array[] = $row["est_lugar"];
                $sub_array[] = $row["est_anno"];
                if($row["est_tipo"] == "E"){
                    $sub_array[] = "Educación";
                }else{
                    $sub_array[] = "Cursos";
                }
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["est_id"].');"  id="'.$row["est_id"].'"class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["est_id"].');"  id="'.$row["est_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
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