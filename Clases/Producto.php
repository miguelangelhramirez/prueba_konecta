<?php

require_once("Autoload.php");


class Producto extends Crud {

	private $strNombre;
	private $strReferencia;
	private $intPrecio;
	private $intPeso;
	private $strCategoria;
	private $intStock;
	private $dateCreacion;
	private $conexion;
	
	public function __construct() {
		
		parent::__construct();


	}

	public function insertProducto
	(

		string $nombre, 
		string $referencia, 
		int $precio,
		int $peso,
		string $categoria,
		int $stock

	) {

		$this->strNombre = $nombre;
		$this->strReferencia = $referencia;
		$this->intPrecio = $precio;
		$this->intPeso = $peso;
		$this->strCategoria = $categoria;
		$this->intStock = $stock;

		if ($this->strNombre == "" || $this->strReferencia == "" || $this->intPrecio == "" || $this->intPeso == "" || $this->strCategoria == "" || $this->intStock == "") {
			
			echo "error: campo vacio";

			return;
		}

		$insertQuery = "INSERT INTO productos (nombre, referencia, precio, peso, categoria, stock, fecha_creacion) VALUES (?,?,?,?,?,?, NOW())";
		$arrData = array($this->strNombre, $this->strReferencia, $this->intPrecio, $this->intPeso, $this->strCategoria, $this->intStock);

		$this->insert($insertQuery, $arrData);
			
	}


	public function updateProducto
	(
		int $id,
		string $nombre, 
		string $referencia, 
		int $precio,
		int $peso,
		string $categoria,
		int $stock

	) {

		$updateQuery = "UPDATE productos SET nombre = ?, referencia = ?, precio = ?, peso = ?, categoria = ?, stock = ? WHERE id = $id";
		$arr_data = array($nombre, $referencia, $precio, $peso, $categoria, $stock);

		$request_update = $this->update($updateQuery, $arr_data);


	}

	public function getProductos() {

		$selectQuery = "SELECT * FROM productos";
		
		$resultQuery = $this->select_all($selectQuery);

		return $resultQuery;

	}


	public function getProducto($id) {

		$selectQuery = "SELECT * FROM productos WHERE id = :id";
		$resultQuery = $this->select($id, $selectQuery);
		return $resultQuery;
	}

	public function daleteProducto($id) {

		$deleteQuery = "DELETE FROM productos WHERE id = :id";
		$resultQuery = $this->delete($id, $deleteQuery);
		return $resultQuery;
	}


	public function updateStock($id, $stock) {

		$updateQuery = "UPDATE productos SET stock = ? WHERE id = $id";
		$arr_data = array($stock);

		$request_update = $this->update($updateQuery, $arr_data);
	}

	public function getMaxstock() {

		$selectQuery = "SELECT * FROM productos ORDER BY stock DESC LIMIT 1";
		
		$resultQuery = $this->select_all($selectQuery);

		return $resultQuery;

	}
}

?>