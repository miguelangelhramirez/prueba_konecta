<?php

require_once("Autoload.php");


class Venta extends Crud {

	private $intProducto;
	private $intCantidad;

	
	public function __construct() {
		
		parent::__construct();


	}

	public function insertVenta(int $id, int $cantidad) {

		$this->intProducto = $id;
		$this->intCantidad = $cantidad;


		$insertQuery = "INSERT INTO ventas (id_producto, cantidad) VALUES (?,?)";
		$arrData = array($this->intProducto, $this->intCantidad);
		$this->insert($insertQuery, $arrData);

			
	}

	public function getVentas() {

		$selectQuery = "SELECT ventas.id, productos.nombre, ventas.cantidad, (ventas.cantidad * productos.precio) AS total FROM ventas INNER JOIN productos ON productos.id = ventas.id_producto";

		$resultQuery = $this->select_all($selectQuery);
		return $resultQuery;
	}

	public function getTopventas() {

		$selectQuery = "SELECT productos.nombre, SUM(ventas.cantidad) AS total FROM productos INNER JOIN ventas ON productos.id = ventas.id_producto GROUP BY productos.nombre ORDER BY total DESC LIMIT 1";
		$resultQuery = $this->select_all($selectQuery);
		return $resultQuery;
		
	}

}

?>