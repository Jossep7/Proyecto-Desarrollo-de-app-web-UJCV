<?php
	ob_start();
	session_start();
	if (empty($_SESSION['active'])) {
		header('location: ../');
	}
	include "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  />
	  <link href="assets/css/now-ui-dashboard.min.css" rel="stylesheet" />
		<link href="{{ public_path('css/bootstrap.min.css') }}" />
		<link href="{{ public_path('css/now-ui-dashboard.min.css') }}" />

	   <img src="http://localhost/proyecto123/sistema/img/logo.jpg" width="100" />
	</head>

	<body>
		<h1 class="text-center" style="">I MUSIC</h1>
		<h3 class="text-center" style="">Reporte de Productos</h3>
<div class="content">
	<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">


				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="table">
						<thead class="thead-dark">
							<tr>
								<th>ID</th>
								<th>PRODUCTO</th>
								<th>PRECIO</th>
								<th>STOCK</th>

							</tr>
						</thead>
						<tbody>
							<?php
							include "../conexion.php";

							$query = mysqli_query($conexion, "SELECT * FROM producto");
							$result = mysqli_num_rows($query);
							if ($result > 0) {
								while ($data = mysqli_fetch_assoc($query)) { ?>
									<tr>
										<td><?php echo $data['codproducto']; ?></td>
										<td><?php echo $data['descripcion']; ?></td>
										<td><?php echo $data['precio']; ?></td>
										<td><?php echo $data['existencia']; ?></td>

									</tr>
							<?php }
							} ?>
						</tbody>

					</table>
				</div>

			</div>
		</div>
</div>
</body>
<footer>
	<?php
 $Object = new DateTime();
 $DateAndTime = $Object->format("d-m-Y h:i:s a");
 echo "$DateAndTime.  ---      ";
 echo "Usuario: ";
 echo $_SESSION['user'];
 echo " ---";
 ?>


</footer>
</html>

<?php
$html=ob_get_clean();
//echo $html;


	require_once 'libreria/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();



	$dompdf->loadHtml($html);

	$dompdf->setPaper('letter');

	$dompdf->render();

	$dompdf->stream("Reporte_Usuarios.pdf", array("Attachment" => false));


 ?>
