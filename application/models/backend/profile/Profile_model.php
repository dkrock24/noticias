<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class profile_model extends CI_Model
{
    const libreria          = 'sr_librerias';
    const user              = 'sr_usuarios';    
    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function getUserData($userLogged)
    {
         $query = $this->db->query('Select * from sr_usuarios u
                                    where u.id_usuario = '.$userLogged);
         return $query->result(); 
        
    }

    public function savePersonalInfo($personaInfo)
    {
        $dateNow = date("YmdHis");
        $data = array(
            'nombres'   => $personaInfo['nombre'], 
            'apellidos'   => $personaInfo['apellido'], 
            'celular'   => $personaInfo['telefono'], 
            'direccion'   => $personaInfo['direccion'], 
            'email'   => $personaInfo['email'], 
            'Aficiones'   => $personaInfo['aficiones'], 
            'social_links'   => $personaInfo['linksSocial'], 
            'dui'   => $personaInfo['dui'], 
            'fecha'   => $personaInfo['cumple'], 
            'genero'   => $personaInfo['genero'], 
            'fecha_modificacion'   => $dateNow, 

        );
        $this->db->where('id_usuario', $personaInfo['userID']);    
        $this->db->update(self::user,$data);
    }

   
}
/*
 * end of application/models/consultas_model.php
 */
