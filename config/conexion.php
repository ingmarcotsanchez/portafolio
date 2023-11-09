<?php
    class Conectar{
        protected $dbh;
        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=cv","root","");
                print_r("estoy conectado");
                return $conectar;
            }catch(Exception $e){
                print "Error en la BD" . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function setnames(){
            return $this->dbh->query("SET NAMES 'utf-8'");
        }

        public static function ruta(){
            return "http://localhost/Portafolio";
        }
    }