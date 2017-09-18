<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->library('pagination');
		$this->load->model('noticia/Noticia_model');			
	}

	public function index()
	{
		$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp"));
    	$pais = $dataArray->geoplugin_countryCode;

		$config = array();
		$config['base_url'] = base_url().'/noticia/index/index';

		$Total_temp = $this->Noticia_model->record_count();
		$total_row = $Total_temp[0]->total;

		// Set total rows in the result set you are creating pagination for.

		$config["total_rows"] = $total_row;
		$config['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';

		// Number of items you intend to show per page.
		$config["per_page"] = 10;

		// Use pagination number for anchor URL.
		$config['use_page_numbers'] = TRUE;

		//Set that how many number of pages you want to view.
		$config['num_links'] = $total_row;

		// Open tag for CURRENT link.
		$config['cur_tag_open'] = '&nbsp;<a class="current">';

		// Close tag for CURRENT link.
		$config['cur_tag_close'] = '</a>';

		// By clicking on performing NEXT pagination.
		$config['next_link'] = 'Siguiente';

		// By clicking on performing PREVIOUS pagination.
		$config['prev_link'] = 'Anterior';

		// To initialize "$config" array and set to pagination library.
		$this->pagination->initialize($config);
		//var_dump($this->uri->segment(4));
		if($this->uri->segment(4))
		{
			$pagina = $this->uri->segment(4);

			$page = (($pagina-1) * $config["per_page"]) ;
		}
		else
		{
			$page = 0;
		}
		//echo $config["per_page"]. " + ".$page;
		$data["noticias"] = $this->Noticia_model->fetch_data($config["per_page"] , $page ,$pais );
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		//var_dump($str_links);




		//$data['noticias'] = $this->Noticia_model->getNoticias();
		$this->load->view('noticia/index.php',$data);
	}

	public function detalle( $id_noticia )
	{
	

		$data['noticias_detalle'] 	= $this->Noticia_model->getNoticiasDetalle( $id_noticia );
		$data['noticias_img']		= $this->Noticia_model->getNoticiasImg( $id_noticia );
		$data['visitas'] 			= $this->getContadorVisitas(  $id_noticia );
		$data['contador_cmt']		= $this->getContadorComentarios(  $id_noticia );

		
		$data['comentarios'] 		= $this->Noticia_model->getComentarios( $id_noticia );
	
		if(isset($_COOKIE["noticia".$data['noticias_detalle'][0]->id_noticia]))
	    {
	        $visita = $_COOKIE["noticia".$data['noticias_detalle'][0]->id_noticia];
	    }
	    else
	    {
	        //$visita = gethostbyaddr($_SERVER['SERVER_ADDR']);
	        setcookie("noticia".$data['noticias_detalle'][0]->id_noticia, $data['noticias_detalle'][0]->id_noticia);
	        $this->getInsertVisitas( $id_noticia );
	    }

		$this->load->view('noticia/detalle.php',$data);
	}

	// Insertar visita por noticia
	public function getInsertVisitas( $id_noticia ){
		$this->Noticia_model->getInsertVisitas( $id_noticia );
	}

	// Obtener el total de vistas por noticia
	public function getContadorVisitas( $id_noticia ){
		return $total_visitas = $this->Noticia_model->getContadorVisitas( $id_noticia );
	}

	// Obtener el total de vistas por noticia
	public function getContadorComentarios( $id_noticia ){
		return $total_cmt = $this->Noticia_model->getContadorComentarios( $id_noticia );
	}

	// Insertar comentatrios
	public function insert_comentarios( ){

		$this->Noticia_model->insert_comentarios( $_POST );

		$this->detalle( $_POST['id_noticia'] );
	}

	// Insertar comentatrios
	public function insert_respuesta( ){

		$this->Noticia_model->insert_respuesta( $_POST );

		$this->detalle( $_POST['id_noticia'] );
	}

	public function contactanos(){
		$this->load->view('noticia/contactanos.php');
	}

	public function guarda_contacto(){

		$this->Noticia_model->guarda_contacto( $_POST );
		
		$this->load->view('noticia/contactanos.php');
	}

	
}