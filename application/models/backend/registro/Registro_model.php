<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class registro_model extends CI_Model
{
    const libreria          = 'sr_librerias';
    const userTable          = 'sr_usuarios';
    const paises          = 'sys_pais';
    const usuario          = 'sr_usuarios';

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

        if(strpos($register['nombres'], " ") !== false) 
        {
          $userName = explode(" ", $register['nombres']);
          $userName = $userName[0];
        } 
        else 
        {
          $userName = $register['nombres'];
        }

        if(strpos($register['apellidos'], " ") !== false) 
        {
            $lastName = explode(" ", $register['apellidos']);
            $lastName = $lastName[0];
        } 
        else 
        {
          $lastName = $register['apellidos'];
        }

        $nickName = $userName.".".$lastName;


        $dateNow = date("Y-m-d h:i:sa");
        $categorias = array(
             'nombres'  => $register['nombres'],
             'apellidos'    => $register['apellidos'],
             'celular'    => $register['telefono'],
             'email'    => $register['email'],
             'token_register'    =>  $token,
             'direccion'    => $register['direccion'],
             'usuario'     => $nickName,
             'cv_user'     => $name,
             'cargo'     => 4,
             'rol'     => 4,
             'id_departamento'     => $depID,
             'estado'    => 1
             );
        
        $this->db->insert(self::userTable,$categorias);
    }

    public function  getPaises()
    {
        $query = $this->db->query('Select p.id_pais, p.nombre_pais, p.estado from sys_pais p');
        return $query->result(); 
    }

    public function  getToken($token)
    {
        $query = $this->db->query('Select u.id_usuario, u.token_register from
            sr_usuarios u where u.token_register = "'.$token.'" and u.comprobacion_email = 0');
        //echo $this->db->queries[0];
        return $query->result_array(); 
    }

    
    public function  getDepartamentoByPais($paisID)
    {
        $query = $this->db->query('Select dp.id_departamento from sys_pais_departamento dp where dp.id_pais = '.$paisID.' limit 1');
        return $query->result_array(); 
    }

     public function update_confirmEmail($idUser)
    {
        $data = array
        ( 
            'comprobacion_email'   => 1, 
        );
        $this->db->where('id_usuario', $idUser);    
        $this->db->update(self::usuario,$data);
    }
    
}
/*
 * end of application/models/consultas_model.php
 */
 