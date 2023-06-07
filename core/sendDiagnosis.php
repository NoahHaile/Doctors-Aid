<?php
session_start();


require("database.php");

if(isset($_POST['sub'])){
    $msg = $_POST['txtarea'];
    $pid = $_POST['pid'];
    $uname =  $_POST['uname'];
    $sql = "EXEC  [dbo].[makeDiagnoses] @D_Uname =?,@P_Uname =?,@Diagnoses=?, @pid=?";
    
    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username'],&$uname,&$msg, &$pid));
    if(!sqlsrv_execute($stmt))
        header('Location: ../DiagnosisPage.php?pid='.$pid.'&uname='.$uname.'error='.sqlsrv_errors()[0]['message']);
    
    $row_count = sqlsrv_rows_affected($stmt);
if($row_count==0){
    header('Location: ../DiagnosisPage.php?pid='.$pid.'&uname='.$uname.'error=There was an error');
}
    header('Location: ../DiagnosisPage.php?pid='.$pid.'&uname='.$uname.'success=Diagnosis successfully sent');


}

sqlsrv_close($conn);
?>