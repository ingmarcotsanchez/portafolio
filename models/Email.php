<?php
require('class.phpmailer.php');
include("class.smtp.php");

class Email extends PHPMailer{
    protected $gCorreo="ing.marcotsanchez@gmail.com";//Correo Electronico 
    protected $gContrasena="M@s@6704";//Contraseña del la cuenta de correo

   


    public function email_bienvenida($cli_correo){
        $this->IsSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->FromName = "Bienvenido";
        $this->CharSet = 'UTF8';
        $this->addAddress($cli_correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Bienvenido";
        $cuerpo = file_get_contents('../public/Template_Bienvenida.html');
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Descuentos");
        return $this->Send();
    }
}
?>