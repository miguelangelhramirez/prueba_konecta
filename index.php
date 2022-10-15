<!DOCTYPE html>
<html lang="es">
<head>
	<title>PRUEBA PHP</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="Assets/css/estilos.css">

    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="Assets/css/datatables.min.css">

    <script src="Assets/js/jquery-3.3.1.min.js"></script>

    <script src="Assets/js/bootstrap.min.js"></script>

    <script src="Assets/js/datatables.min.js"></script>

    <script src="Assets/js/sweetalert2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="p-4">

	<div class="container">
		<div class="row">
			<div class="col-12 pb-4">
				<h1 class="text-center">Cafetería Konecta</h1>
			</div>
			<div class="col-12 pb-5">
				<div class="table-wrapper">
		            <div class="table-title">
		                <div class="row">
		                    <div class="col-8"><h2>Productos</h2></div>
		                    <div class="col-4">
		                    	<button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#modal_crear_producto">Agregar Producto</button>
		                    </div>
		                </div>
		            </div>
	            	<table id="tabla_productos" class="table table-striped table-hover table-bordered">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>Nombre</th>
		                        <th>Referencia</th>
		                        <th>Precio</th>
		                        <th>Peso</th>
		                        <th>Categoria</th>
		                        <th>Stock</th>
		                        <th>Creación</th>
		                        <th>Editar</th>
		                        <th>Borrar</th>
		                    </tr>
		                </thead>
		                <tbody>
		                </tbody>
		            </table>
	        	</div>
			</div>

			<div class="col-12 text-center">
				<button id="btn_prod_stock" type="button" class="btn btn-primary m-4">Producto con mas stock</button>
				<button id="btn_prod_ventas" type="button" class="btn btn-primary m-4">Producto mas vendido</button>
			</div>

			<div class="col-lg-8 col-sm-12 pt-5 pb-5 mx-auto">
				<div class="table-wrapper">
		            <div class="table-title">
		                <div class="row">
		                    <div class="col-8"><h2>Ventas</h2></div>
		                    <div class="col-4"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_venta">Registrar Venta</button></div>
		                </div>
		            </div>
	            	<table id="tabla_ventas" class="table table-striped table-hover table-bordered">
		                <thead>
		                    <tr>
		                    	<th>#</th>
		                        <th>Producto</th>
		                        <th>Cantidad</th>
		                        <th>Total</th>
		                    </tr>
		                </thead>
		                <tbody>

		                </tbody>
		            </table>
	        	</div>
			</div>
		</div>
	</div>

	<div id="modal_crear_producto" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Crear nuevo producto</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">

	        <form id="form_crear_producto" method="POST">
			  <div class="form-group mb-3">
			    <label for="input_nombre">Nombre</label>
			    <input id="input_nombre" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_referencia">Referencia</label>
			    <input id="input_referencia" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_precio">Precio</label>
			    <input id="input_precio" type="number" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_peso">Peso</label>
			    <input id="input_peso" type="number" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_categoria">Categoría</label>
			    <input id="input_categoria" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_stock">Stock</label>
			    <input id="input_stock" type="number" class="form-control" required>
			  </div>
			</form>

	      </div>
	      <div class="modal-footer">
	        <button type="submit" form="form_crear_producto" class="btn btn-primary">Guardar Producto</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div id="modal_edit" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 id="modal_edit_title" class="modal-title"></h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">

	        <form id="form_editar" method="POST">
	          <input id="input_id_edit" type="number" hidden required>
			  <div class="form-group mb-3">
			    <label for="input_nombre_edit">Nombre</label>
			    <input id="input_nombre_edit" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_referencia_edit">Referencia</label>
			    <input id="input_referencia_edit" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_precio_edit">Precio</label>
			    <input id="input_precio_edit" type="number" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_peso_edit">Peso</label>
			    <input id="input_peso_edit" type="number" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_categoria_edit">Categoría</label>
			    <input id="input_categoria_edit" type="text" class="form-control" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="input_stock_edit">Stock</label>
			    <input id="input_stock_edit" type="number" class="form-control" required>
			  </div>
			</form>

	      </div>
	      <div class="modal-footer">
	        <button type="submit" form="form_editar" class="btn btn-primary">Guardar Cambios</button>
	      </div>
	    </div>
	  </div>
	</div>


	<div id="modal_crear_venta" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Registrar nueva venta</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">

	        <form id="form_crear_venta" method="POST">
	        	<label>Producto</label>
	        	<input id="total_stock" type="number" hidden>
				<select id="select_productos" class="form-select mb-3">
					<option disabled selected value="">Seleccionar producto</option>
				</select>
				<div class="form-group mb-3">
				    <label for="input_cantidad">Cantidad</label>
				    <input id="input_cantidad" type="number" class="form-control" required>
				    <div id="txt_aviso_stock" class="form-text text-danger"></div>
				</div>
			</form>

	      </div>
	      <div class="modal-footer">
	        <button type="submit" form="form_crear_venta" class="btn btn-primary">Generar Venta</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>

