<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class registro_model extends CI_Model
{
    const libreria          = 'sr_librerias';
    const userTable          = 'sr_usuarios';
    const paises          = 'sys_pais';

    public function __construct()
    {
        parent::__construct();
        
    }

    public function save_registro($register, $files, $token, $depID)
    {
        $dateFileCv = date("YmdHis");
        if (isset($files['cvfile']['tmp_name'])) 
        {
            //-----------File Curriculum Vitae--------------------------------------
                $varStringName = $files['cvfile']['tmp_name'];
                $name = $dateFileCv."_cvfile.pdf";
                $fileType = $files['cvfile']['type'];
                $fileError = $files['cvfile']['error'];
                $cvFile = "assets/filesCV/".$name;

                move_uploaded_file($varStringName, $cvFile);
            //----------------------------------------------------------------------
        }

        $dateNow = date("Y-m-d h:i:sa");
        $categorias = array(
             'nombres'  => $register['nombres'],
             'apellidos'    => $register['apellidos'],
             'celular'    => $register['telefono'],
             'email'    => $register['email'],
             'token_register'    =>  $token,
             'direccion'    => $register['direccion'],
             'cv_user'     => $name,
             'id_departamento'     => $depID,
             'estado'    => 1
             );
        
        $this->db->insert(self::userTable,$categorias);
    }

    public function  getPaises()
    {
        $query = $this->db->query('Select p.id_pais, p.nombre_pais, p.estado from sys_pais p');
        return $query->result_array(); 
    }
    public function  getDepartamentoByPais($paisID)
    {
        $query = $this->db->query('Select dp.id_departamento from sys_pais_departamento dp where dp.id_pais = '.$paisID.' limit 1');
        return $query->result_array(); 
    }
    
}
/*
 * end of application/models/consultas_model.php
 */
 