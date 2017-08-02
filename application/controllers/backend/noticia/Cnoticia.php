<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnoticia extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->model('backend/noticia/Cnoticia_model');			
	}

	public function index()
	{
		$not['menu'] = $this->Cnoticia_model->getMenuNoticias();

		$this->load->view('backend/noticia/VmenuLista.php',$not);
	}
    
	// Crear Noticia
    public function crearMenu(  ){
    	
    	$this->load->view('backend/noticia/VnuevoMenu.php');
    }

    // Guardar Noticia
    public function saveMenu(  ){

    	$this->Cnoticia_model->saveMenuNoticias( $_POST );
    	echo "../noticia/Cnoticia/index";
    }
    

    // Editar Menu Noticia
    public function editMenuNoticia( $menuNoticia  ){
    	$menu['menu'] = $this->Cnoticia_model->editMenuNoticia( $menuNoticia );
    	
        $this->load->view('backend/noticia/VeditMenu.php',$menu);
    }

    // Editar Menu Noticia
    public function saveEditMenuNoticia( $id_menu_noticia  ){
        $menu['menu'] = $this->Cnoticia_model->saveEditMenuNoticia( $id_menu_noticia , $_POST );
        
        echo "../noticia/Cnoticia/index";
    }


    /****************************************|
    |***********     SUB MENUS    ***********|
    |****************************************/

    public function subMenuNoticia( $id_menu )
    {
        $data['sub_menu'] = $this->Cnoticia_model->getSubMenuNoticias( $id_menu );
        $data['id_menu'] = $id_menu;

        $this->load->view('backend/noticia/VsubmenuLista.php',$data);
    }

    public function crearSubMenuNotica( $id_menu )
    {
        $data['id'] = $id_menu;
        $this->load->view('backend/noticia/VsubmenuNuevo.php',$data );
    }

    public function saveSubMenu()
    {
        $this->Cnoticia_model->saveSubMenu( $_POST );
        echo "../noticia/Cnoticia/subMenuNoticia/".$_POST['id'];
    }

    public function editarSubMenu( $id )
    {
        $data['submenu'] = $this->Cnoticia_model->editarSubMenu( $id );
        $this->load->view('backend/noticia/VsubmenuEditar.php', $data );
    }

    public function updateSubMenu( $id_submenu )
    {
        $data['submenu'] = $this->Cnoticia_model->updateSubMenu( $id_submenu, $_POST );
        echo "../noticia/Cnoticia/subMenuNoticia/".$_POST['id'];
    }

    /****************************************|
    |***********     NOTICAS      ***********|
    |****************************************/

    public function getNoticias(  )
    {
        $data['noticias'] = $this->Cnoticia_model->getNoticias( );
        $this->load->view('backend/noticia/Vnoticias.php', $data );
    }
    

}