<script type="text/javascript">
	$(document).ready(function () {

		$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'JSON',
			data: {productos: "productos"},
		})
		.done(function(respuesta){

			let data = respuesta;

			let selectProductos = $("#select_productos");

			for (var i=0; i<data.length; i++) {
		      selectProductos.append('<option value="' + data[i].id + '">' + data[i].nombre + '</option>');
		    }

				
			$('#tabla_productos').dataTable( {

				language: { 
					"info": "Mostrando _START_ a _END_ de _TOTAL_ datos",
					"infoEmpty": "Mostrando 0 a 0 de 0 datos",
					"lengthMenu": "Mostrar _MENU_ datos",
					"search": "Buscar:",
    				"zeroRecords": "No se encontraron coincidencias",
    				"infoFiltered": "(filtrando from _MAX_ datos totales)",
    				"paginate": {
				        "first":      "Primero",
				        "last":       "Ultimo",
				        "next":       ">>",
				        "previous":   "<<"
				    },
				},

				pageLength: 5,
				data:data,
				columnDefs: [ 
					{
						targets: 8,
						defaultContent: "<button id='btn_editar_producto' class='btn btn-primary' onclick='editarProducto(this)'>Editar</button>"
					},
					{
						targets: 9,
						defaultContent: "<button id='btn_borrar_producto' class='btn btn-danger' onclick='eliminarProducto(this)'>Borrar</button>"
					},
				],
				columns: [
				    { data: 'id' },
				    { data: 'nombre' },
				    { data: 'referencia' },
				    { data: 'precio' },
				    { data: 'peso' },
				    { data: 'categoria' },
				    { data: 'stock' },
				    { data: 'fecha_creacion' },
				]
		    });
		})
		.fail(function(){
			console.log("error");
		});

		$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'JSON',
			data: {ventas: "ventas"},
		})
		.done(function(respuesta){

			let data = respuesta;
				
			$('#tabla_ventas').dataTable( {
				language: { 
					"info": "Mostrando _START_ a _END_ de _TOTAL_ datos",
					"infoEmpty": "Mostrando 0 a 0 de 0 datos",
					"lengthMenu": "Mostrar _MENU_ datos",
					"search": "Buscar:",
    				"zeroRecords": "No se encontraron coincidencias",
    				"infoFiltered": "(filtrando from _MAX_ datos totales)",
    				"paginate": {
				        "first":      "Primero",
				        "last":       "Ultimo",
				        "next":       ">>",
				        "previous":   "<<"
				    },
				},
				pageLength: 5,           
				data:data,
				columns: [
					{ data: 'id' },
				    { data: 'nombre' },
				    { data: 'cantidad' },
				    { data: 'total' }
				]
		    });
		})
		.fail(function(){
			console.log("error");
		});
		
	});


	function editarProducto(obj) {

		let parent = obj.parentElement;

		parent = parent.parentElement;

		let txtId = parent.getElementsByTagName("td")[0].innerHTML;
		let txtNombre = parent.getElementsByTagName("td")[1].innerHTML;
		let txtReferencia = parent.getElementsByTagName("td")[2].innerHTML;
		let txtPrecio = parent.getElementsByTagName("td")[3].innerHTML;
		let txtPeso = parent.getElementsByTagName("td")[4].innerHTML;
		let txtCategoria = parent.getElementsByTagName("td")[5].innerHTML;
		let txtStock = parent.getElementsByTagName("td")[6].innerHTML;


		document.getElementById('modal_edit_title').innerHTML = `Editar <b>${txtNombre}</b>`;

		let id = document.getElementById('input_id_edit').value = txtId;
		let nombre = document.getElementById('input_nombre_edit').value = txtNombre;
		let referencia = document.getElementById('input_referencia_edit').value = txtReferencia;
		let precio = document.getElementById('input_precio_edit').value = txtPrecio;
		let peso = document.getElementById('input_peso_edit').value = txtPeso;
		let categoria = document.getElementById('input_categoria_edit').value = txtCategoria;
		let stock = document.getElementById('input_stock_edit').value = txtStock;

		$('#modal_edit').modal('show');

	}

	$("#form_crear_producto").submit(function(event) {
	  event.preventDefault();

	  let nombre = document.getElementById('input_nombre').value;
	  let referencia = document.getElementById('input_referencia').value;
	  let precio = document.getElementById('input_precio').value;
	  let peso = document.getElementById('input_peso').value;
	  let categoria = document.getElementById('input_categoria').value;
	  let stock = document.getElementById('input_stock').value;


	  $.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {crear_producto: "crear_producto", nombre:nombre, referencia:referencia, precio:precio, peso:peso, categoria:categoria, stock:stock},
		})
		.done(function(respuesta){
			if (respuesta.trim() === "true") {
				Swal.fire(
				  'Producto creado exitosamente!',
				  '',
				  'success'
				)
				.then(function(){ 
				   location.reload();
				});

			}else if(respuesta.trim() === "campos vacios") {
				Swal.fire(
				  'Uno o mas campos están vacios',
				  '',
				  'error'
				)
			}
		})
		.fail(function(){
			Swal.fire(
				'Error al crear el producto',
				'',
				'error'
			)
		});
	
	});


	$("#form_editar").submit(function(event) {
	  event.preventDefault();

	  let id = document.getElementById('input_id_edit').value;
	  let nombre = document.getElementById('input_nombre_edit').value;
	  let referencia = document.getElementById('input_referencia_edit').value;
	  let precio = document.getElementById('input_precio_edit').value;
	  let peso = document.getElementById('input_peso_edit').value;
	  let categoria = document.getElementById('input_categoria_edit').value;
	  let stock = document.getElementById('input_stock_edit').value;


	  	$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {update_producto: "update_producto", id:id, nombre:nombre, referencia:referencia, precio:precio, peso:peso, categoria:categoria, stock:stock},
		})
		.done(function(respuesta){
			if (respuesta.trim() === "true") {
				Swal.fire(
				  'Producto modificado exitosamente!',
				  '',
				  'success'
				)
				.then(function(){ 
				   location.reload();
				});

			}else if(respuesta.trim() === "campos vacios") {
				Swal.fire(
				  'Uno o mas campos están vacios',
				  '',
				  'error'
				)
			}
		})
		.fail(function(){
			Swal.fire(
				'Error al editar el producto',
				'',
				'error'
			)
		});
	
	});


	function eliminarProducto(obj) {

		let parent = obj.parentElement;

		parent = parent.parentElement;

		let id = parent.getElementsByTagName("td")[0].innerHTML;
		let txtNombre = parent.getElementsByTagName("td")[1].innerHTML;

		Swal.fire({
		  title: `Seguro que quieres eliminar el producto ${txtNombre}?`,
		  text: "",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Eliminar producto'
		}).then((result) => {
		if (result.isConfirmed) {

		  	$.ajax({
				url: 'actions.php' ,
				type: 'POST' ,
				dataType: 'html',
				data: {eliminar_producto: "eliminar_producto", id:id},
			})
			.done(function(respuesta){
				if (respuesta.trim() === "true") {
					Swal.fire(
					  'Producto eliminado exitosamente!',
					  '',
					  'success'
					)
					.then(function(){ 
					   location.reload();
					});

				}else {
					Swal.fire(
					  'Error al eliminar el producto',
					  '',
					  'error'
					)
				}
			})
			.fail(function(){
				Swal.fire(
					'Error al eliminar el producto',
					'',
					'error'
				)
			});
		}})
	}

	$("#select_productos").on("change", function(event) {

	  let id = $("#select_productos").val();

	  let inputStock = $("#total_stock");

	  let avisoStock = $("#txt_aviso_stock");

	  	$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {get_producto:'get_producto', id: id},
		})
		.done(function(respuesta){
			
			let data = JSON.parse(respuesta);
			
			avisoStock.html(`La cantidad solicitada no debe superar <b>${data.stock}</b>`);

			inputStock.val(data.stock);
		})	
	});


	$("#form_crear_venta").submit(function(event) {

	  event.preventDefault();

	  let id = $("#select_productos").val();
	  let cantidad = parseInt($("#input_cantidad").val());
	  let stock = parseInt($("#total_stock").val());

	  if (cantidad > stock) {
	  	Swal.fire(
			'La cantidad solicitada no puede superar el stock',
			'',
			'error'
		)
	  }else {
	  	$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {crear_venta: "crear_venta", id:id, cantidad:cantidad, stock:stock},
		})
		.done(function(respuesta){
			
			if(respuesta.trim() === "campos vacios") {
				Swal.fire(
				  'Uno o mas campos están vacios',
				  '',
				  'error'
				)

			}else if(respuesta.trim() === "cantidad mayor a stock") {
				Swal.fire(
				  'La cantidad solicitada no puede superar el stock',
				  '',
				  'error'
				)

			}else {
				Swal.fire(
				  'Venta registrada exitosamente!',
				  '',
				  'success'
				)
				.then(function(){ 
				   location.reload();
				});
			}
		})
		.fail(function(){
			Swal.fire(
				'Error al registrar la venta',
				'',
				'error'
			)
		});
	  }
	});


	$("#btn_prod_stock").on("click", function() {

		$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {top_stock: "top_stock"},
		})
		.done(function(respuesta){

			let data = JSON.parse(respuesta);

			Swal.fire(`El producto con mas stock es ${data[0].nombre} con un total de ${data[0].stock} items`)
		})
	});


	$("#btn_prod_ventas").on("click", function() {

		$.ajax({
			url: 'actions.php' ,
			type: 'POST' ,
			dataType: 'html',
			data: {top_ventas: "top_ventas"},
		})
		.done(function(respuesta){

			let data = JSON.parse(respuesta);

			Swal.fire(`El producto con mas ventas es ${data[0].nombre} con un total de ${data[0].total} ventas`)
		})
	});

</script>
</html>