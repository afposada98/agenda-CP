<?php
include '../base_datos/conexion_agenda.php';
include '../enlaces/enlaces.php';

if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];    
}
else 
$id=0;

$sql="SELECT * FROM externos WHERE ID_EMPRESA='$id'";
$query=mysqli_query($link,$sql) or die(mysqli_error($link));
$row=mysqli_fetch_array($query);

?>

<html>
<head>
    <title>Editar Contacto</title>
</head>

<body>

<div class="container" style="width:100%;">
        <div class="titulos" style="text-align: center;background-color: steelblue;color: white;border-radius: 15px 15px 0px 0px;padding: .5em;margin-top: 40px;">
            <h1><?php echo $row['nombre_empresa']; ?>  </h1>
        </div>

        <div class="card" style="border-width:5px; border-color:steelblue; border-radius:0px 0px 15px 15px; background-color:whitesmoke;padding:20px;">

        <form class="row" action="../modelo/editar_contacto.php" method="post">

            <input type="text" name="id" hidden value="<?php echo $row['id_empresa']; ?>">

            <div class="form-group col-md-3">
                <label class="label" for="">Nombre Empresa</label>
                <input type="" class="form-control" name="nombre" value="<?php echo $row['nombre_empresa']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label class="label" for="">Contacto</label>
                <input type="" class="form-control" name="contacto" value="<?php echo $row['contacto']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label class="label" for="country">E-mail</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>

           

            <div class="form-group col-md-3">
                <label class="label" for="number">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label class="label" for="number">Teléfono 1</label>
                <input type="text" class="form-control" name="telefono1" value="<?php echo $row['telefono1']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label class="label" for="country">Teléfono 2</label>
                <input type="text" class="form-control" name="telefono2" value="<?php echo $row['telefono2']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label class="label" for="country">Teléfono 3</label>
                <input type="text" class="form-control" name="telefono3" value="<?php echo $row['telefono3']; ?>">
            </div>  

            <div class="form-group col-md-1">
                <label class="label" for="country">Ext.</label>
                <input type="text" class="form-control" name="ext" value="<?php echo $row['ext_telefono']; ?>">
            </div> 
            
            <div class="form-group col-md-2">
                <label class="label" for="">Tipo</label>
                <select class="form-select" name="tipo">
                    <?php
                    
                    $tipo = $row['tipo'];

                    if ( $tipo == "publico") { ?>
                        <option selected value="publico">Público</option>
                        <option value="privado">Privado</option>
                    <?php } else { ?>
                        <option selected value="privado">Privado</option>
                        <option value="publico">Público</option>

                    <?php } ?>

                </select>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit"  class="btn" style="background: steelblue;color:white;margin-bottom:-20px">Modificar</button>
                <a type="button" href="inicio_externos.php" class="btn " style="background:tomato;color:white;margin-bottom:-20px" >Cancelar</a>

            </div>

        </form>
        </div>
        <div class="text-center">
        </div>
    </div>

</body>
</html>