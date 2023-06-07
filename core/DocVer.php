<?php
require('database.php');
if(isset($_POST['delete'])){
    $username = $_POST['delete'];

    $sql = "EXEC [dbo].[rejectDoctorVerification] @username=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$username));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_rows_affected( $stmt );
    echo $row_count;
}

if(isset($_POST['accept'])){
    $username = $_POST['accept'];

    $sql = "EXEC [dbo].[verifyDoctor] @username=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$username));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_rows_affected( $stmt );
    echo $row_count;
}

sqlsrv_close($conn);
?>