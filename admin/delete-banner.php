<?php
require_once('functions/admin_function.php');
$id = $_GET['d'];
        

$delete_query = "DELETE FROM `banners` WHERE `banner_id` = '$id'";

if(mysqli_query($con, $delete_query)){
    
    header('Location: all_banner.php');
    $_SESSION['success'] = "Banner Delete Successfully";
}else{
    $_SESSION['error'] = "Opps, Something Is Wrong";
}
?>