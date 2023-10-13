<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

// store data in variable from form 
if (!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_username = $_POST['user_username'];
    $user_password = md5($_POST['user_password']);
    $user_confirm_password = md5($_POST['user_confirm_password']);
    $user_role = ($_POST['user_role']);
    $user_slug = uniqid('U');
    // user image find here 
    $user_image = $_FILES['user_image'];
    // image custome name variable initial here 
    $imageCustomeName = "";

    // user image custome name set from here 
    if ($user_image['name'] != '') {
        $imageCustomeName = 'user_' . time() . '_' . rand(10000, 1000000) . '.' . pathinfo($user_image['name'], PATHINFO_EXTENSION);
    }

    // insert query here 
    $insert = "INSERT INTO users(user_name,user_slug,user_phone,user_email,user_username,user_password, user_image, role_id)
      VALUES('$user_name','$user_slug','$user_phone','$user_email','$user_username','$user_password','$imageCustomeName','$user_role')";



    // empty validation here 
    if (!empty($user_name)) {
        if (!empty($user_phone)) {
            if (!empty($user_email)) {
                if (!empty($user_username)) {

                    $find_username_query = "SELECT COUNT('user_username') FROM users WHERE user_username = '$user_username'";
                    $username_data = mysqli_query($con, $find_username_query);

                    // check username already exist 
                    if ($username_data->num_rows == 0 ) {
                        
                        if (!empty($_POST['user_password'])) {

                            if (!empty($_POST['user_confirm_password'])) {
                                if (!empty($user_role)) {

                                    // check is password and confrirm password same 
                                    if ($user_password === $user_confirm_password) {

                                        // insert query run or data insert here 
                                        if (mysqli_query($con, $insert)) {
                                            move_uploaded_file($user_image['tmp_name'], 'uploads/' . $imageCustomeName);

                                            $_SESSION['success'] = "User registration successful";

                                            header('Location: all_user.php');
                                        } else {
                                            $_SESSION['error'] = "Ops! User registration failed";
                                        }
                                    } else {
                                        $user_confirm_password_match_error = "Password and confirm password did not match";
                                    }
                                } else {
                                    $user_role_error = "Please Select user Role";
                                }
                            } else {
                                $user_confirm_password_error = "Please enter confirm password";
                            }
                        } else {
                            $user_password_error = "Please enter your password";
                        }
                    } else {
                        $user_username_exist_error = "This Username Not Available";
                    }
                } else {
                    $user_username_error = "Please enter your username";
                }
            } else {
                $user_email_error = "Please enter your email";
            }
        } else {
            $user_phone_error = "Please enter your Phone";
        }
    } else {
        $user_name_error = "Please Enter Your Name";
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
                                <h4 class="font-20">Add User Information</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new user btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_user.php" type="button" class="btn style--two orange">All User</a>
                                    </div>
                                    <!-- end add new user btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">Personal Information</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_name">Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="user_name" class="form-control <?php if (isset($user_name_error)) echo 'is-invalid' ?>" name="user_name" value="<?php if (isset($_POST['user_name'])) echo  $_POST['user_name'] ?>">

                                            <?php
                                            if (isset($user_name_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_name_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_phone">Phone</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control" <?php if (isset($user_phone_error)) echo 'is-invalid' ?>" id="user_phone" name="user_phone" value="<?php if (isset($_POST['user_phone'])) echo  $_POST['user_phone'] ?>">
                                            <?php
                                            if (isset($user_phone_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_phone_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_email">Email</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control <?php if (isset($user_email_error)) echo 'is-invalid' ?>" id="input" name="user_email" value="<?php if (isset($_POST['user_email'])) echo  $_POST['user_email'] ?>">
                                            <?php
                                            if (isset($user_email_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_email_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_username">Username</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control <?php if (isset($user_username_error)) echo 'is-invalid' ?>" id="user_username" name="user_username" value="<?php if (isset($_POST['user_username'])) echo  $_POST['user_username'] ?>">
                                            <?php
                                            if (isset($user_username_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_username_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if (isset($user_username_exist_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_username_exist_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_password">Password</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" id="user_password" class="form-control <?php if (isset($user_password_error)) echo 'is-invalid' ?>" name="user_password" value="<?php if (isset($_POST['user_password'])) echo  $_POST['user_password'] ?>">

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
                                            <input type="password" id="user_confirm_password" class="form-control <?php if (isset($user_confirm_password_error)) echo 'is-invalid' ?>" name="user_confirm_password" value="<?php if (isset($_POST['user_confirm_password'])) echo  $_POST['user_confirm_password'] ?>">

                                            <?php
                                            if (isset($user_confirm_password_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_confirm_password_error; ?></span>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($user_confirm_password_match_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $user_confirm_password_match_error; ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_role">User Role</label>
                                        </div>
                                        <div class="col-9">
                                            <select class="theme-input-style" id="exampleSelect1" name="user_role">
                                                <option value="">Select Role</option>

                                                <?php
                                                $selrq = "SELECT * FROM roles ORDER BY role_id ASC";
                                                $selr = mysqli_query($con, $selrq);

                                                while ($role = mysqli_fetch_assoc($selr)) {
                                                ?>

                                                    <option value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?></option>

                                                <?php
                                                }

                                                ?>
                                                <?php
                                                if (isset($user_role_error)) {
                                                ?>
                                                    <span class="text-danger"></span><?= $user_role_error; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_image">User Image</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" class="" id="user_image" name="user_image">
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_image"></label>
                                        </div>
                                        <div class="col-9">

                                            <img style="width: 200px;" class="img200" src="" alt="User" />

                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <div class="button-group pt-1 m-auto" id="user_data_update_btn">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink" id="update_cancel_btn">Cancel</button>

                                        <button type="submit" class="btn btn-sm">Add User</button>
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