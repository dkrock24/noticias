<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class logs_model extends CI_Model
{

    const sys_procesos_log = 'sys_procesos_log';
    

    public function __construct()
    {
        parent::__construct();
        
    }

    function setLog($proceso,$sucursal,$usuario){
        //$date = date("Y-m-d H:m:s");
        $data = array(
            'proceso_id'    => $proceso,
            'sucursal_id'    => $sucursal,
            'id_usuario'    => $usuario
        );
        $this->db->insert(self::sys_procesos_log,$data);
    }
    
    public function getAllLogs()
    {     
        $filtro ="";
        session_start();
        $rol_usuario = $_SESSION['rol'];
        if($rol_usuario != 1){
            $filtro = " and u.id_usuario=".$_SESSION['idUser'];
        }
        $query = $this->db->query('select p.nombre_proceso,u.nickname,s.nombre_sucursal,DATE_FORMAT(logss.fecha_log,"%Y-%m-%d") as fecha , count(logss.proceso_id) as total from sys_procesos_log as logss 
    join sys_procesos as p on logss.proceso_id = p.id
    left join sys_sucursal as s on s.id_sucursal=logss.sucursal_id
    join sr_usuarios as u on u.id_usuario=logss.id_usuario 
    where (logss.fecha_log >= now()-interval 6 month) 
    and
    logss.proceso_id=1 
    '.$filtro.' 
    GROUP BY DATE_FORMAT(logss.fecha_log, "%Y%m") ');
            //echo $this->db->queries[0];
            return $query->result(); 
    } 

    public function getLogsNoticias(){
        $filtro ="";
        session_start();
        $rol_usuario = $_SESSION['rol'];
        if($rol_usuario != 1){
            $filtro = " and noticia.id_usuario=".$_SESSION['idUser'];
        }

        $query = $this->db->query("select DATE_FORMAT(noticia.fecha_creacion_noticia,'%Y-%m-%d') as fecha, count(noticia.id_titulo) as total  ,
            MONTHNAME(STR_TO_DATE(DATE_FORMAT(noticia.fecha_creacion_noticia,'%m'), '%m')) as mes
            from sys_noticia as noticia 
            where noticia.fecha_creacion_noticia >= now()-interval 6 month 
            ".$filtro." 
            GROUP BY DATE_FORMAT(noticia.fecha_creacion_noticia, '%Y%m')");

        return $query->result(); 
    }

    public function getNoticiasActivasGrafica(){

        $filtro ="";
        session_start();
        $rol_usuario = $_SESSION['rol'];
        if($rol_usuario != 1){
            $filtro = " and u.id_usuario= ".$_SESSION['idUser'];
        }

        $query = $this->db->query("select
            count(CASE WHEN noticia.estado_noticia = 0 THEN 1 END) AS Inactivos,
            count(CASE WHEN noticia.estado_noticia = 1 THEN 1 END) AS Activos,
            count(CASE WHEN DATEDIFF( c.fecha_fin,now()) < 0 THEN 0 END) AS Vencidas

            from sys_noticia as noticia 
            left join sys_noticia_configuracion as c on c.id_noticia_config=noticia.id_noticia
            left join sr_usuarios as u on u.id_usuario=noticia.id_usuario
            where (noticia.fecha_creacion_noticia >= now()-interval 12 month) ".$filtro."

        ");

        return $query->result(); 
    }

    public function getCategoriasGrafica(){
        $query = $this->db->query("select c.nombre_categoria, count(n.id_categoria) as Total from  sys_noticia as n
right join sys_categoria as c on c.id_categoria=n.id_categoria
where c.estado_categoria=1
group by c.nombre_categoria
        ");

        return $query->result(); 
    }
}
