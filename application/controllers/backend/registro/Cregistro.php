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
		//$this->envio();

		$mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "blen7777@gmail.com";  // user email address
        $mail->Password   = "Pamebeya2017";            // password in GMail
        $mail->SetFrom('info@yourdomain.com', 'Firstname Lastname');  //Who is sending the email
        $mail->AddReplyTo("blen7777@gmail.com","Firstname Lastname");  //email address that receives the response
        $mail->Subject    = "Email subject";
        $mail->Body      = "HTML message";
        $mail->AltBody    = "Plain text message";
        $destino = "blen7777@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "John Doe");

        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "Message sent correctly!";
        }
        //$this->load->view('sent_mail',$data);


		$this->registro_model->save_registro($_POST, $_FILES);
		$this->load->view('backend/registro/VregistroCorrecto.php', $data);

	}

    public function envio()
	{
        $mail = new PHPMailer();
        $mail->SetLanguage('es');
        $mail->FromName = "blen7777@gmail.com";
        $mail->From = "blen7777@gmail.com";
        $mail->Subject = "asunto del mensaje";
        $mail->AddAddress("blen7777@gmail.com");
        $mail->Body = "cuerpo de mensaje";
        $mail->IsHTML(true);
        $mail->Send();
	}
	
}
