<?php

function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include 'database.php';
if(isset($_POST['sub1'])){
    $title = validate($_POST['title']);
    $info = validate($_POST['info']);

    $sql = "EXEC [dbo].[insertNewFaq] @title=?, @info=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$title, &$info));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeFaqSetting.php?success=New Faq successfully added to DB");

}

 if(isset($_POST['sub2'])){
    $select = $_POST['form2select'];
    $title = validate($_POST['name']);
    $info = validate($_POST['txtbox']);

    $sql = "EXEC [dbo].[updateFaq]  @id=?,  @title=?,@info=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select, &$title, &$info));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeFaqSetting.php?success=New Faq successfully added to DB");
}
if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC[dbo].[deleteFaq] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeFaqSetting.php?success=Faq successfully Deleted");

}

/*
if(isset($_POST['sub3'])){
    $select = $_POST['form3select'];

    $sql = "EXEC [dbo].[deleteDisease] @id=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$select));
   
    if(!sqlsrv_execute($stmt))
    die( print_r( sqlsrv_errors(), true));
    
    header("Location: ../ChangeFaqSetting.php?success=Faq successfully Deleted");


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

}*/
?> 