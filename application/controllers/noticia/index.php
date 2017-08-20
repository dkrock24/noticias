<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('noticia/Noticia_model');			
	}

	public function index()
	{
		$data['noticias'] = $this->Noticia_model->getNoticias();
		$this->load->view('noticia/index.php',$data);
	}

	public function detalle( $id_noticia )
	{
		$data['noticias_detalle'] = $this->Noticia_model->getNoticiasDetalle( $id_noticia );
		$this->load->view('noticia/detalle.php',$data);
	}
}