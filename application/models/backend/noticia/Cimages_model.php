<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cimages_model extends CI_Model
{

	const categoria = 'sys_categoria';
    const menu_noticias = 'sys_menu';
    const sub_menu_noticias = 'sys_submenu';
    const noticias = 'sys_noticia';
    const noticias_config = 'sys_noticia_configuracion';
    const usuarios = 'sr_usuarios';
    const noticias_cmt = 'sys_noticia_comentario';
    const noticias_img = 'sys_noticia_imagenes';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function  getImagesNoticias($newsID)
    {
        $query = $this->db->query('Select snm.id_noticia_imagen, snm.path_imagen, snm.id_noticia, snm.filtro  FROM sys_noticia_imagenes snm where snm.id_noticia ='.$newsID);
        return $query->result(); 
    }

    public function crearNoticia(  $data  ){

    	session_start();
    	$id_usuario =  $_SESSION['idUser'];

        parse_str( parse_url( $data['video'], PHP_URL_QUERY ), $my_array_of_vars );
        if(isset($my_array_of_vars['v'])){
            $video = $my_array_of_vars['v'];
        }else
        {
            $video = $data['video'];
        }

        $info = array(
            'id_titulo'         => $data['titulo'],
            'titulo_largo'      => $data['titulo_largo'],
            'contenido'         => $data['contents'],
            'video_url'         => $video,
            'referencia'        => $data['referencia'],
            'link_referencia'   => $data['enlace'],
            'id_categoria'      => $data['categoria'],
            'id_usuario'      	=> $id_usuario,
            );

        $this->db->insert(self::noticias, $info);
        return $this->db->insert_id(); 
    }

    public function save_imageNews($image, $newsID)
    {
        $data = array(
            'id_noticia'   => $newsID,
            'path_imagen'  => $image,
            'estado_imagen'  => 1,
        );
        $this->db->insert(self::noticias_img, $data);
    }


    public function updated_imageFilter($idNoticia, $path_imagen)
    {
        $data = array
        ( 
            'path_imagen'   => $path_imagen, 
            'filtro'   => 1, 
        );
        $this->db->where('id_noticia_imagen', $idNoticia);    
        $this->db->update(self::noticias_img,$data);
    }

 
    public function getNoticias()
    {
        session_start();
        $id_usuario =  $_SESSION['idUser'];
        $this->db->select('*');
        $this->db->from(self::noticias);    
        $this->db->join(self::usuarios,' on '. 
                        self::usuarios.'.id_usuario = '.
                        self::noticias.'.id_usuario');    
        $this->db->join(self::categoria,' on '. 
                        self::categoria.'.id_categoria = '.
                        self::noticias.'.id_categoria');    
        $this->db->join(self::noticias_config,' on '. 
                        self::noticias_config.'.id_noticia_config = '.
                        self::noticias.'.id_noticia','left');
        $this->db->where(self::usuarios.'.id_usuario',$id_usuario); 
//        $this->db->order_by(self::noticias_config.'.importante', "desc");
        $this->db->order_by(self::noticias.'.estado_noticia', "desc");
        $this->db->order_by(self::noticias.'.fecha_creacion_noticia', "desc");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function  getCategoriasNoticias(){
        $this->db->select('*');
        $this->db->from(self::categoria);    
        $this->db->where(self::categoria.'.estado_categoria',1)   ;
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }   
    }

    public function  getData_image($newsID)
    {
        $query = $this->db->query('Select snm.id_noticia_imagen, snm.path_imagen, snm.id_noticia, snm.filtro  FROM sys_noticia_imagenes snm where snm.id_noticia_imagen ='.$newsID['idNews']);
        return $query->result_array(); 
    }


    public function delete_image($newsDelete)
    {
         $data = array(
            'id_noticia_imagen' => $newsDelete
        );
        $this->db->delete(self::noticias_img, $data);

    }


}
