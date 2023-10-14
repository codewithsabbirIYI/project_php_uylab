<?php
require_once('functions/admin_function.php');

$id = $_GET['d'];
        

$delete_query = "DELETE FROM `services` WHERE `id` = '$id'";

if(mysqli_query($con, $delete_query)){
    
    header('Location: all_service.php');
    $_SESSION['success'] = "Service Delete Successfully";
}else{
    $_SESSION['error'] = "Opps, Something Is Wrong";

}


?>