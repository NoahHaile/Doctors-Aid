<?php
session_start();
require('database.php');

function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_POST['sub1'])){
    $sql = "EXEC [dbo].[updateFLA] @Fname =?, @Lname =?, @address =?, @Username=?";

    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $address = validate($_POST['address']);

    $stmt = sqlsrv_prepare($conn, $sql, array(&$fname, &$lname, &$address, &$_SESSION["Username"]));
    if(!sqlsrv_execute($stmt))
    print_r(sqlsrv_errors());


    $sql = "EXEC [dbo].[selectUser] @Username = ?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION["Username"]));

    sqlsrv_execute( $stmt);
$row = sqlsrv_fetch_array($stmt); 
if($row) {
$_SESSION["Fname"] = $row["Fname"];
$_SESSION["Lname"] =  $row["Lname"];
$_SESSION["Address"] = $row["Address"];
}
    header("Location: ../profile.php?success=Profile successfully updated");

}

if(isset($_POST['sub2'])){
    $sql = "EXEC [dbo].[updatePhoto] @photo =?, @Username=?";

    $photo = file_get_contents($_FILES['img']['tmp_name']);

    $stmt = sqlsrv_prepare($conn, $sql, array(&$photo, &$_SESSION["Username"]));
    if(!sqlsrv_execute($stmt))
    print_r(sqlsrv_errors());
    
    $sql = "EXEC [dbo].[selectUser] @Username = ?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION["Username"]));

    sqlsrv_execute( $stmt);
$row = sqlsrv_fetch_array($stmt); 
if($row) {
$_SESSION["photo"] = $row["photo"];
}  
    
    header("Location: ../profile.php?success=Photo successfully updated");

}

if(isset($_POST['sub3'])){
    $sql = "EXEC [dbo].[updatePassword] @passOld =?, @passNew =?, @Username=?";

    $pass = validate($_POST['pass']);
    $npass = validate($_POST['npass']);

    $stmt = sqlsrv_prepare($conn, $sql, array(&$pass, &$npass, &$_SESSION["Username"]));
    if(!sqlsrv_execute($stmt))
    header("Location: ../profile.php?error=".sqlsrv_errors()[0]['message']);

    $row_count = sqlsrv_rows_affected($stmt);  

    if($row_count>0)
    header("Location: ../profile.php?success=Password successfully updated");
    else
    header("Location: ../profile.php?error=Incorrect password");
    
}

sqlsrv_close($conn);  

?>