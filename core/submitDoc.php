<?php
session_start();
require('database.php');

function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['btn'])){
    $sql = "EXEC [dbo].[InsertNewDoctorVerRequest] @Username =?, @Message =?, @photo =?";

    $justification = validate($_POST['just']);
    $data = file_get_contents($_FILES['medical']['tmp_name']);

    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION["Username"], &$justification, &$data));
    if(!sqlsrv_execute($stmt))
    print_r(sqlsrv_errors());
    else
    header("Location: ../waitingAreaForDoc.php");
}

sqlsrv_close($conn);  
?>