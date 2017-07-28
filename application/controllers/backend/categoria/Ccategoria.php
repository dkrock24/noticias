<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccategoria extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/categoria/Categoria_model');			
	}

	public function index()
	{
		$cat['categoria'] = $this->Categoria_model->getCategoria();

		$this->load->view('backend/categoria/Vcategoria.php',$cat);
	}

	// Edita la categoria
    public function editCategoria( $categoria ){
    	$cat = $this->Categoria_model->editCategoria( $categoria );
    	echo json_encode( $cat );
    }

    // Actualizar la categoria
    public function actualizarCategoria( $categoria ){

    	$cat = $this->Categoria_model->actualizarCategoria( $_POST );
    	$this->index();
    }

    // Desabilita la categoria por su ID
    public function inactivarCategoria( $id_categoria , $estado ){
    	$cat = $this->Categoria_model->inactivarCategoria( $id_categoria , $estado );
    	echo "../categoria/Ccategoria/index";
    }
}