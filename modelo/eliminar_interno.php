<?php
include '../base_datos/conexion_agenda.php';

if($_POST['id']) {

    $id = $_POST['id'];

    $sql = "DELETE FROM internos WHERE id='$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));  
}
?>