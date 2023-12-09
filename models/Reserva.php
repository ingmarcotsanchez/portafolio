<?php
    class Reserva extends Conectar{
        public function get_reserva(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT tittle,start FROM reservas";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }