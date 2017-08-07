<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cregistro extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/registro/registro_model');			
	}

	public function Autoregistro(){
		$this->load->view('backend/registro/VAutoRegistro');
	}

	public function saveRegistro()
	{

		$this->registro_model->save_registro($_POST, $_FILES);
		$this->load->view('backend/registro/Autoregistro');
	}
	
}
