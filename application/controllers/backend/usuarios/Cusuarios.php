<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cusuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/usuarios/usuarios_model');			
	}

	public function userAdmin(){
		$data['usuario'] = $this->usuarios_model->getUsuarios();
		$this->load->view('backend/usuarios/VuserAdmin.php',$data);
	}

	public function editUsuarios( $id_usuario ){

		$data['usuario'] = $this->usuarios_model->editUsuarios( $id_usuario );
		$this->load->view('backend/usuarios/VeditarUsuario.php',$data);
		
	}


}
