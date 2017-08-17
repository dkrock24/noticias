<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupload extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/upload/upload_model');
	}


	//-----Metodo para cargar foto de perfil
	public function upload_avatar()
	{
		$config['upload_path'] = './assets/filesCV/';
		$config['allowed_types'] = 'jpg|png';
		$config['overwrite'] = TRUE;
		//$config['file_name'] = 'archivo.jpg';
		//$config['max_size'] = '200';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config)

		if (!$this->upload->do_upload()) 
		{
			$datos['error'] = $this->upload->display_errors();
			$datos['titulo'] = 'Error en la carga de el archivo';
			$datos['contenido'] = 'upload';
			//$this->load->view();
		} 
		else 
		{
			$datos['success'] = $this->upload->data();
			$datos['titulo'] = 'Carga exitosa';
			$datos['contenido'] = 'upload_success';
			//$this->load->view();	
		}
		
	}

	// Metodo para subir multiples archivos
	public function upload_multi_images('')
	{
		$config['upload_path'] = './assets/images/imagesNoti/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '2048';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config)

		if (!$this->upload->do_multi_upload('imageNoti')) 
		{
			$datos['error'] = $this->upload->display_errors('<p><b>','</b></p>');
			$datos['titulo'] = 'Error en la carga de imagenes';
			$datos['contenido'] = 'upload';
			//$this->load->view();
		} 
		else 
		{
			$datos['success'] = $this->upload->get_multi_upload_data();
			$datos['titulo'] = 'Carga exitosa';
			$datos['contenido'] = 'upload_success_multiple';
			//$this->load->view();	
		}
		
	}

	
	
}
