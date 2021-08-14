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
<?php 
$sql = "SELECT * FROM internos";
$query = mysqli_query($link, $sql) or die(mysqli_error($link));
?>

<body class="text-center" style="margin-bottom: 10px;"> 
    <div class="container" style="max-width: 80%;">
        <div class="col-12" style="background:steelblue;padding: 15px;border-radius:200px 200px 20px 20px;margin-bottom: 10px;">
            <h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;display: inline-block;color:white">Agenda Interna Clínica Palmira</h1>
        </div>
        <div class="row">
        <div class="col-2">
                <a class="btn" href='index_externos.php' style="color:white; background-color: teal; font-size: 18px;float:left;">Externos</a>
            </div>
            <div class="col-8 text-center"></div>
            <div class="col-2">
                <a class="btn" href='vista/login.php' style="color:white; background-color: mediumpurple; font-size: 18px;float:right;margin-bottom:10px;">Iniciar Sesión</a>
            </div>
            
            <table id="example2" class="row-border hover cell-border">
            <caption>Extensiones Internas de Clínica Palmira</caption>
                <thead style='color:white; background-color:#5e8eb5'>  
                <tr>          
                    <th>Ubicación</th>
                    <th>Encargado</th>
                    <th>Extensión</th>     
                </tr>                            
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_array($query)){?>
                        <tr>
                        <th><?php echo $row['descripcion'] ?> </th>
                        <td><?php echo $row['encargado'] ?> </td>   
                        <th><?php echo $row['ext'] ?> </th> 
                        </tr>
                    <?php } ?>  
                                      
                </tbody>            
            </table>
        </div>
    </div>
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

