<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cregistro extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/registro/registro_model');
		$this->load->library('My_phpmailer');		
	}

	public function Autoregistro(){
		$this->load->view('backend/registro/VAutoRegistro');
	}

	public function saveRegistro()
	{
		
		$dateToken = date("YmdHis");
        $textName = substr($_POST['nombres'], 0, 2);
        $token = $dateToken."_".strtoupper($textName); 
		$this->registro_model->save_registro($_POST, $_FILES, $token);
		$this->envio($token);
		$this->load->view('backend/registro/VregistroCorrecto.php');

	}

    public function envio($token)
	{
       $mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		//$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";  // specify main and backup server
		$mail->Port = 465;
        $mail->Username   = "blen7777@gmail.com";  // user email address
        $mail->Password   = "2017@Pamebeya";            // password in GMail
        $mail->SetFrom('info@notiinfo.com', 'Noticias Online');  //Who is sending the email
        $mail->AddReplyTo("blen7777@gmail.com","Notification");  //email address that receives the response
        $mail->Subject    = "Validacion de registro";
        $mail->Body      = "Gracias por querer ser parte de esta plataforma. para 
        poder contienual con el proceso de inscripcion tiene que compiar el siguiente token
        en la input que se te pide en la plataforma ".$token;
        $mail->AltBody    = "Plain text message";
        $destino = $email; // Who is addressed the email to
        $mail->AddAddress($destino, "Enscripcion");

        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "Message sent correctly!";
        }
	}
	
}
