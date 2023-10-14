<?php
require_once('functions/admin_function.php');

$id = $_GET['d'];
        

$delete_query = "DELETE FROM `counters` WHERE `id` = '$id'";

if(mysqli_query($con, $delete_query)){
    
    header('Location: all_counter.php');
    $_SESSION['success'] = "Counter Delete Successfully";
}else{
    $_SESSION['error'] = "Opps, Something Is Wrong";

}


?>