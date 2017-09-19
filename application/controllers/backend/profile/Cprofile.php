
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprofile extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/profile/profile_model');	
		$this->load->library('My_phpmailer');		
	}

	public function ViewProfile()
	{
		session_start();
		$userLogged = $_SESSION['idUser'];
		$data['datosProfile'] = $this->profile_model->getUserData($userLogged);	
		$this->load->view('backend/profile/perfil.php', $data);
	}

	public function ViewProfileAdmin($userID)
	{
		$userLogged = $userID;
		$data['datosProfile'] = $this->profile_model->getUserData($userID);	
		$this->load->view('backend/profile/perfilAdmin.php', $data);
	}

	public function ViewProfiles()
	{
		$this->load->view('backend/profile/cropper.php');
	}

	public function savePersonalInfo()
	{	

		$this->profile_model->savePersonalInfo($_POST);
	}

	public function desactivarProfile()
	{	

		$this->profile_model->desactivarProfile($_POST);
	}

	public function envioAccessos()
	{	
		$data = $this->profile_model->getUserDatas($_POST['userID']);
		//var_dump($data);
		$nombre = $data[0]['nombres'];
		$usuario = $data[0]['usuario'];
		$email = $data[0]['email'];

		//------------------Generar pass
		$dateToken = date("YmdHis");
        $textName = substr($nombre, 0, 2);
        $pass = $dateToken."@".strtoupper($textName); 

		//-------- Actualizar datos de accessos
		$this->profile_model->updateAccess($_POST['userID'], $pass);

		//----------Enviar accesos al correo
		$urlAddToken = base_url()."backend/index/";

        $mail = new PHPMailer();
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Host = "smtp.gmail.com";  // specify main and backup server
		$mail->Port = 465;
        $mail->Username   = "sisepudosv@gmail.com";  // user email address
        $mail->Password   = "sisepudo2017!";            // password in GMail
        $mail->SetFrom('info@notiinfo.com', 'Noticias Online');  //Who is sending the email
        $mail->Subject    = "Validacion de registro";
        $mail->Body      = "Le damos la bienvenida a la plataforma a continuacion compartimos sus accesos al sistema <br> Usuario: ".$usuario." <br> Contrasena: ".$pass."<br> No se olvide cambiar su contrasena cuando entre al sistema <br>";
        $mail->AltBody    = "Plain text message";
        $destino = $email; // Who is addressed the email to
        $mail->AddAddress($destino, "Envio de credenciales");

        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
           $data["message"] = "Message sent correctly!";
        }
	}

	
}
