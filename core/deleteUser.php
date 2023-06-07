<?php
require('database.php');

if(isset($_POST['username'])){
$username = $_POST['username'];
$sql = "EXEC [dbo].[DeleteUser] @username=?";

$stmt = sqlsrv_prepare($conn, $sql, array(&$username));
if(!sqlsrv_execute($stmt))
    echo sqlsrv_errors()[0]['message'];

$row_count = sqlsrv_rows_affected( $stmt );
echo $row_count;
}


sqlsrv_close($conn);  

?>