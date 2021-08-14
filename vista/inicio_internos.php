<html>

<head>
   

    <link rel="stylesheet" type="text/css" href="../css.css" style="border-radius:30px" />

    <?php
    include '../base_datos/conexion_agenda.php';
    include '../enlaces/enlaces.php';


    $sql = "SELECT * FROM internos";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));

    ?>

    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({     
             
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }, 

            });

        });
    </script>
</head>
<br>
<body class="text-center">
<div class="container" style="max-width: 85%;">
<div class="col-12" style="background:steelblue;padding: 15px;border-radius:15px;margin-bottom: 20px;">
    <h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;display: inline-block;color:white">Agenda Interna Clínica Palmira</h1>

    </div> 
        <div class="row">
            <div class="col-2">
                <a data-toggle="modal" class="btn" href='#registro' style="float:left;color:white; background-color: steelblue; margin-bottom:15px;font-size:17px"><i class="fas fa-user-plus"></i> Agregar</a>
            </div>
            <div class="col-7"></div>
            <div class="col-3" style="text-align: end;">
                <a class="btn" href='inicio_externos.php' style="color:white; background-color: teal; font-size: 18px;">Externos</a>
                <a class="btn btn-danger" href='../logout.php' style="font-size: 18px;">Cerrar Cesión</a>
            </div>
        </div>

        <table id="example2" class="table display table-bordered table-striped">
            <caption>Extensiones Internas de Clínica Palmira</caption>
                <thead style='color:white; background-color:steelblue'>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Encargado</th>                             
                    <th>Extensión</th>
                    <th>Opciones</th>                          
                </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_array($query)){
                    $ext=$row['ext'];
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?> </td> 
                        <th><?php echo $row['descripcion'] ?> </th> 
                        <td><?php echo $row['encargado'] ?> </td> 
                        <th><?php echo $ext ?> </th>
                        <th class="text-center"> 
                        <a class="btn" type="button" onclick="cargar_ajax1('modal_ooo','modal_modificar_interno.php?id=<?=$row['id']?>');" data-toggle="modal" data-target="#modal_ooo" title="Modificar Extensión" style="background-color: cornflowerblue; color:white;padding:8px;" href=""><i class="fas fa-pencil-alt" style="font-size: 15px;"></i></a>                           
                        <a title="Eliminar Extensión" class="btn btn-danger" style="font-size: 15px;padding:9px;" onclick="ConfirmDelete(<?php echo $row['id']?>,<?php echo $row['ext'] ?>)">
                            <i class="fas fa-trash-alt" style="color: white;"></i>
                        </a>
                        </th> 
                    </tr>
                    <?php } ?>                    
                </tbody>            
        </table>
    </div>    
   
    <!--
        < ?php
                        
            $array=array();

            for($i=0;$i<2406;$i++){

            $sql3 = "SELECT COUNT(TELEFONO) FROM telefonos WHERE ID_EMPRESA='$i'";
            $query3= mysqli_query($link,$sql3) or die(mysqli_error($link));
            $count=mysqli_fetch_array($query3);
            $numero_de_telefonos=$count[0];

            if($numero_de_telefonos==2 || $numero_de_telefonos==3 ){
            $a=0;
            $sql2 = "SELECT TELEFONO FROM telefonos WHERE ID_EMPRESA='$i' LIMIT 2";
            $query2 = mysqli_query($link, $sql2) or die(mysqli_error($link));

            while($si= mysqli_fetch_array($query2)){
                $array[$a]=$si['TELEFONO'];
                $a++;
            }
            
            $sql4="UPDATE externos SET TELEFONO2='$array[0]' WHERE ID_EMPRESA='$i'";
            $query4=mysqli_query($link,$sql4) or die(mysqli_error($link));
           
            $sql5="UPDATE externos SET TELEFONO3='$array[1]' WHERE ID_EMPRESA='$i'";
            $query5=mysqli_query($link,$sql5) or die(mysqli_error($link));
            }

            if($numero_de_telefonos==1){
                $sql6="SELECT TELEFONO FROM telefonos WHERE ID_EMPRESA='$i' LIMIT 1";
                $query6=mysqli_query($link,$sql6) or die(mysqli_error($link));
                $consul=mysqli_fetch_array($query6);
                $tel=$consul[0];

                $sql7="UPDATE externos SET TELEFONO2='$tel' WHERE ID_EMPRESA='$i'";
                $query7=mysqli_query($link,$sql7) or die(mysqli_error($link));

            }

        }
        ?>
        -->

</body>
</html>

<!------------------------------------------------------ ELIMINAR PRODUCTO -------------------------------------->
<script type="text/javascript">
  function ConfirmDelete(id,ext) {
    Swal.fire({
      title: '¿Eliminar el id '+id,
      text: 'Con número de extensión '+ext+'?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'No',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {
        eliminarContacto(id);
      } else {       
        swal.showInputError("error");
        return false;
      }
    })
  }

  

    function eliminarContacto(id){
                var datos = { "id":id};
                var url = '../modelo/eliminar_interno.php';
                
                $.ajax({
                    data: datos,
                    url: url,
                    type: 'POST',
                    success: function(response) {
                        Swal.fire({
                            title: 'Extensión Eliminada',
                            icon: 'success',                         
                            confirmButtonText: 'Continuar'
                        }).then((result) => {
                            if(result){
                            window.location='inicio_internos.php';
                            } else {
                                swal.showInputError("error");
                            }
                        });
                          
                        },
                        error: function (error) {                           
                           
                        }
                })

            }
  
</script>
<!---------------------------------------------------------------------------------------------------------------->


<!---------------------------------------------------------------- INICIO MODAL AGREGAR REGISTRO ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog" style="margin-top:3rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Extensión</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="../modelo/registrar_interno.php" method="POST" style="padding:5px;">
                   
                    <div class="col-md-12">
                        <label for="" class="form-label">Descripción<p style="color:purple;display:inline;">*</p></label>
                        <input type="text" class="form-control" id="descripcion" placeholder="Nombre del Área" name="descripcion" minlength="2" required>
                    </div> 

                    <div class="col-md-9">
                        <label for="" class="form-label">Encargado del Área</label>
                        <input type="text" class="form-control" id="encargado" name="encargado" placeholder="Nombre de quien atiende">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Extensión<p style="color:purple;display:inline;">*</p></label>
                        <input type="number" class="form-control" placeholder="Número" id="ext" maxlength="4" min="0" name="ext" required>
                    </div>         

                    <div class="modal-footer" style="margin-bottom:-35px;">
                        <button type="submit" class="btn" style="color:white;background: steelblue;" >Agregar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!----------------------------------------------------------------- FIN MODAL REGISTRO----------------------------------------------------------------->


<!------------------------------------------ MODAL EDITAR ------------------>
<div class="modal" id="modal_ooo" tabindex="1" data-dismiss="modal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> ... </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

 <!--------------------- FIN MODAL EDITAR------->

 <script>
  function cargar_ajax1(div, url) {

$.post(
    url,
    function(resp) {
        $("#" + div + "").html(resp);
    }
);
}
 </script>

<style>
    .form-label {
        float: left;
    }
</style>

