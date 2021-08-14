<?php  
session_start();
include '../enlaces/enlaces.php';
include '../base_datos/conexion_agenda.php';

$descripcion = $_POST['descripcion'];
$encargado = $_POST['encargado'];
$ext = $_POST['ext'];

echo '.';

$sql = "INSERT INTO internos (descripcion,encargado,ext)
VALUES ('$descripcion','$encargado','$ext' )";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Extensión Añadida',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='../vista/inicio_internos.php';
  } else if (result.isConfirmed == false) {
	window.location='../vista/inicio_internos.php';
  }
})
	</script> 
	<?php

}

?>