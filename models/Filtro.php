<?php
    class Filtro extends Conectar{
        public function get_filter(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM filtros WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_filterXid($fil_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM filtros WHERE est=1 AND fil_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$fil_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_filter($fil_titulo,$fil_enlace){
            $social = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO filtros (fil_id,fil_titulo,fil_enlace,est) VALUES(NULL,?,?,1)";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $fil_titulo);
            $sql->bindValue(2, $fil_enlace);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_filter($fil_id,$fil_titulo,$fil_enlace){
            $social = parent::conexion();
            parent::set_names();
            $sql="UPDATE filtros 
                    SET
                        fil_titulo = ?,
                        fil_enlace = ?
                    WHERE
                        fil_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $fil_titulo);
            $sql->bindValue(2, $fil_enlace);
            $sql->bindValue(3, $fil_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_filter($fil_id){
            $social = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM filtros WHERE fil_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$fil_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }