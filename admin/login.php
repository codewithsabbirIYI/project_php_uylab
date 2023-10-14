<?php session_start();
    
    // require_once('functions/admin_function.php');
    require_once('../config.php');
    
    
    if(!empty($_POST)){

        // find form data here 
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        // field empty check 
        if(!empty($user_email)){
            if(!empty($user_password)){

                $user_password = md5($user_password);
                // check is user is exiest 
                $select_query = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";

                $datas = mysqli_query($con, $select_query);

                $data = mysqli_fetch_assoc($datas);

                if($data){

                    // some user data set on session 

                    $_SESSION['user_id'] = $data['user_id'];
                    $_SESSION['user_name'] = $data['user_name'];
                    $_SESSION['user_email'] = $data['user_email'];
                    $_SESSION['user_email'] = $data['user_email'];
                    $_SESSION['role_id'] = $data['role_id'];
                    $_SESSION['user_image'] = $data['user_image'];

                    header('Location: admin_dashboard.php');
                }else{
                    $email_password_match_error = "Your email or Password Does't Match";
                }

            }else{
                $user_password_error = "Enter Your Passsword";
            }
        }else{
            $user_email_error = "Enter Your Email";
        }
    }


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Page Title -->
    <title>Dashmin - Multipurpose Bootstrap Dashboard Template</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/img/favicon.png">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="asset/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- ======= END MAIN STYLES ======= -->

</head>

<body>

    <div class="mn-vh-100 d-flex align-items-center">
        <div class="container">
            <!-- Card -->
            <div class="card justify-content-center auth-card">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <h4 class="mb-5 font-20">Welcome To Dashmin</h4>

                        <form action="" method="post">
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="email" class="mb-2 font-14 bold">Email Address</label>
                                <input type="email" id="email" class="theme-input-style <?php if (isset($user_email_error)) echo 'is-invalid' ?>" placeholder="Email Address" name="user_email">

                                <?php
                                if (isset($user_email_error)) {
                                ?>
                                    <span class="text-danger"></span><?= $user_email_error; ?></span>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- End Form Group -->
                            
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="password" class="mb-2 font-14 bold">Password</label>
                                <input type="password" id="password" class="theme-input-style <?php if (isset($user_password_error)) echo 'is-invalid' ?>" placeholder="********" name="user_password">

                                <?php
                                if (isset($user_password_error)) {
                                ?>
                                    <span class="text-danger"></span><?= $user_password_error; ?></span>
                                <?php
                                }
                                ?>

                                <?php
                                if (isset($email_password_match_error)) {
                                ?>
                                    <span class="text-danger"></span><?= $email_password_match_error; ?></span>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-between mb-20">
                                <div class="d-flex align-items-center">
                                    <!-- Custom Checkbox -->
                                    <label class="custom-checkbox position-relative mr-2">
                                        <input type="checkbox" id="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- End Custom Checkbox -->
                                    
                                    <label for="checkbox" class="font-14">Remember Me</label>
                                </div>

                                <a href="forget-pass.html" class="font-12 text_color">Forgot Password?</a>
                            </div>

                            <div class="mb-30">
                                <a href="#" class="light-btn mr-3 mb-20">Log In With Facebook</a>
                                <a href="#" class="light-btn style--two mb-20">Log In With Gmail</a>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn long mr-20">Log In</button>
                                <span class="font-12 d-block"><a href="register.html" class="bold">Sign Up</a>,If you have no account.</span>
                            </div>
                        </form>
                    </div>                                    
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer style--two">
       Dashmin © 2020 created by <a href="https://www.themelooks.com/"> ThemeLooks</a>
    </footer>
    <!-- End Footer -->

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="asset/js/script.js"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
</body>

</html>