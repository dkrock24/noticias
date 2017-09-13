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

	public function Autoregistro()
	{
		$data['paises'] = $this->registro_model->getPaises();	
		$this->load->view('backend/registro/VAutoRegistro', $data);
	}

	public function VregistroCorrecto(){
		$this->load->view('backend/registro/VregistroCorrecto');
	}

	public function saveRegistro()
	{
		
		$dateToken = date("YmdHis");
		$email = $_POST['email'];
        $textName = substr($_POST['nombres'], 0, 2);
        $token = $dateToken."_".strtoupper($textName); 
        $depID = $this->registro_model->getDepartamentoByPais($_POST['pais']);
		$this->registro_model->save_registro($_POST, $_FILES, $token, $depID[0]['id_departamento']);
		$this->envioToken($token, $email);
		$this->load->view('backend/registro/VregistroCorrecto.php');

	}

    public function envioToken($token, $email)
	{

		$urlAddToken = base_url()."backend/registro/Cregistro/VregistroCorrecto";

        $mail = new PHPMailer();
		//$mail->IsSMTP();         // set mailer to use SMTP
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		//$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";  // specify main and backup server
		$mail->Port = 465;
        $mail->Username   = "sisepudosv@gmail.com";  // user email address
        $mail->Password   = "sisepudo2017!";            // password in GMail
        $mail->SetFrom('info@notiinfo.com', 'Noticias Online');  //Who is sending the email
        //$mail->AddReplyTo("blen7777@gmail.com","Notification");  //email address that receives the response
        $mail->Subject    = "Validacion de registro";
        $mail->Body      = "Gracias por querer ser parte de esta plataforma. para 
        poder continuar con el proceso de inscripcion tiene que copiar el siguiente token <b>".$token." </b> y pegar en el este link ->".$urlAddToken;
        $mail->AltBody    = "Plain text message";
        $destino = $email; // Who is addressed the email to
        $mail->AddAddress($destino, "Inscripcion");

        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
           $data["message"] = "Message sent correctly!";
        }
	}

	public function confirmRegister()
	{
		$registerStatus = $this->registro_model->getToken($_POST['code']);
		if (empty($registerStatus))
		{
			echo "0";
		} 
		else 
		{
			$this->registro_model->update_confirmEmail($registerStatus[0]['id_usuario']);
			echo "1";	
		}
	}
	
}
