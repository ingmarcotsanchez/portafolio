<?php
    class Work extends Conectar{
        public function get_work(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM work WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_works(){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT
            work.work_id,
            filtros.fil_id,
            filtros.fil_titulo,
            filtros.fil_enlace,
            work.work_img,
            work.work_titulo,
            work.work_descripcion,
            work.work_fecha,
            work.work_rol,
            work.work_tecnologia,
            work.est
            FROM work
            INNER JOIN filtros on work.fil_id = filtros.fil_id";
            $sql=$social->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_worksXid($fil_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT
            work.work_id,
            filtros.fil_id,
            filtros.fil_titulo,
            filtros.fil_enlace,
            work.work_img,
            work.work_titulo,
            work.work_descripcion,
            work.work_fecha,
            work.work_rol,
            work.work_tecnologia,
            work.est
            FROM work
            INNER JOIN filtros on work.fil_id = filtros.fil_id
            WHERE work.fil_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$fil_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_workXid($work_id){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM work WHERE est=1 AND work_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$work_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_work($fil_id,$work_img,$work_titulo,$work_descripcion,$work_fecha,$work_rol,$work_tecnologia){
            $social = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO work (work_id,fil_id,work_img,work_titulo,work_descripcion,work_fecha,work_rol,work_tecnologia,est) VALUES(NULL,?,?,?,?,?,?,?,1)";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $fil_id);
            $sql->bindValue(2, $work_img);
            $sql->bindValue(3, $work_titulo);
            $sql->bindValue(4, $work_descripcion);
            $sql->bindValue(5, $work_fecha);
            $sql->bindValue(6, $work_rol);
            $sql->bindValue(7, $work_tecnologia);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_work($work_id,$fil_id,$work_img,$work_titulo,$work_descripcion,$work_fecha,$work_rol,$work_tecnologia){
            $social = parent::conexion();
            parent::set_names();
            $sql="UPDATE work 
                    SET
                        fil_id = ?,
                        work_img = ?,
                        work_titulo = ?,
                        work_descripcion = ?,
                        work_fecha = ?,
                        work_rol = ?,
                        work_tecnologia = ?
                    WHERE
                        work_id = ?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1, $fil_id);
            $sql->bindValue(2, $work_img);
            $sql->bindValue(3, $work_titulo);
            $sql->bindValue(4, $work_descripcion);
            $sql->bindValue(5, $work_fecha);
            $sql->bindValue(6, $work_rol);
            $sql->bindValue(7, $work_tecnologia);
            $sql->bindValue(8, $work_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_work($work_id){
            $social = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM work WHERE work_id=?";
            $sql=$social->prepare($sql);
            $sql->bindValue(1,$work_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }