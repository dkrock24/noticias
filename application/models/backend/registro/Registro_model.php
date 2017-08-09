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
        $textName = substr($register['nombres'], 0, 2);
        $token = $dateFileCv."_".$textName; 
        
        if (isset($files['cvfile']['tmp_name'])) 
        {
            //-----------File Curriculum Vitae--------------------------------------
                $varStringName = $files['cvfile']['tmp_name'];
                $name = $dateFileCv."_cvfile.pdf";
                $fileType = $files['cvfile']['type'];
                $fileError = $files['cvfile']['error'];
                //$fileContent = file_get_contents($files['cvfile']['tmp_name']);
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
             'estado'    => 1
             );
        
        $this->db->insert(self::userTable,$categorias);
    }
    
}
/*
 * end of application/models/consultas_model.php
 */
