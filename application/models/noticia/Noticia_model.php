<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Noticia_model extends CI_Model
{
    const noticias  = 'sys_noticia';
    const usuario   = 'sr_usuarios';
    const noticia_contador = 'sys_noticia_contador';
    const comentario = 'sys_noticia_comentario';
    
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
        //$this->db->insert(self::noticia_contador, $data);  
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
        $query = $this->db->query("select count(*) as total from sys_noticia as noticia 
                                    join sys_noticia_tipo as tipo on tipo.id_noticia_tipo=noticia.id_tipo_noticia 
                                    join sys_noticia_configuracion as config on config.id_noticia_config=noticia.id_noticia
                                    where (config.fecha_inicio <= now() and config.fecha_fin >= now() or config.fecha_inicio is null ) and noticia.estado_noticia=1");
        return $query->result(); 
    }

    public function fetch_data( $pagina, $limit ){

        $query = $this->db->query('select * from sys_noticia as noticia 
                                    join sys_noticia_tipo as tipo on tipo.id_noticia_tipo=noticia.id_tipo_noticia 
                                    left join sys_noticia_configuracion as config on config.id_noticia_config=noticia.id_noticia
                                    where (config.fecha_inicio <= now() and config.fecha_fin >= now() or config.fecha_inicio is null ) and noticia.estado_noticia=1
                                    order by config.fecha_inicio desc
                                    limit '.$limit.','.$pagina);
        //echo $this->db->queries[1];

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

    /****************************************|
    |*****     NOTICAS COMENTARIOS  *********|
    |****************************************/



    public function getComentarios( $id_noticia ){
        $query = $this->db->query("select cmt1.id_comentario, cmt1.comentario_noticia as cmt,cmt1.comentario_fecha as cmt_fecha ,cmt2.id_padre as id_reply ,cmt2.comentario_noticia as reply,cmt2.comentario_fecha as reply_fecha,cmt1.avatar as avatar1,cmt2.avatar as avatar2,
            (select count(*) from sys_noticia_comentario as c where c.id_padre=cmt1.id_comentario) as total_reply

            from sys_noticia_comentario as cmt1
            left join sys_noticia_comentario as cmt2 on cmt1.id_comentario=cmt2.id_padre
            where cmt1.id_noticia_comentario=".$id_noticia);
        return $query->result(); 
    }

    public function insert_comentarios( $cmt ){

        $data = array(
            'id_noticia_comentario' => $cmt['id_noticia'],
            'avatar'                => $cmt['avatar'],
            'comentario_noticia'    => $cmt['comentario_texto'],
            'comentario_fecha'      => date("Y-m-d H-i-s"),
            'comentario_estado'     => 1,
            );        
        $this->db->insert(self::comentario, $data);  
    }

    public function insert_respuesta( $respuesta ){

        $data = array(
            'id_padre'          => $respuesta['id_noticia'],
            'avatar'            => $respuesta['avatar'],
            'comentario_noticia'=> $respuesta['cmt'],
            'comentario_fecha'  => date("Y-m-d H-i-s"),
            'comentario_estado' => 1,
            );        
        $this->db->insert(self::comentario, $data);  
    }


    


    
}
