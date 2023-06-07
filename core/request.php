<?php
session_start();
require("database.php");

if(isset($_POST['sendto'])){
    $uname  = $_POST['sendto'];
    $msg = $_POST['msg'];
    $sql = "EXEC  [dbo].[SendRequest] @docUserName =?,@patientUserName =?, @message=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$uname, &$_SESSION['Username'], $msg));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_rows_affected( $stmt );
echo $row_count;
}

if(isset($_POST['cancel'])){
    $uname  = $_POST['cancel'];
    $sql = "EXEC [dbo].[cancelRequest] @docUserName =?,@patientUserName =?";

    $stmt = sqlsrv_prepare($conn, $sql, array(&$uname, &$_SESSION['Username']));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_rows_affected( $stmt );
echo $row_count;

}

if(isset($_POST['accept'])){
    $uname  = $_POST['accept'];
    $sql = "EXEC [dbo].[acceptPatientRequest] @docUserName =?,@patientUserName =?";

    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username'], $uname));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_rows_affected( $stmt );
echo $row_count;

}

sqlsrv_close($conn);
?>