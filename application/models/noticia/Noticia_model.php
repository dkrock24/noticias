<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Noticia_model extends CI_Model
{
    const noticias = 'sys_noticia';
    const usuario = 'sr_usuarios';
    
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
            where noticia.id_noticia ="'. $id_noticia .'" ');
        //echo $this->db->queries[0];
        return $query->result(); 
    }

    


    
}
