<?php session_start();
    ob_start();
    // config file load here 
   require_once('../config.php');
   

//    header section find here 
    function get_header() {
        require_once('includes/header.php');
    }
    // sidebar serction find here 
    function get_sidebar() {
        require_once('includes/sidebar.php');
    }
    // footer section find here 
    function get_footer() {
        require_once('includes/footer.php');
    }

    if(isset($_SESSION['user_id'])){

    }else{
        header('Location: login.php');
        $_SESSION['login_error'] = "Login First";
    }


    // check id loggin id set 
    // function loggedID(){
    //     return $_SESSION['user_id'] ? true : false; 
    // }

    // log in checking function here 
    // function needLogged(){
    //     $check = loggedID();

    //     if(!$check){
    //         header('Location: login.php');
    //         // echo "Login First";
    //     }
    // }
    
?>