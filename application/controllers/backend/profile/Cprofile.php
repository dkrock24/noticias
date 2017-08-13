
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprofile extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/profile/profile_model');			
	}

	public function ViewProfile()
	{
		$data['datosProfile'] = $this->profile_model->getUserData($userLogged);	
		$this->load->view('backend/profile/perfil.php', $data);
	}

	public function savePersonalInfo()
	{	

		$this->profile_model->savePersonalInfo($_POST);
	}

	
}
