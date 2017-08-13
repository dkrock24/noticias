<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categoria_model extends CI_Model
{
    const categoria = 'sys_categoria';
    const usuario = 'sr_usuarios';
    
    public function __construct()
    {
        parent::__construct();
        
    }

    //Obtener Todos las categorias de noticias
    public function getCategoria()
    {
        $this->db->select('*');
        $this->db->from(self::categoria);
        $this->db->join(self::usuario,'on '. self::categoria .'.id_usuario = '.self::usuario.'.id_usuario');
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }        
    }

    // Edita la categoria
    public function editCategoria( $categoria ){
        $this->db->select('*');
        $this->db->from(self::categoria);
        $this->db->where(self::categoria.'.id_categoria',$categoria);
        $query = $this->db->get();
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        } 
    }

    // Desabilita o Habilitar la categoria por su ID
    public function inactivarCategoria( $id_categoria , $estado ){
        $estado_categoria;
        if($estado == 1){
            $estado_categoria = 0;
        }else{
            $estado_categoria = 1;
        }

        $data = array(
            'estado_categoria'    => $estado_categoria
            );
        $this->db->where('id_categoria', $id_categoria );
        $this->db->update(self::categoria, $data);   
    }

    // UPDATE CATEGORIA
    public function  actualizarCategoria( $categoria ){

        $data = array(
            'nombre_categoria'    => $categoria['categoria'],
            'descripcion_categoria'    => $categoria['descripcion']
            );
        $this->db->where('id_categoria', $categoria['id_categoria'] );
        $this->db->update(self::categoria, $data);  
    }

    // INSERTAR CATEGORIA
    public function  insertCategoria( $categoria ){
        session_start();
        $data = array(
            'nombre_categoria'    => $categoria['categoria'],
            'descripcion_categoria'    => $categoria['descripcion'],
            'id_usuario'    => $_SESSION['idUser'],            
            'estado_categoria'    => $categoria['estado']
            );        
        $this->db->insert(self::categoria, $data);  
    }

    
}
