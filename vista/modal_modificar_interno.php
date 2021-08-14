<?php

include '../base_datos/conexion_agenda.php';


$id = $_REQUEST['id'];

$sql = "SELECT * FROM internos
WHERE id = '$id'";

$query = mysqli_query($link, $sql) or die(mysqli_error($link));
$ficha = mysqli_fetch_array($query);
 

?>

<div class="card mx-auto" style="width: 35rem; text-align:center; margin-top:3em;">
 <h5 class="card-header"><?=$ficha['descripcion'];?></h5>
  <div class="card-body">
    <h5 class="card-title"> Editar Extensión</h5> 
    <form action="../modelo/editar_interno.php" class="row g-3" method="POST" class="form-group">
         
            <input type="hidden" name="id" value="<?=$id?>">  

            <div class="col-md-12">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" value="<?php echo $ficha['descripcion']; ?>" id="descripcion" name="descripcion" required>
            </div> 

            <div class="col-md-8">
                <label class="form-label">Encargado del Área</label>
                <input type="text" class="form-control" value="<?php echo $ficha['encargado']; ?>" id="encargado" name="encargado">
            </div>

            <div class="col-md-4">
                <label class="form-label">Extensión<p style="color:purple;display:inline;">*</p></label>
                <input type="number" class="form-control" min="0" value="<?php echo $ficha['ext']; ?>" id="ext" name="ext" maxlength="4" required>
            </div>   

  
            <div class="modal-footer" style="margin-bottom:-30px;">
                <button type="submit" class="btn" style="background: steelblue; color:white" >Modificar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </form>    
        </div>

  </div>

</div>