<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cimagenes extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');		
		$this->load->database('default');	
		$this->load->library('pagination');
		$this->load->model('backend/noticia/cimages_model');					
	}


    public function crearNoticiaOnly( )
    {
        $IdNewsInsert = $this->cimages_model->crearNoticia( $_POST );
        if (empty($IdNewsInsert)) 
        {
            return  "No se pudo realizar el insercion del registro";
        }
       echo $IdNewsInsert;
    }

    //-----Metodo para cargar foto de perfil
    public function do_upload()
    {
        //var_dump($_FILES);
        //var_dump($_POST);
        $imageName = date("YmdHis");
        $config['upload_path'] = './assets/imagenes_noticias/';
        $config['allowed_types'] = "*";

        $config['file_name']  = $imageName.".png";
        //$config['overwrite'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) 
        {
            $error = $this->upload->display_errors();
            echo $error;
        } 
        else 
        {   
            $upload_data = $this->upload->data(); 
            $file_name = $upload_data['file_name'];
            $this->cimages_model->save_imageNews($file_name, $_POST['NewsID']);

            $dataImagenes = $this->cimages_model->getImagesNoticias($_POST['NewsID']);
            echo json_encode($dataImagenes);
        }
        
    }

     public function nuevaNoticia( ){

        $data['categorias'] = $this->cimages_model->getCategoriasNoticias( );

        $this->load->view('backend/misnoticias/VnuevaNoticia.php', $data);     
    }

    public function editImagnes( $id_noticia )
    {
        $data['imagenes'] = $this->cimages_model->getImagesNoticias($id_noticia);
        $data['newsID'] = $id_noticia;
        $this->load->view('backend/misnoticias/VimagesNoticia.php', $data);        
    }

    public function backHome()
    {
        $data['noticias'] = $this->cimages_model->getNoticias( );
        $this->load->view('backend/misnoticias/Vindex.php', $data );       
    }

    public function applyEffectImage()
    {
        $imagenDelete = $this->cimages_model->getData_image($_POST);
        $filename = "./assets/imagenes_noticias/".$imagenDelete[0]['path_imagen'];
        $im = imagecreatefrompng($filename);

        if($im && imagefilter($im, IMG_FILTER_CONTRAST, -50))
        {
            imagepng($im, $filename);
            imagedestroy($im);

            //----- Codigo para renombrar imagen y actulizar estador de filtro
            $newName = date("YmdHis");
            $newFileName = $newName.".png";
            $pathNewFile = "./assets/imagenes_noticias/".$newFileName;
            
            rename ($filename, $pathNewFile);
            $this->cimages_model->updated_imageFilter($imagenDelete[0]['id_noticia_imagen'], $newFileName);
        }
        echo $imagenDelete[0]['id_noticia'];
    }

    public function delete_image()
    {   
        $imagenDelete = $this->cimages_model->getData_image($_POST);
        $sourceImage ="./assets/imagenes_noticias/".$imagenDelete[0]['path_imagen'];
        unlink($sourceImage);
        $this->cimages_model->delete_image($imagenDelete[0]['id_noticia_imagen']);
        echo $imagenDelete[0]['id_noticia'];

    }

    
}
