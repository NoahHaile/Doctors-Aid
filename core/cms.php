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

    $sql = "EXEC [dbo].[InsertNewMedication] @name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeMedSet.php?success=New Medication successfully added to DB");

}

if(isset($_POST['sub2'])){
    $select = $_POST['form2select'];
    $name = validate($_POST['name']);
    $dec = validate($_POST['txtbox']);

    $sql = "EXEC [dbo].[updateMedication] @id=?,@name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select, &$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeMedSet.php?success=Desease successfully Updated");
}

if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC [dbo].[deleteMedication] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeMedSet.php?success= Desease successfully Deleted");

}

if(isset($_POST['sub4'])){
    $select = $_POST['form4select'];
    $arr = explode(" ",$select);
    $sql = "EXEC [dbo].[deleteCrossMedication] @idMed=?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$arr[1], &$arr[0]));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeMedSet.php?success= Cross References successfully Deleted");
}

if(isset($_POST['sub5'])){
    $select1 = $_POST['form5select1'];
    $select2 = $_POST['form5select2'];

    $sql = "EXEC [dbo].[insertNewCrossMedication] @idMed=?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select1, &$select2));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeMedSet.php?success= New Cross References successfully Added");

}

sqlsrv_close($conn);  

?>