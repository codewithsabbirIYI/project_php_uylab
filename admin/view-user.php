<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

// find data here 
$id = $_GET['e'];
$sel = "SELECT * FROM users WHERE user_id = '$id'";
$datas = mysqli_query($con, $sel);
$data = mysqli_fetch_assoc($datas);


// store data in variable from form 
if (!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_role = ($_POST['user_role']);

    // user image find here 
    $user_image = $_FILES['user_image'];
    // image custome name variable initial here 
    $imageCustomeName = "";


    // empty validation here 
    if (!empty($user_name)) {
        if (!empty($user_phone)) {
            if (!empty($user_email)) {
                if (!empty($user_role)) {

                    // check is image given for update 
                    if ($user_image['name'] != '') {
                        // image custom name here 
                        $imageCustomeName = 'user_' . time() . '_' . rand(10000, 1000000) . '.' . pathinfo($user_image['name'], PATHINFO_EXTENSION);

                        // update query here 
                        $update = "UPDATE `users` SET `user_name`='$user_name',`user_phone`='$user_phone',`user_email`='$user_email',`role_id`='$user_role', `user_image` = '$imageCustomeName' WHERE `user_id` = '$id'";

                        // insert query run or data insert here 
                        if (mysqli_query($con, $update)) {
                            move_uploaded_file($user_image['tmp_name'], 'uploads/' . $imageCustomeName);

                            $_SESSION['success'] = "User update successful";

                            header('Location: all_user.php');
                        } else {
                            $_SESSION['error'] = "Ops! User update failed";
                        }
                    } else {
                        // update query here 
                        $update = "UPDATE `users` SET`user_name`='$user_name',`user_phone`='$user_phone',`user_email`='$user_email',`role_id`='$user_role' WHERE `user_id` = '$id'";

                        // data insert with out image 
                        if (mysqli_query($con, $update)) {

                            $_SESSION['success'] = "User registration successful";

                            header('Location: all-user.php?' . $_SESSION['success']);
                        }
                    }
                } else {
                    $user_role_error = "Please Select user Role";
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
                                <h4 class="font-20">User Information</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- Dropdown Button -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <button type="button" class="btn style--two orange" data-toggle="dropdown">Download <i class="icofont-simple-down"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Print</a>
                                            <a class="dropdown-item" href="#">EXL</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>
                                    <!-- End Dropdown Button -->
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
                                <form  method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_name">Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" onkeydown="show_update_btn()" id="user_name" class="form-control <?php if (isset($user_name_error)) echo 'is-invalid' ?>" name="user_name" value="<?= (isset($_POST['user_name'])) ? $_POST['user_name'] : $data['user_name'] ?>">

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
                                            <input type="phone" onkeydown="show_update_btn()" class="form-control" <?php if (isset($user_phone_error)) echo 'is-invalid' ?>" id="user_phone" name="user_phone" value="<?= (isset($_POST['user_phone'])) ? $_POST['user_phone'] : $data['user_phone'] ?>">
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
                                            <input type="text" onkeydown="show_update_btn()" class="form-control <?php if (isset($user_email_error)) echo 'is-invalid' ?>" id="input" name="user_email" value="<?= (isset($_POST['user_email'])) ? $_POST['user_email'] : $data['user_email'] ?>">
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
                                            <label for="user_username">User Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" onkeydown="show_update_btn()" style="color:black" class="form-control" id="user_username" name="user_username" value="<?= $data['user_username'] ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_username">User Role</label>
                                        </div>
                                        <div class="col-9">
                                            <select onchange="show_update_btn()" class="theme-input-style" id="exampleSelect1" name="user_role">
                                                <option value="">Select Role</option>

                                                <?php
                                                $selrq = "SELECT * FROM roles ORDER BY role_id ASC";
                                                $selr = mysqli_query($con, $selrq);

                                                while ($role = mysqli_fetch_assoc($selr)) {
                                                ?>
                                                    <option value="<?= $role['role_id'] ?>" <?= ($role['role_id'] == $data['role_id']) ? "selected" : "" ?>><?= $role['role_name'] ?></option>

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
                                            <input onchange="show_update_btn()" type="file" class="" id="user_image" name="user_image">
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="user_image"></label>
                                        </div>
                                        <div class="col-9">
                                            <?php

                                            if ($data["user_image"] != '') {
                                            ?>
                                                <img style="width: 200px;" class="img200" src="uploads/<?= $data['user_image']; ?>" alt="User" />
                                            <?php
                                            } else {
                                            ?>
                                                <img height="40" src="images/avatar.jpg" alt="User" />
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <div class="button-group pt-1 m-auto" id="user_data_update_btn">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink" id="update_cancel_btn" onclick="hide_user_data_update_btn()">Cancel</button>
                                        
                                        <button type="submit" class="btn btn-sm">Save Changes</button>
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


    document.getElementById('user_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('user_data_update_btn').style.display = "block";
    }

    function hide_user_data_update_btn() {
        document.getElementById('user_data_update_btn').style.display = "none";

    }
</script>