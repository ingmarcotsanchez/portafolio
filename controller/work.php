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
                    $output["fil_id"] = $row["fil_id"];
                    $output["work_img"] = $row["work_img"];
                    $output["work_titulo"] = $row["work_titulo"];
                    $output["work_descripcion"] = $row["work_descripcion"];
                    $output["work_fecha"] = $row["work_fecha"];
                    $output["work_rol"] = $row["work_rol"];
                    $output["work_tecnologia"] = $row["work_tecnologia"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["work_id"])){
                $tmp_dir = $_FILES['work_img']['tmp_name'];
                $imgFile = $_FILES['work_img']['name'];
                $imgSize = $_FILES['work_img']['size'];
                $upload_dir = __DIR__.'/images/proyectos/';
                $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png');
                $imagen = rand(1000,1000000).".".$imgExt;
                if(in_array($imgExt, $valid_extensions)){
                    // Check file size '5MB'
                    if($imgSize < 5000000)    {
                        var_dump(move_uploaded_file($tmp_dir,$upload_dir.$imagen));
                        move_uploaded_file($tmp_dir,$upload_dir.$imagen);
                    }
                    else{
                     $errMSG = "Sorry, your file is too large.";
                    }
                    if(!isset($errMSG)){
                        $work->insert_work($_POST["fil_id"],$imagen,$_POST["work_titulo"],$_POST["work_descripcion"],$_POST["work_fecha"],$_POST["work_rol"],$_POST["work_tecnologia"]);
                    }
                }
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
                if($row["work_rol"] == "D"){
                    $sub_array[] = "Diseñador";
                }elseif($row["work_rol"] == "P"){
                    $sub_array[] = "Programador";
                }elseif($row["work_rol"] == "A"){
                    $sub_array[] = "Diseñador y Programador";
                }else{
                    $sub_array[] = "Asesor";
                }
                
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