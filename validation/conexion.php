<?php

function datos()
{

$usuario = "root";
$password = "";
$host = "localhost:3307";


	if(isset($usuario) and isset($password) and isset($host))
	{

		if($usuario!="" and $host!="")
		{
			return conexion($usuario,$password,$host);
		}
	}
}

function login()
{
	$usuario = "root";
	$password = "";
	$host = "localhost:3307";
	return conexion($usuario,$password,$host);
}

function conexion($usuario,$password,$host)
{
	$con = mysqli_connect($host,$usuario,$password,'db_noticias_digital');
	//$mysqli = new mysqli($host, $usuario, $password, 'db_systema_integrado');
	
	if($con)
	{
		return $con;
	}
	
}

