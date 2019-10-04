<?php 

function isSessionStart()
{
	return isset($_SESSION["rol"]);
}

function sessionValidate()
{
	if(!isSessionStart())
	{
		header("Location: ".URL_PROYECT);
	}
}

 ?>