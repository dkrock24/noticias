<?php

	


function getID($id_menu){

	$usuario 	= "root";
	$password 	= "lapizzeria2016!";
	$host 		= "localhost:3306";
	$db 		="db_noticias_digital";
	$db 		= new PDO("mysql:host=$host;dbname=$db",$usuario,$password);

	$query 		= $db->prepare("select * from sr_submenu where id_menu='".$id_menu."' && estado_submen = 1");
	
    $query->execute();
    $data['data'] = $query->fetch(); 
    var_dump($data);
    return   $data;  
}

function login(){

	$usuario 	= "root";
	$password 	= "lapizzeria2016!";
	$host 		= "localhost:3306";
	$db 		="db_noticias_digital";
	$db 		= new PDO("mysql:host=$host;dbname=$db",$usuario,$password);
}



