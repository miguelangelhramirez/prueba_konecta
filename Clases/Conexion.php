<?php


class Conexion {


	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "konecta";
	private $conexion;
	
	function __construct() {

		$connectionString = "mysql:host={$this->host};dbname={$this->db}";

		try {

			$this->conexion = new PDO($connectionString, $this->user, $this->pass);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		} catch (PDOException $e) {

			echo "ERROR: ". $e->getMessage();
			
		}
		
	}


	public function conexion() {

		return $this->conexion;

	}

}	


?>