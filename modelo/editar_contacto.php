<?php

include '../base_datos/conexion_agenda.php';
include '../enlaces/enlaces.php';

echo '.';   


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$email = $_POST['email'];
$tel1 = $_POST['telefono1'];
$tel2 = $_POST['telefono2'];
$tel3 = $_POST['telefono3'];
$direccion = $_POST['direccion'];
$tipo = $_POST['tipo'];
$ext = $_POST['ext'];


$sql = "UPDATE externos SET nombre_empresa='$nombre', contacto='$contacto', email='$email', direccion='$direccion', telefono1='$tel1', 
telefono2='$tel2', telefono3='$tel3', ext_telefono='$ext', tipo='$tipo' WHERE id_empresa='$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));

if (isset($query)) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Contacto Modificado',
            confirmButtonText: `Aceptar`,
        }).then((result) => {
            if (result.isConfirmed) {

                window.location = '../vista/inicio_externos.php';
            } else if (result.isConfirmed == false) {
                window.location = '../vista/inicio_externos.php';
            }
        });
    </script>

<?php
}


?>