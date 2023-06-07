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

    $sql = "EXEC [dbo].[InsertNewDisease] @name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangedieseaseSetting.php?success=New desease successfully added to DB");

}

if(isset($_POST['sub2'])){
    $select = $_POST['form2select'];
    $name = validate($_POST['name']);
    $dec = validate($_POST['txtbox']);

    $sql = "EXEC [dbo].[updateDisease] @id=?,@name=?, @description=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select, &$name, &$dec));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangedieseaseSetting.php?success=Desease successfully Updated");
}


if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC [dbo].[deleteDisease] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangedieseaseSetting.php?success= Desease successfully Deleted");

}

if(isset($_POST['sub4'])){
    $select = $_POST['form4select'];
    $arr = explode(" ",$select);
    $sql = "EXEC [dbo].[deleteCrossDisease] @idSymp =?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$arr[0], &$arr[1]));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangedieseaseSetting.php?success= Cross References successfully Deleted");

}

if(isset($_POST['sub5'])){
    $select1 = $_POST['form5select1'];
    $select2 = $_POST['form5select2'];

    $sql = "EXEC [dbo].[insertNewCrossDisease] @idSymp =?, @idDisease=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select2, &$select1));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangedieseaseSetting.php?success= New Cross References successfully Added");

}
sqlsrv_close($conn);  

?>