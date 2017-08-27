<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Noticia_model extends CI_Model
{

	const categoria = 'sys_categoria';
    const menu_noticias = 'sys_menu';
    const sub_menu_noticias = 'sys_submenu';
    const noticias = 'sys_noticia';
    const noticias_config = 'sys_noticia_configuracion';
    const usuarios = 'sr_usuarios';
    const noticias_cmt = 'sys_noticia_comentario';
    
    public function __construct()
    {
        parent::__construct();
    }

    //Obtener Todos las noticias de la mas recientes a la mas antigua
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

    //Obtener la noticia segun el Id.
    public function editNoticias( $id_noticia )
    {
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
        $this->db->where(self::noticias.'.id_noticia',$id_noticia )   ;
        $query = $this->db->get();
        //echo $this->db->queries[0];
        
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

    public function updateNoticia( $id_noticia , $data  ){

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
            );
        $this->db->where('id_noticia', $id_noticia );
        $this->db->where('estado_noticia', 0 );
        $this->db->update(self::noticias, $info); 
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
        //$this->db->where('id_noticia', $id_noticia );
        $this->db->insert(self::noticias, $info); 
    }

}
