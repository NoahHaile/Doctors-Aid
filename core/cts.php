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

    $sql = "EXEC [dbo].[InsertNewTest] @name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeTestSetting.php?success=Test successfully added to DB");

}

if(isset($_POST['sub2'])){
    $select = $_POST['form2select'];
    $name = validate($_POST['name']);
    $dec = validate($_POST['txtbox']);

    $sql = "EXEC [dbo].[updateTest] @id=?,@name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select, &$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeTestSetting.php?success=Test successfully Edited to DB");
}


if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC [dbo].[deleteTest] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeTestSetting.php?success=Test successfully deleted to DB");

}

if(isset($_POST['sub4'])){
    $select = $_POST['form4select'];
    $arr = explode(" ",$select);
    $sql = "EXEC [dbo].[deleteCrossTest] @idTest=?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$arr[0], &$arr[1]));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeTestSetting.php?success=CrossTest successfully deleted ");

}

if(isset($_POST['sub5'])){
    $select1 = $_POST['form5select1'];
    $select2 = $_POST['form5select2'];

    $sql = "EXEC [dbo].[insertNewCrossTest] @idTest =?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select1, &$select2));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeTestSetting.php?success=New CrossTest successfully added to DB");

}
?>