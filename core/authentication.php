<?php

require('database.php');

if(isset($_POST['submit'])){
$uname = $_POST['username'];
$pass = $_POST['password'];

    $sql = "EXEC [dbo].[loginUser] @Username = ?, @Password = ?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$uname, &$pass));

    sqlsrv_execute( $stmt);
$row = sqlsrv_fetch_array($stmt); 
if($row) {

session_start();
$_SESSION["Fname"] = $row["Fname"];
$_SESSION["Lname"] =  $row["Lname"];
$_SESSION["Username"] = $row["Username"];
$_SESSION["Address"] = $row["Address"];
$_SESSION["Sex"]= $row["Sex"];
$_SESSION["Bdate"]= $row["Bdate"];
$_SESSION["User_Type"]= $row["User_Type"];
$_SESSION["photo"]= $row["photo"];
$_SESSION["Verified"]= $row["Verified"];
$_SESSION["Last_login"]= $row["Last_login"];
$_SESSION["Reg_Date_Time"]= $row["Reg_Date_Time"];

if($row["User_Type"]=="Doctor")
header('Location: ../Doctor.php');
else if($row["User_Type"]=="Patient")
header('Location: ../Patient.php');
else if($row["User_Type"]=="Admin")
header('Location: ../AdminHome.php');
    } else {
        header('Location: ../index.php?error=Incorrect credentials');
    }

}

sqlsrv_close($conn);  

?>