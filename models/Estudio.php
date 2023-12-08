<?php
    class Estudio extends Conectar{
        public function get_curriculum(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM estudios WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_curriculumXid($est_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM estudios WHERE est=1 AND est_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$est_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_curriculum($est_titulo,$est_lugar,$est_anno,$est_tipo){
            $social = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO estudios (est_id,est_titulo,est_lugar,est_anno,est_tipo,est) VALUES(NULL,?,?,?,?,1)";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $est_titulo);
            $sql->bindValue(2, $est_lugar);
            $sql->bindValue(3, $est_anno);
            $sql->bindValue(4, $est_tipo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_curriculum($est_id,$est_titulo,$est_lugar,$est_anno,$est_tipo){
            $social = parent::conexion();
            parent::set_names();
            $sql="UPDATE estudios 
                    SET
                        est_titulo = ?,
                        est_lugar = ?,
                        est_anno = ?,
                        est_tipo = ?
                    WHERE
                        est_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $est_titulo);
            $sql->bindValue(2, $est_lugar);
            $sql->bindValue(3, $est_anno);
            $sql->bindValue(4, $est_tipo);
            $sql->bindValue(5, $est_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_curriculum($est_id){
            $social = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM estudios WHERE est_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$est_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }