<?php
    class Informacion extends Conectar{
        public function get_info(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM info_personal WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_infoXid($info_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM info_personal WHERE est=1 AND info_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$info_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_info($info_nacimiento,$info_celular,$info_email,$info_url,$info_direccion,$info_cargo){
            $social = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO info_personal (info_id,info_nacimiento,info_celular,info_email,info_url,info_direccion,info_cargo,est) VALUES(NULL,?,?,?,?,?,?,1)";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $info_nacimiento);
            $sql->bindValue(2, $info_celular);
            $sql->bindValue(3, $info_email);
            $sql->bindValue(4, $info_url);
            $sql->bindValue(5, $info_direccion);
            $sql->bindValue(6, $info_cargo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_info($info_id,$info_nacimiento,$info_celular,$info_email,$info_url,$info_direccion,$info_cargo){
            $social = parent::conexion();
            parent::set_names();
            $sql="UPDATE info_personal 
                    SET
                        info_nacimiento = ?,
                        info_celular = ?,
                        info_email = ?,
                        info_url = ?,
                        info_direccion = ?,
                        info_cargo = ?
                    WHERE
                        info_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $info_nacimiento);
            $sql->bindValue(2, $info_celular);
            $sql->bindValue(3, $info_email);
            $sql->bindValue(4, $info_url);
            $sql->bindValue(5, $info_direccion);
            $sql->bindValue(6, $info_cargo);
            $sql->bindValue(7, $info_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_info($info_id){
            $social = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM info_personal WHERE info_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$info_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }