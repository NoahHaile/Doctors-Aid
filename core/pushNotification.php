<?php
session_start();
function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require("database.php");
if(isset($_POST['sub'])){
$message = $_POST['msg'];
$sql = "EXEC [dbo].[pushNotification] @Sname =?,@message =?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$_SESSION['Username'], &$message));
   
    if(!sqlsrv_execute($stmt))
    header("Location: ../AdminHome.php?Error=".sqlsrv_errors()[0]['message']);
    
    header("Location: ../AdminHome.php?success=Push notifaction successfully sent");

}
sqlsrv_close($conn);
?>