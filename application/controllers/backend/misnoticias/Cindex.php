<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cindex extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->library('pagination');
		$this->load->model('backend/noticia/Noticia_model');					
	}

	public function index()
	{
		$data['noticias'] = $this->Noticia_model->getNoticias( );
        $this->load->view('backend/misnoticias/Vindex.php', $data );  
	}

	public function editNoticias( $id_noticia )
    {
        $data['noticias'] = $this->Noticia_model->editNoticias( $id_noticia );
        $data['categorias'] = $this->Noticia_model->getCategoriasNoticias(  );
        $this->load->view('backend/misnoticias/VnoticiaEdit.php', $data );        
    }

    public function updateNoticia( $id_noticia ){

        $this->Noticia_model->updateNoticia( $id_noticia , $_POST );
        echo "../misnoticias/Cindex/index/";
    }

    public function nuevaNoticia( ){

    	$data['categorias'] = $this->Noticia_model->getCategoriasNoticias( );

		$this->load->view('backend/misnoticias/VnuevaNoticia.php', $data );     
        //echo "../misnoticias/Cindex/index/";
    }

    public function crearNoticia( ){

    	$data['categorias'] = $this->Noticia_model->crearNoticia( $_POST );

		//$this->load->view('backend/misnoticias/VnuevaNoticia.php', $data );     
        echo "../misnoticias/Cindex/index/";
    }



    
}
