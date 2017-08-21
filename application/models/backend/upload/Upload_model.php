<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class upload_model extends CI_Model
{
    const libreria          = 'sr_librerias';
    const userTable          = 'sr_usuarios';

    public function __construct()
    {
        parent::__construct();
        
    }

    public function update_avatar($avatar, $userID)
    {
        $data = array(
            'avatar'   => $avatar
        );
        $this->db->where('id_usuario', $userID);        
        $this->db->update(self::userTable,$data);
    }

    public function getUserData($userLogged)
    {
         $query = $this->db->query('Select * from sr_usuarios u
                                    where u.id_usuario ='.$userLogged);
         return $query->result(); 
        
    }
    
}
/*
 * end of application/models/consultas_model.php
 */
