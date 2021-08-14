<?php
include '../base_datos/conexion_agenda.php';

if($_POST['user_id']) {

    $id = $_POST['user_id'];

    $sql = "DELETE FROM externos WHERE id_empresa='$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));  
}
?>