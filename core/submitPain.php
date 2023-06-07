<?php
include 'database.php';

if(isset($_POST['sub'])){
    $duname =$_POST['duname'];
    $puname =$_POST['puname'];
    $symptoms = $_POST['symptom'];
    $level = $_POST['level'];
    $days = $_POST['days'];
    $photo = file_get_contents($_FILES['img']['tmp_name']);

    $sql = "EXEC [dbo].[InsertNewPain] @patientUName =?, @DoctorUName =?,  @symptom =?, @painLevel =?, @days =?, @photo =?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$puname, &$duname, &$symptoms, &$level, &$days, &$photo));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../pain.php?success= Pain form Successfully sent");

}

sqlsrv_close($conn);
?>