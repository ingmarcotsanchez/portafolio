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
    }