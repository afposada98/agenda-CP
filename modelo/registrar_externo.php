<?php  
session_start();
include '../enlaces/enlaces.php';
include '../base_datos/conexion_agenda.php';

$empresa = $_POST['empresa'];
$contacto = $_POST['contacto'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$telefono3 = $_POST['telefono3'];
$ext = $_POST['ext'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$tipo = $_POST['tipo'];

echo '.';
 $sql = "INSERT INTO externos (nombre_empresa, contacto, telefono1, telefono2, telefono3, email, direccion, ext_telefono, tipo)
VALUES ( '$empresa', '$contacto', '$telefono1', '$telefono2', '$telefono3', '$email', '$direccion', '$ext', '$tipo')";

$resultado = mysqli_query($link,$sql) or die("Error: ".mysqli_error($link));	

if (isset($resultado)){ ?>
	<script>
	Swal.fire({
	icon: 'success',
	title: 'Contacto Añadido',
	 confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
	  
	window.location='../vista/inicio_externos.php';
  } else if (result.isConfirmed == false) {
	window.location='../vista/inicio_externos.php';
  }
})
	</script> 
	<?php

}

?>