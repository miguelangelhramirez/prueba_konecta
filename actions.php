<?php

	require_once('Clases/Autoload.php');
		
	$producto = new Producto();
	$venta = new Venta();


	if (isset($_POST["productos"])) {

		$listaProductos = $producto->getProductos();

		echo json_encode($listaProductos);
	}


	if (isset($_POST["get_producto"])) {
		
		$id = $_POST["id"];

		$producto = $producto->getProducto($id);

		echo json_encode($producto);
	}


	if (isset($_POST["crear_producto"])) {


		$nombre = $_POST["nombre"];
		$referencia = $_POST["referencia"];
		$precio = $_POST["precio"];
		$peso = $_POST["peso"];
		$categoria = $_POST["categoria"];
		$stock = $_POST["stock"];

		if ($nombre == "" || $referencia == "" || $precio == "" || $peso == "" || $categoria == "" || $stock == "") {
			
			echo "campos vacios";

			return;
		}

		$listaProductos = $producto->insertProducto($nombre, $referencia, $precio, $peso, $categoria, $stock);


	}


	if (isset($_POST["update_producto"])) {


		$id = $_POST["id"];
		$nombre = $_POST["nombre"];
		$referencia = $_POST["referencia"];
		$precio = $_POST["precio"];
		$peso = $_POST["peso"];
		$categoria = $_POST["categoria"];
		$stock = $_POST["stock"];

		if ($id == "" || $nombre == "" || $referencia == "" || $precio == "" || $peso == "" || $categoria == "" || $stock == "") {
			
			echo "campos vacios";

			return;
		}

		$listaProductos = $producto->updateProducto($id, $nombre, $referencia, $precio, $peso, $categoria, $stock);


	}


	if (isset($_POST["ventas"])) {


		$listaVentas = $venta->getVentas();

		echo json_encode($listaVentas);
	}


	if (isset($_POST["crear_venta"])) {
		
		$id = $_POST["id"];
		$cantidad = $_POST["cantidad"];
		$stock = $_POST["stock"];

		if ($id == "" || $cantidad == "" || $stock == "") {

			echo "campos vacios";

			return;

		}elseif ($cantidad > $stock) {

			echo "cantidad mayor a stock";

			return;
		}

		$resulVenta = $venta->insertVenta($id, $cantidad);

			
		$nuevoStock = $stock - $cantidad;

		$producto->updateStock($id, $nuevoStock);

		
	}


	if (isset($_POST["eliminar_producto"])) {
		
		$id = $_POST["id"];

		$producto->daleteProducto($id);
	}


	if (isset($_POST["top_stock"])) {

		$maxStock = $producto->getMaxstock();

		echo json_encode($maxStock);

	}


	if (isset($_POST["top_ventas"])) {

		$maxStock = $venta->getTopventas();

		echo json_encode($maxStock);

	}
?>