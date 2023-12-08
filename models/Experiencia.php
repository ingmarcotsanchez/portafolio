<?php
    class Experiencia extends Conectar{
        public function get_experience(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM experiencia WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_experienceXid($exp_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM experiencia WHERE est=1 AND exp_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$exp_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_experience($exp_titulo,$exp_lugar,$exp_annoIni,$exp_annoFin,$exp_tipo){
            $social = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO experiencia (exp_id,exp_titulo,exp_lugar,exp_annoIni,exp_annoFin,exp_tipo,est) VALUES(NULL,?,?,?,?,?,1)";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $exp_titulo);
            $sql->bindValue(2, $exp_lugar);
            $sql->bindValue(3, $exp_annoIni);
            $sql->bindValue(4, $exp_annoFin);
            $sql->bindValue(5, $exp_tipo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_experience($exp_id,$exp_titulo,$exp_lugar,$exp_annoIni,$exp_annoFin,$exp_tipo){
            $social = parent::conexion();
            parent::set_names();
            $sql="UPDATE experiencia 
                    SET
                        exp_titulo = ?,
                        exp_lugar = ?,
                        exp_annoIni = ?,
                        exp_annoFin = ?,
                        exp_tipo = ?
                    WHERE
                        exp_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $exp_titulo);
            $sql->bindValue(2, $exp_lugar);
            $sql->bindValue(3, $exp_annoIni);
            $sql->bindValue(4, $exp_annoFin);
            $sql->bindValue(5, $exp_tipo);
            $sql->bindValue(6, $exp_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_experience($exp_id){
            $social = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM experiencia WHERE exp_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$exp_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }