<?php

function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include 'database.php';
if(isset($_POST['sub1'])){
    $name = validate($_POST['name']);
    $dec = validate($_POST['dec']);

    $sql = "EXEC [dbo].[InsertNewSymptom] @name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeSymptomSetting.php?success=New desease successfully added to DB");

}

if(isset($_POST['sub2'])){
    $select = $_POST['form2select'];
    $name = validate($_POST['name']);
    $dec = validate($_POST['txtbox']);

    $sql = "EXEC [dbo].[updateSymptom] @id=?,@name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select, &$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
     header("Location: ../ChangeSymptomSetting.php?success=symptom successfully updated");
}


 if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC [dbo].[deleteSymptom] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeSymptomSetting.php?success=symptom successfully Deleted");

}

?>