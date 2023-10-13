<?php 
    require_once('functions/admin_function.php');

    $id = $_GET['d'];
    
    $delete_query = "DELETE FROM `users` WHERE `user_id` = '$id'";

    if(mysqli_query($con, $delete_query)){
        
        header('Location: all_user.php');
        $_SESSION['success'] = "User Delete Successfully";
    }else{
        $_SESSION['error'] = "Opps, Something Is Wrong";

    }
   
?>