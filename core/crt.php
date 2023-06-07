<?php
require('database.php');
if(isset($_POST['type'])){
    $type = $_POST['type'];
    $msg = $_POST['word'];
    if(substr($msg, -1)==',')
    $msg = rtrim($msg, ",");
    if($type==1)
    $sql = "EXEC [dbo].[CrossTestInclusive] @words = ?";
    else
    $sql = "EXEC [dbo].[CrossTestExclusive] @words = ?";    
    $stmt = sqlsrv_prepare($conn, $sql, array(&$msg));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
            echo $row['Tname']."<br>";
        }


    }



sqlsrv_close($conn);
?>