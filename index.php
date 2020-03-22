<!DOCTYPE html>
<html>
<head>
	<title>Consulta SQL</title>
	<link rel="stylesheet" href="bootstrap4.2.1/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Consulta SQL</h1>
				<form class="col-md-8 offset-md-2">
					<div class="form-group">
						<label for="consulta">Seleccione la consulta a la base de datos</label>
						<select class="form-control" name="consulta" id="consulta">
							<option value="1">1. Obtener los nombre de los productos de la tienda</option>
							<option value="2">2. Nombre y precios de los productos de la tienda.</option>
							<option value="3">3. Muestra los productos cuyo precio sea mayor de $50.</option>
							<option value="4">4. Todos los datos de los productos cuyo precio sea mayor de $60 y menor de$120.</option>
							<option value="5">5. Nombre y precio de los productos en Pesos colombianos</option>
							<option value="6">6. Precio medio del total de productos.</option>
							<option value="7">7. Precio medio de los productos cuyo código de proveedor sea el Nro. 2.</option>
							<option value="8" data-copy="8. Nombre y precio de productos cuyo precio sea mayor de 0 y menor de 180 $ ordenado en forma ascendente por precio y luego descendente por nombre">8. Nombre y precio de productos cuyo precio sea mayor de 0 y ....</option>
							<option value="9">9. Obtener el número de productos cuyos precios sea mayor de 0 y menor de 180 $.</option>
							<option value="10" data-copy="10. Listado completo de productos incluyendo por cada producto el proveedor ordenado por proveedor ascendentemente">10. Listado completo de productos incluyendo por cada producto ...</option>
						</select>
						<small id="consultaHelp" class="form-text text-muted mt-2"></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn-primary btn">Consultar</button>
						<button type="button" data-value="11" class="all btn-secondary btn">Mostrar Productos</button>
						<button type="button" data-value="12" class="all btn-secondary btn">Mostrar Proveedores</button>
					</div>
				</form>
			</div>
			<div class="col-md-12 mt-5">
				<div id="mostrar"></div>
			</div>
		</div>
	</main>


	<div class="modal fade" id="nelson" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="inline">
						<div class="modal-img">
							<img src="img/nelson.jpg" alt="Nelson Portillo" class="img-circle">
						</div>
						<p>Nelson Portillo.</p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<b>Datos del Alumno</b>
					<ul>
						<li><b>Nombre:</b> Nelson Portillo</li>
						<li><b>CI:</b> 27686483</li>
						<li><b>Materia:</b> Base de datos</li>
						<li><b>Sessión:</b> 203A1</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="nestor" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="inline">
						<div class="modal-img">
							<img src="img/nestor.jpg" alt="Nelson Portillo" class="img-circle">
						</div>
						<p>Nestor Lopéz.</p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<b>Datos del Alumno</b>
					<ul>
						<li><b>Nombre:</b> Nestor Lopéz</li>
						<li><b>CI:</b> 27037861</li>
						<li><b>Materia:</b> Base de datos</li>
						<li><b>Sessión:</b> 203A1</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer mt-auto py-3">
		<div class="container text-center">
			<span class="text-muted">Desarrollador por <a id="click" href="#" data-toggle="modal" data-target="#nelson" data-tour-title="Más información">Nelson Portillo</a> y <a href="#" data-toggle="modal" data-tour-title="Más información" data-target="#nestor">Nestor Lopéz</a>.</span>
		</div>
	</footer>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap4.2.1/bootstrap.bundle.js"></script>
	<script src="js/tour.js"></script>
	<script src="js/main.js"></script>
</body>
</html>