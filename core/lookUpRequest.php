<?php
session_start();


require("database.php");

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $sql = "EXEC  [dbo].[lookUpRequest] @docUserName =?,@patientUserName=?";
    
    $stmt = sqlsrv_prepare($conn, $sql, array(&$username, &$_SESSION['Username']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    if(!sqlsrv_execute($stmt))
        echo sqlsrv_errors()[0]['message'];
    
    $row_count = sqlsrv_num_rows( $stmt );
if($row_count==0){
echo 0;
} else{
    $row  = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    if($row['accept']==1)
    echo 1;
    else
    echo 2;
}

}

sqlsrv_close($conn);
?>