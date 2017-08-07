<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class registro_model extends CI_Model
{
    const libreria          = 'sr_librerias';
    const userTable          = 'sr_usuarios';

    public function __construct()
    {
        parent::__construct();
        
    }

    public function save_registro($register, $files)
    {
         $dateFileCv = date("YmdHis");

        if (isset($files['files']['tmp_name'])) 
        {
            //-----------File Curriculum Vitae--------------------------------------
                $varStringName = $files['files']['tmp_name'];
                $name = $dateFileCv."_".$files['files']['name'];
                $fileType = $files['files']['type'];
                $fileError = $files['files']['error'];
                $fileContent = file_get_contents($files['files']['tmp_name']);
                $cvFile = "assets/filesCV/".$dateFileCv."_".$files['files']['name'];

                move_uploaded_file($varStringName, $cvFile);
            //----------------------------------------------------------------------
        }

        $dateNow = date("Y-m-d h:i:sa");
        $categorias = array(
             'nombres'  => $register['nombres'],
             'apellidos'    => $register['apellidos'],
             'celular'    => $register['telefono'],
             'email'    => $register['email'],
             'direccion'    => $register['direccion'],
             'cv_user'     => $name,
             'estado'    => 1
             );
        
        $this->db->insert(self::userTable,$categorias);
    }
    
}
/*
 * end of application/models/consultas_model.php
 */
