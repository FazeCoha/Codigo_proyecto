<?php
session_start();
define("FOLDER_PROYECT",$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/Codigo_proyecto/"); 
define("FOLDER_TEMPLATE", FOLDER_PROYECT."Vista/template/");
define("URL_PROYECT","/Codigo_proyecto/");
define("URL_CONTROLADOR", URL_PROYECT."Controlador/");
define("URL_DAO", URL_PROYECT."Dao/");
define("URL_VISTA", URL_PROYECT."Vista/");
define("URL_UTIL", URL_PROYECT."util/");
define("URL_VO", URL_PROYECT."VO/");
define("URL_SRC", URL_PROYECT."src/");

include(FOLDER_PROYECT."util/sesiones.php");
?>