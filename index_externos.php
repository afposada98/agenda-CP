<html>
<head>

<link rel="stylesheet" type="text/css"  href="css.css"/>  
 
<?php 
include 'base_datos/conexion_agenda.php';
include 'enlaces/enlaces.php';
 ?>

    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "./serverside/getDataPublic.php",           
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "order": [
            [0, "asc"]
            ]
            });
        });
    </script>

</head>
<br>
<body class="text-center" style="margin-bottom: 10px;">              
        <div class="container" style="max-width: 85%;">
        
        <div class="col-12" style="background:teal;padding: 15px;border-radius:200px 200px 20px 20px;margin-bottom: 10px;">
            <h1 style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:white">Agenda Externa Clínica Palmira</h1>
        </div> 

        <div class="row">
            <div class="col-2">
                <a class="btn" href='index.php' style="color:white; background-color: steelblue; font-size: 18px;float:left;">Internos</a>
            </div>
            <div class="col-8 text-center"></div>
            <div class="col-2">
                <a class="btn" href='vista/login.php' style="color:white; background-color: mediumpurple; font-size: 18px;float:right;margin-bottom:10px">Iniciar Sesión</a>
            </div>
            <table id="example2" class="row-border hover cell-border">
            <caption>Agenda de Externos de Clínica Palmira</caption>
                <thead style='color:white; background-color:teal'>
                    <th>Nombre Entidad</th>
                    <th>Contacto</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Teléfono 3</th>
                    <th>Extensiones</th>                    
                </thead>
            </table>
        </div>
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

<script type="text/javascript">
    function cargar_ajax1(div, url) {

        $.post(
            url,
            function(resp) {
                $("#" + div + "").html(resp);
            }
        );
    }

    function volver() {
			document.location = ('http://intranet/cpalmira/');
		}
</script>


