<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Clientes.php");
    $clientes = new Clientes();
    require_once("../models/Email.php");

    $email = new Email();
    switch($_GET["opc"]){
        case "guardarCliente":
            $datos = $clientes->get_correo($_POST["cli_correo"]);
            if(is_array($datos)==true and count($datos)==0){
                $clientes->insert_clientes($_POST["cli_nombre"],$_POST["cli_correo"],$_POST["cli_telef"],$_POST["cli_asunto"],$_POST["cli_mensaje"]);
                echo 1;
            }else{
                echo 2;
            }
            break;
        case "emailBienvenida":
            $email->email_bienvenida($_POST["cli_correo"]);
            break;
        case "guardaryeditar":
            if(empty($_POST["cli_id"])){
                $clientes->insert_clientes($_POST["cli_nombre"],$_POST["cli_correo"],$_POST["cli_telef"],$_POST["cli_asunto"],$_POST["cli_mensaje"]);
            }else{
                $clientes->update_clientes($_POST["cli_id"],$_POST["cli_nombre"],$_POST["cli_correo"],$_POST["cli_telef"],$_POST["cli_asunto"],$_POST["cli_mensaje"],$_POST["est"]);
            }
            break;
        case "mostrar":
            $datos=$clientes->get_clientesXid($_POST["cli_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["cli_id"] = $row["cli_id"];
                    $output["cli_nombre"] = $row["cli_nombre"];
                    $output["cli_correo"] = $row["cli_correo"];
                    $output["cli_telef"] = $row["cli_telef"];
                    $output["cli_asunto"] = $row["cli_asunto"];
                    $output["cli_mensaje"] = $row["cli_mensaje"];
                    $output["est"] = $row["est"];
                }
                echo json_encode($output);
            }
            break;
        case "eliminar":
            $clientes->delete_clientes($_POST["cli_id"]);
            break;
        case "top5":
            $datos=$clientes->get_clientes_top5();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cli_nombre"];
                $sub_array[] = $row["cli_correo"];
                $sub_array[] = $row["cli_telef"];
                $sub_array[] = $row["fech_crea"];
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
            break;
        case "listar":
            $datos=$clientes->get_clientes();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cli_nombre"];
                $sub_array[] = $row["cli_correo"];
                $sub_array[] = $row["cli_telef"];
                $sub_array[] = $row["cli_asunto"];
                $sub_array[] = $row["cli_mensaje"];
                if($row["est"] == 1){
                    $sub_array[] = "<p style='color:#28a745;font-weight:bold;'>Interesado</p>"; 
                }elseif ($row["est"] == 2){
                    $sub_array[] = "<p style='color:#20c997'>Citado</p>";  
                }elseif ($row["est"] == 3){
                    $sub_array[] = "<p style='color:#ffc107'>No responde</p>"; 
                }elseif ($row["est"] == 4){
                    $sub_array[] = "<p style='color:#fd7e14'>Dudando</p>"; 
                }else{
                    $sub_array[] = "<p style='color:#dc3545'>Desinteresado</p>"; 
                }
             
                $sub_array[] = '<button type="button" class="btn btn-outline-warning btn-icon" onClick="editar('.$row["cli_id"].')" id="'.$row["cli_id"].'"><div><i class="fa fa-edit"></i></div></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
            break;
    }