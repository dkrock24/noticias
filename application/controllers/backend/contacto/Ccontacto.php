<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccontacto extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->library('pagination');
		$this->load->model('backend/noticia/Cnoticia_model');		
	}

	public function index()
	{
		$data['contacto'] = $this->Cnoticia_model->getContacto();

		$this->load->view('backend/noticia/Vcontactos.php',$data);
	}
}