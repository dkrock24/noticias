<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cnoticia_model extends CI_Model
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

    //Obtener Todos las categorias de noticias
    public function getMenuNoticias()
    {
        $this->db->select('*');
        $this->db->from(self::menu_noticias);        
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }        
    }

    // Guardar Menu de Noticias
    public function  saveMenuNoticias( $menu ){

        $data = array(
            'nombre_menu'   => $menu['nombre'],
            'url_menu'      => $menu['url'],
            'icon_menu'     => $menu['icono'],
            'class_menu'    => $menu['class'],
            'seccion'       => $menu['seccion'],
            'pages'         => $menu['pagina'],
            'estado_menu'   => $menu['estado'],
            );

        $this->db->insert(self::menu_noticias, $data);  
    }

    
    // Menu a Editar
    public function editMenuNoticia( $menuNoticia ){
        $this->db->select('*');
        $this->db->from(self::menu_noticias);
        $this->db->where(self::menu_noticias.'.id_menu',$menuNoticia);
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        } 
    }

    // Actualizar el menu noticia
    public function  saveEditMenuNoticia( $id_menu_noticia , $menu ){

        $data = array(
            'nombre_menu'   => $menu['nombre'],
            'url_menu'      => $menu['url'],
            'icon_menu'     => $menu['icono'],
            'class_menu'    => $menu['class'],
            'seccion'       => $menu['seccion'],
            'pages'         => $menu['pagina'],
            'estado_menu'   => $menu['estado'],
            );
        $this->db->where('id_menu', $id_menu_noticia );
        $this->db->update(self::menu_noticias, $data);  
    }


    /****************************************|
    |***********     SUB MENUS    ***********|
    |****************************************/

    //Obtener Todos las categorias de noticias
    public function getSubMenuNoticias($id_menu)
    {
        $this->db->select('*');        
        $this->db->from(self::menu_noticias);      
        $this->db->join(self::sub_menu_noticias,' on '. 
                        self::sub_menu_noticias.'.id_menu = '.
                        self::menu_noticias.'.id_menu');
        $this->db->where(self::sub_menu_noticias.'.id_menu',$id_menu);
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }        
    }

     // Guardar Menu de Noticias
    public function  saveSubMenu( $submenu ){

        $data = array(
            'nombre_submenu'    => $submenu['nombre'],
            'url_submenu'       => $submenu['url'],
            'icon_menu'         => $submenu['icono'],
            'titulo_submenu'    => $submenu['titulo'],
            'id_menu'           => $submenu['id'],
            'estado_submen'     => $submenu['estado'],
            );

        $this->db->insert(self::sub_menu_noticias, $data);  
    }

    // Editar Sub menu
    public function editarSubMenu( $id ){
        $this->db->select('*');
        $this->db->from(self::sub_menu_noticias);
        $this->db->where(self::sub_menu_noticias.'.id_submenu',$id);
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        } 
    }

    // Actualizar el submenu noticia
    public function  updateSubMenu( $id_submenu, $submenu ){

        $data = array(
            'nombre_submenu'   => $submenu['nombre'],
            'url_submenu'      => $submenu['url'],
            'icon_menu'     => $submenu['icono'],
            'titulo_submenu'=> $submenu['titulo'],
            'id_menu'       => $submenu['id'],
            'estado_submen' => $submenu['estado'],
            );
        $this->db->where('id_submenu', $id_submenu );
        $this->db->update(self::sub_menu_noticias, $data);  
    }


    /****************************************|
    |***********     NOTICAS      ***********|
    |****************************************/

    
    //Obtener Todos las noticias de la mas recientes a la mas antigua
    public function getNoticias()
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
        //$this->db->where(self::noticias.'.estado_noticia',1); 
        $this->db->order_by(self::noticias_config.'.importante', "desc");
        $this->db->order_by(self::noticias.'.estado_noticia', "desc");
        $this->db->order_by(self::noticias.'.fecha_creacion_noticia', "asc");
        
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
            'estado_noticia'    => $data['estado'],
            );
        $this->db->where('id_noticia', $id_noticia );
        $this->db->update(self::noticias, $info); 
    }

    /****************************************|
    |******     NOTICAS CONFIG      *********|
    |****************************************/

    public function get_validar_noticia( $id_noticia ){

        $this->db->select('*');
        $this->db->from(self::noticias_config);    
        $this->db->where(self::noticias_config.'.id_noticia_config', $id_noticia );
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function save_config_noticia( $id_noticia , $config  ,$dias ){

        $importante=0;
        $estado=0;
        if(isset($config['importante_config'])){
            $importante=1;
        }
        if(isset($config['activo_config'])){
            $estado=1;
        }
        $data = array(
            'id_noticia_config'        => $id_noticia,
            'fecha_inicio'      => $config['inicio_config'],
            'fecha_fin'         => $config['fin_config'],
            'total_dias'        => $dias,
            'total_restantes'   => $config['total_dias_restantes_noticia'],
            'actualizado'       => date("Y-m-d H-i-s"),
            'importante'        => $importante,
            'estado_config'     => $estado,
            );
        $this->db->insert(self::noticias_config, $data);
    }

    public function update_config_noticia( $id_noticia , $config ,$dias ){

        $importante=0;
        $estado=0;
        if(isset($config['importante_config'])){
            $importante=1;
        }
        if(isset($config['activo_config'])){
            $estado=1;
        }
        $data = array(
            'id_noticia_config'        => $id_noticia,
            'fecha_inicio'      => $config['inicio_config'],
            'fecha_fin'         => $config['fin_config'],
            'total_dias'        => $dias ,
            'total_restantes'   => $config['total_dias_restantes_noticia'],
            'actualizado'       => date("Y-m-d H-i-s"),
            'importante'        => $importante,
            'estado_config'     => $estado,
            );
        $this->db->where('id_noticia_config', $id_noticia );
        $this->db->update(self::noticias_config, $data);
    }


    public function eliminar_comentario( $id_cmt ){

        $this->db->where('id_comentario', $id_cmt );
        $this->db->delete(self::noticias_cmt);
    }

 
    
}
