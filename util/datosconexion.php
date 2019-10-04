<?php
class Conexiona{
		public static function Conexion(){
			try {
				$cnx = new PDO("mysql:host=localhost;dbname=bdproyecto","root","");
				$cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$cnx->exec("SET CHARACTER SET UTF8");
				
			} catch (Exception $e) {
				die("Error ".$e->getMessage());
				echo "error en la linea ". $e->getLine();
			}
			return $cnx;
		}
	}
?>