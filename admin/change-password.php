<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();


// store data in variable from form 
if (!empty($_POST)) {

    $old_user_password = $_POST['old_user_password'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['user_confirm_password'];

    // field empty check here 
    if (!empty($old_user_password)) {
        if (!empty($user_password)) {
            if (!empty($confirm_password)) {

                // old password find here 
                $id = $_GET['p'];
                $select_query = "SELECT `user_password` FROM `users` WHERE `user_id` = '$id'";
                $user_data = mysqli_fetch_assoc(mysqli_query($con, $select_query));
                $user_db_password = $user_data['user_password'];

                // old password and user given old password match here 

                if (md5($old_user_password) == $user_db_password) {

                    // password and confirm password match here 
                    if ($user_password == $confirm_password) {
                        $user_password = md5($user_password);
                        // finally user password update operation here 
                        $update_query = "UPDATE `users` SET `user_password` = '$user_password' WHERE `user_id` = '$id'";
                        if (mysqli_query($con, $update_query)) {
                            $_SESSION['success'] = "Password Update Successfully";
                            header('Location: all_user.php' . $_SESSION['success']);
                        } else {
                            $_SESSION['error'] =  "Opps Password Update Failed";
                        }
                    } else {
                        $password_match_error = "Password and Confirm password Does't Match";
                    }
                } else {
                    $old_password_match_error =  "Old Password Does't Match";
                }
            } else {
                $user_confirm_password_error = "Please Enter Confirm Password";
            }
        } else {
            $user_password_error = "Please Enter Your New Password";
        }
    } else {
        $old_user_password_error = "Please Enter Old Password";
    }
}

?>
<!-- // main content here  -->
<div class="main-wrapper">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-30">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="font-20"></h4>

                                <div class="d-flex flex-wrap">
                                    <!-- start add new user btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_user.php" type="button" class="btn style--two orange">All User</a>
                                    </div>
                                    <!-- end add new user btn  -->
                                </div>
                            </div>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">Change Password</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="old_user_password">Old Password</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" onkeydown="show_update_btn()" id="old_user_password" class="form-control <?php if (isset($old_user_password_error)) echo 'is-invalid' ?>" name="old_user_password">

                                            <?php
                                            if (isset($old_user_password_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $old_user_password_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_password">New Password</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" onkeydown="show_update_btn()" id="user_password" class="form-control <?php if (isset($user_password_error)) echo 'is-invalid' ?>" name="user_password">

                                            <?php
                                            if (isset($user_password_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_password_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_confirm_password">Confirm Password</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" onkeydown="show_update_btn()" id="user_confirm_password" class="form-control <?php if (isset($user_confirm_password_error)) echo 'is-invalid' ?>" name="user_confirm_password">

                                            <?php
                                            if (isset($user_confirm_password_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_confirm_password_error; ?></span>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($password_match_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $password_match_error; ?></span>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($old_password_match_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $old_password_match_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->


                                    <div class="button-group pt-1 m-auto" id="user_data_update_btn">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink" id="update_cancel_btn" onclick="hide_user_data_update_btn()">Cancel</button>

                                        <button type="submit" class="btn btn-sm">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- // main content end here  -->
</div>
<?php
// footer part here 
get_footer();
?>

<script>
    // let user_name = document.getElementById('user_name');
    // let user_phone = document.getElementById('user_phone');
    // let user_email = document.getElementById('user_email');
    // let user_role = document.getElementById('user_role');
    // let user_image = document.getElementById('user_image');


    // document.getElementById('user_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('user_data_update_btn').style.display = "block";
    }

    function hide_user_data_update_btn() {
        document.getElementById('user_data_update_btn').style.display = "none";

    }
</script>