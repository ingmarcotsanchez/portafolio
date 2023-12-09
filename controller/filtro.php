<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Filtro.php");
    $filtro = new Filtro();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){


        /*TODO: Mostrar informacion de l usuario en la vista perfil */
        case "mostrar":
            $datos = $filtro->get_filterXid($_POST["fil_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["fil_id"] = $row["fil_id"];
                    $output["fil_titulo"] = $row["fil_titulo"];
                    $output["fil_enlace"] = $row["fil_enlace"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["fil_id"])){
                $filtro->insert_filter($_POST["fil_titulo"],$_POST["fil_enlace"]);
            }else{
                $filtro->update_filter($_POST["fil_id"],$_POST["fil_titulo"],$_POST["fil_enlace"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $filtro->delete_filter($_POST["fil_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
            $datos=$filtro->get_filter();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["fil_titulo"];
                $sub_array[] = $row["fil_enlace"];
                if($row["est"] == "1"){
                    $sub_array[] = "Activo";
                }else{
                    $sub_array[] = "Inactivo";
                }
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["fil_id"].');"  id="'.$row["fil_id"].'"class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["fil_id"].');"  id="'.$row["fil_id"].'"class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            
            break;
        case "combo":
            $datos=$filtro->get_filter();
            if(is_array($datos)==true and count($datos)>0){
                $html= " <option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row['fil_id']."'>".$row['fil_titulo']."</option>";
                }
                echo $html;
            }
            break;
        
    }