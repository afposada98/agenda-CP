<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => 'CP69775WD', 
    'db'   => 'agenda' 
); 
 
// DB table to use 
$table = 'externos'; 
/* $Table = "( 
      SELECT a.id AS crmid, b.name 
      FROM forms a 
      INNER JOIN users b ON a.agent_id = b.id 
    ) table"; */
 
// Table's primary key 
$primaryKey = 'id_empresa'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'id_empresa', 'dt' => 0 ),
    array( 'db' => 'nombre_empresa', 'dt' => 1 ), 
    array( 'db' => 'contacto', 'dt'  => 2 ), 
    array( 'db' => 'telefono1', 'dt' => 3 ), 
    array( 'db' => 'telefono2', 'dt' => 4 ), 
    array( 'db' => 'telefono3', 'dt' => 5 ),
    array( 'db' => 'ext_telefono', 'dt' => 6 ),
    array( 'db' => 'tipo', 'dt' => 7 ),


); 
 
// Include SQL query processing class 
require ('ssp.class.php'); 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);

?>