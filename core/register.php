<?php
require('database.php');

function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if(isset($_POST["submit"])){
    $fname = validate($_POST["fname"]);
    $lname = validate($_POST["lname"]);
    $utype = validate($_POST["utype"]);
    $email = validate($_POST["email"]);
    $bdate = validate($_POST["bdate"]);
    $address = validate($_POST["address"]);
    $sex = validate($_POST["sex"]);
    $password = validate($_POST["pass"]);
    $verified = validate($utype)=='Patient'?1:0;

    $sql = "EXEC [dbo].[findUser] @Username=?";
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_prepare($conn, $sql, array(&$email), $options);
    if(!sqlsrv_execute($stmt))
        die( print_r( sqlsrv_errors(), true));
    
    $row_count = sqlsrv_num_rows( $stmt );
    if($row_count>0)
    header("Location: ../sign-up.php?error=username already in use");

    $sql = "EXEC [dbo].[InsertNewUser] @Fname=?,@Lname=?,@Username=?,@Password =?,@Sex=?,@Bdate=?,@Address=?,@User_Type=?,@Verified=?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$fname, &$lname,&$email,&$password,&$sex,&$bdate,&$address,&$utype,&$verified));
    if(!sqlsrv_execute($stmt))
    print_r( sqlsrv_errors());

    header("Location: ../index.php");

}

sqlsrv_close($conn);  

?>