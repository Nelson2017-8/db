<?php
	// variables relativas
	$pesosColombiano =4120.50; // 1 dolar

	// Requerimos el archivo conexion.php
	require_once "conexion.php";

	// Recogemos los datos del formulario. REQUEST accepta tanto datos POST, GET Y CACHE
	$consulta = $_REQUEST['consulta']; // envia un valor del 1 al 10

	// Dependiendo del numero de $consulta, realizo el SQL
	$sql = "";
	switch ($consulta) {
		case "1":
			$sql = "SELECT descprod FROM tproductos ";
			break;
		case "2":
			$sql = "SELECT descprod,pvprod FROM tproductos ";
			break;
		case "3":
			$sql = "SELECT * FROM tproductos WHERE pvprod > 50";
			break;
		case "4":
			$sql = "SELECT * FROM tproductos WHERE pvprod > 60 AND pvprod < 120";
			break;
		case "5":
			$sql = "SELECT (pvprod * $pesosColombiano),descprod FROM tproductos";
			break;
		case "6":
			$sql = "SELECT sum(pvprod) / count(pvprod) FROM tproductos";
			$sql2 = "SELECT * FROM tproductos";
			break;
		case "7":
			$sql = "SELECT sum(pvprod) / count(pvprod) FROM tproductos WHERE codprov = 2";
			$sql2 = "SELECT * FROM tproductos WHERE codprov = 2";
			break;
		case "8":
			$sql = "SELECT descprod,pvprod FROM tproductos WHERE pvprod > 0 AND pvprod < 180";
			$asc = " ORDER BY pvprod ASC";
			$desc = " ORDER BY descprod DESC";
			break;
		case "9":
			$sql = "SELECT count(pvprod) FROM tproductos WHERE pvprod > 0 AND pvprod < 180";
			$sql2 = "SELECT * FROM tproductos WHERE pvprod > 0 AND pvprod < 180";
			break;
		case "10":
			/*
				Seleciono todos los campos de esta manera para establecer el orden en que se mostrar los datos
				En vez de esto puedo usar el comodin (*), pero los campos se mostrar en el orden que se encuentre
				por defecto en la tabla de MySQL
			*/
			$sql = "SELECT tproveedor.codprov,razon,capital,codprod,descprod,pvprod FROM tproductos,tproveedor WHERE tproveedor.codprov = tproductos.codprov ORDER BY tproveedor.codprov ASC";
			break;

		// MOSTRAR LAS TABLAS
		case "11":
			$sql = "SELECT * FROM tproductos";
			break;

		case "12":
			$sql = "SELECT * FROM tproveedor";
			break;
		default:
			$sql = false;
			break;
	}

	function mostrar($query, $last = false)
	{
		$pesosColombiano = $GLOBALS['pesosColombiano'];
		$return = "";
		if ($last != null) {
		}
		if ( $row = mysqli_fetch_object($query) ) {
			$campo = [];
			$valor = [];
			$i = 0;
			do {
				$array_tmp = [];
				foreach ($row as $key => $value) {
					if ($i == 0) {
						array_push($campo, $key);
					}
					array_push($array_tmp, $value);

				}
				$valor[$i] = $array_tmp;
				$i++;

			} while ($row = mysqli_fetch_object($query));

			if ($last == false)
				$class = "thead-dark";
			else
				$class = "thead-light";

			echo '
			<table class="table">
				<thead class="'.$class.'">
					<tr>
						<th scope="col">#</th>
			';
			foreach ($campo as $value) {
				echo '<th scope="col">';
				switch ($value) {
					case "codprod":
						echo 'Código del Producto';
						break;
					case "descprod":
						echo 'Nombre del Producto';
						break;
					case "pvprod":
						echo 'Precio del Producto (Doláres)';
						break;
					case "codprov":
						echo 'Código del Proveedor';
						break;
					case "razon":
						echo 'Proveedor';
						break;
					case "capital":
						echo 'Capital';
						break;
					case "count(pvprod)":
						echo 'Números de Productos';
						break;
					case "(pvprod * $pesosColombiano)":
						echo 'Precio del Producto (Pesos Colombiano)';
						break;
					case "sum(pvprod) / count(pvprod)":
						echo 'Precio medio total de Productos';
						break;

					default:
						echo $value;
						break;
				}
				echo '</th>';

			}
			echo '
					</tr>
				</thead>
				<tbody>
			';

			for ($i = 0; $i < count($valor); $i++) {
				$id = $i +1;
				echo "<tr>";
				echo '<th scope="row">'. $id .'</th>';
				for ($j = 0; $j < count($valor[$i]); $j++) {
					echo "<td> ". $valor[$i][$j] ."</td>";
				}
				echo "</tr>";
			}

			echo '
				</tbody>
			</table>';

		}

		return $return;
	}

	if ($sql != false) {
		if (isset($sql2) || isset($asc)) {
			if ($consulta == 8) {
				$query = mysqli_query(conexion(), $sql.$asc);
				$query2 = mysqli_query(conexion(), $sql.$desc);
				echo mostrar($query);
				echo mostrar($query2, true);
			}else{
				$query = mysqli_query(conexion(), $sql);
				$query2 = mysqli_query(conexion(), $sql2);
				echo mostrar($query);
				echo mostrar($query2, true);
			}
		}else{
			$query = mysqli_query(conexion(), $sql);
			echo mostrar($query);
		}

	}