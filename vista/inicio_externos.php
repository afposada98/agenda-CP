<html>

    <head>
   

    <link rel="stylesheet" type="text/css" href="../css.css"/>

    <?php
    include '../base_datos/conexion_agenda.php';
    include '../enlaces/enlaces.php';

    ?>
    </head>
<br>
<body class="text-center">
<div class="container" style="max-width: 85%;margin-top:0px;">

    <div class="col-12" style="background:teal;padding: 15px;border-radius:15px;margin-bottom: 20px;">
    <h1 style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:white">Agenda Externa Clínica Palmira</h1>

    </div> 

        <div class="row">
            <div class="col-2">
                <a data-toggle="modal" class="btn" href='#registro' style="color:white; background-color: teal; margin-bottom:15px;font-size:17px;float:left;"><i class="fas fa-user-plus"></i> Agregar</a>
            </div>
            <div class="col-7"></div>
            <div class="col-3" style="text-align: end;">
                <a class="btn" href='inicio_internos.php' style="color:white; background-color: steelblue; font-size: 18px;">Internos</a>
                <a class="btn btn-danger" href='../logout.php' style="font-size: 18px;">Cerrar Cesión</a>
            </div>
        </div>

        <table id="example2" class="table display table-bordered table-striped">
            <thead style='color:white; background-color:teal'>
                <th class="">Id</th>
                <th class="">Nombre Entidad</th>
                <th class="">Contacto</th>
                <th class="">Teléfono1</th>
                <th class="">Teléfono2</th>
                <th class="">Teléfono3</th>
                <th class="">Extensiones</th>
                <th class="">Tipo</th>
                <th class="">Opciones</th>
            </thead>          
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

        <script>
            $(document).ready(function() {

                table = $('#example2').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "deferrender": true,
                    "ajax": "../serverside/getDataAll.php",
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    "order": [
                    [1, "asc"]
                    ],
                    "columnDefs": [{
                        "width": "15%",
                        "targets": -1,
                        "defaultContent": "<div class='text-center'><button title='Ver Contacto' class='btn btnVer' style='background-color:steelblue;color:white;padding:7px;'> <i class='fas fa-search'></i></button> <button title='Modificar Contacto' class='btn  btnEditar' data-toggle='tooltip' style='background-color:teal;color:white;padding:7px;'> <i class='fas fa-pencil-alt'></i> </button> <button class='btn  btn-danger btnBorrar' data-toggle='tooltip' title='Eliminar Contacto' style='padding:8px;'><i class='fas fa-trash-alt''></i></button></div>"
                    }],
                });
            });

        </script>

        <script>       // SELECCIONAR ID PARA ELIMINAR 
            $(document).on("click", ".btnBorrar", function() {
                user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
                if (user_id) {
                    Swal.fire({
                        title: '¿Seguro que desea...',
                        text: 'eliminar el contacto con número de Id ' + user_id + ' ?',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (result.isConfirmed) {                          
                            eliminarContacto(user_id); // SI DICE QUE SI, SE LLAMA A LA FUNCION PARA ELIMINAR                                                       
                        } else {
                            swal.showInputError("error");
                            return false;
                        }
                    })

                }
            });

        </script>

        <script>  //TRAE EL ID DEL REGISTRO SELECCIONADO PARA EDITARLO O VERLO COMPLETO

            $(document).on("click", ".btnEditar", function() {  //EDITAR
                id = parseInt($(this).closest('tr').find('td:eq(0)').text());
                window.location='editar_contacto.php?id='+id;
            });

            $(document).on("click", ".btnVer", function(){  //CONSULTAR
                id=parseInt($(this).closest('tr').find('td:eq(0)').text());
                window.location='ver_contacto.php?id='+id;
            });


        

        </script>

        <script> //FUNCION QUE ENVIA LOS DATOS A OTRA PAGINA PARA HACER EL QUERY Y ELIMINAR EL REGISTRO
            function eliminarContacto(user_id){
                var datos = { "user_id":user_id };
                var url = '../modelo/eliminar_contacto.php';

                $.ajax({
                        data: datos,
                        url: url,
                        type: 'POST',
                        success:  function (response) {
                        table.ajax.reload();
                        Swal.fire(
                        'Registro Eliminado',
                        '',                        
                        'success'
                        );
                        },
                        error: function (error) {
                        Swal.fire(
                        'Error al Eliminar',
                        'Hubo un error al intentar eliminar, intentelo de nuevo',
                        'error'
                        );
                        }
                });
            }       

        </script>



<!---------------------------------------------------------------- INICIO MODAL AGREGAR REGISTRO ---------------------------------------------------------------->
<div class="modal fade" id="registro">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Contacto</h5>

            </div>
            <div class="modal-body">
                <form class="row g-3" action="../modelo/registrar_externo.php" method="POST" style="padding:20px;">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nombre de la Empresa<p style="color:purple;display:inline;">*</p></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" required>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Nombre del Contacto</label>
                        <input type="text" class="form-control" id="contacto" name="contacto">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Teléfono 1<p style="color:purple;display:inline;">*</p></label>
                        <input type="text" class="form-control" id="telefono1" name="telefono1" minlength="3" required>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Teléfono 2</label>
                        <input type="text" class="form-control" id="telefono2" name="telefono2">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Teléfono 3</label>
                        <input type="text" class="form-control" id="telefono3" name="telefono3">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Extensión</label>
                        <input type="text" class="form-control" id="ext" name="ext">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Dirección </label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>

                    <div class="col-2">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-select">
                            <option value="publico" selected>Público</option>
                            <option value="privado">Privado</option>
                        </select>
                    </div>

                    <div class="modal-footer" style="margin-bottom:-45px;">
                        <button type="submit" class="btn btn-success" >Agregar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!----------------------------------------------------------------- FIN MODAL REGISTRO----------------------------------------------------------------->
<style>
    .form-label {
        float: left;
    }
</style>