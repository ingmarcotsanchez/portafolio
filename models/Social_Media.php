<?php
    class SocialMedia extends Conectar{
        public function get_socialMedia(){
            $social = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM social_media WHERE est=1";
            $sql=$social->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }