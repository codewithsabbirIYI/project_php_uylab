<?php 

$host_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "project_php_uylab";

$con = mysqli_connect($host_name, $user_name, $password, $db_name);

if(!$con){
    echo "Database Not Found";
}

?>