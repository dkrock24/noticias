<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Noticia_model extends CI_Model
{
    const noticias  = 'sys_noticia';
    const usuario   = 'sr_usuarios';
    const noticia_contador = 'sys_noticia_contador';
    
    public function __construct()
    {
        parent::__construct();
        
    }

    //Obtener Todos las noticias
    public function getNoticias()
    {    

        $query = $this->db->query('select * from sys_noticia as noticia 
            join sys_noticia_tipo as tipo on tipo.id_noticia_tipo=noticia.id_tipo_noticia');
        //echo $this->db->queries[0];
        return $query->result(); 
    }

    //Obtener Todos los  detalles de lasnoticias
    public function getNoticiasDetalle( $id_noticia )
    {    

        $query = $this->db->query('select * from sys_noticia as noticia 
            join sys_noticia_tipo as tipo on tipo.id_noticia_tipo=noticia.id_tipo_noticia
            join sr_usuarios as usuario on usuario.id_usuario = noticia.id_usuario
            join sys_categoria as categeoria on categeoria.id_categoria=noticia.id_categoria
            where noticia.id_noticia ="'. $id_noticia .'" ');
        //echo $this->db->queries[0];
        return $query->result(); 
    }

    public function getNoticiasImg( $id_noticia )
    {
        $query = $this->db->query('select * from sys_noticia as noticia 
            join sys_noticia_imagenes as img on img.id_noticia=noticia.id_noticia
            where noticia.id_noticia ="'. $id_noticia .'" and img.estado_imagen=1 ');
        //echo $this->db->queries[0];
        return $query->result(); 
    }  

    // Insertar contador de visitas a la noticia
    public function getInsertVisitas( $id_noticia ){
        $data = array(
            'id_noticia'    => $id_noticia,
            'ip_usuario'    => "127.0.0.1",
            'fecha_creado'    => date("Y-m-d H-i-s"),
            );        
        $this->db->insert(self::noticia_contador, $data);  
    }

    // Total de visitas por noticia
    public function getContadorVisitas( $id_noticia )
    {
        $query = $this->db->query('select count(*) as total_visitas from sys_noticia as noticia 
            join sys_noticia_contador as cnt on cnt.id_noticia=noticia.id_noticia
            where noticia.id_noticia ="'. $id_noticia .'"');
        //echo $this->db->queries[0];
        return $query->result(); 
    }  

    // Total de noticias de la tabla
    public function record_count(){
        return $this->db->count_all("sys_noticia");
    }

    public function fetch_data( $pagina, $limit ){

        $query = $this->db->query('select * from sys_noticia as noticia 
            join sys_noticia_tipo as tipo on tipo.id_noticia_tipo=noticia.id_tipo_noticia limit '.$limit.','.$pagina);
        echo $this->db->queries[1];

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }   


    
}
