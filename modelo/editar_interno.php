<?php

include '../base_datos/conexion_agenda.php';
include '../enlaces/enlaces.php';

echo '.';   


$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$encargado = $_POST['encargado'];
$ext = $_POST['ext'];


$sql = "UPDATE internos SET descripcion='$descripcion', encargado='$encargado', ext='$ext' 
WHERE id='$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));

if (isset($query)) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Extensión Modificada',
            confirmButtonText: `Aceptar`,
        }).then((result) => {
            if (result.isConfirmed) {

                window.location = '../vista/inicio_internos.php';
            } else if (result.isConfirmed == false) {
                window.location = '../vista/inicio_internos.php';
            }
        });
    </script>

<?php
}


?>