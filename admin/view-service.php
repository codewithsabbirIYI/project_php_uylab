<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

// find service data here 
$id = $_GET['e'];
$sel = "SELECT * FROM services WHERE id = '$id'";
$datas = mysqli_query($con, $sel);
$data = mysqli_fetch_assoc($datas);


get_header();
get_sidebar();


// store data in variable from form 
if (!empty($_POST)) {
    $service_title = $_POST['service_title'];
    $service_text = $_POST['service_text'];
    $button_link = $_POST['button_link'];
    $button_text = $_POST['button_text'];

    $service_image = $_FILES['service_image'];
    $service_icon = $_POST['service_icon'];


    // empty validation here 
    if (!empty($service_title)) {
        if (!empty($service_icon)) {
            if (!empty($service_text)) {
                if (!empty($button_link)) {
                    if (!empty($button_text)) {

                        // check image is given for update 
                        if (!empty($service_image['name'])) {

                            $imageCustomeName = 'service_' . time() . '_' . rand(10000, 1000000) . '.' . pathinfo($service_image['name'], PATHINFO_EXTENSION);
                            // image update query here 

                            $update = "UPDATE `services` SET `service_title`='$service_title',`service_icon`='$service_icon',`service_text`='$service_text',`button_link`='$button_link',`button_text`=' $button_text', `service_image` = '$imageCustomeName' WHERE id ='$id'";

                            // insert query run or data insert here 
                            if (mysqli_query($con, $update)) {

                                move_uploaded_file($service_image['tmp_name'], 'uploads/' . $imageCustomeName);

                                header('Location: all_service.php');
                                $_SESSION['success'] = "service Insert successful";
                            } else {
                                $_SESSION['error'] = "Ops! service Insert failed";
                            }
                        } else {

                            $update = "UPDATE `services` SET `service_title`='$service_title',`service_icon`='$service_icon',`service_text`='$service_text',`button_link`='$button_link',`button_text`=' $button_text' WHERE id ='$id'";

                            if (mysqli_query($con, $update)) {


                                header('Location: all_service.php');
                                echo $_SESSION['success'] = "service update without image successfully";
                            } else {
                                $_SESSION['error'] = "service update faild";
                            }
                        }
                    } else {
                        $button_text_error = "Please enter Button Text";
                    }
                } else {
                    $button_link_error = "Please enter service Link";
                }
            } else {
                $service_text_error = "Please enter service Text";
            }
        } else {
            $service_icon_error = "Please enter service Icon";
        }
    } else {
        $service_title_error = "Please Enter service Title";
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
                                <h4 class="font-20">Edit Services</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new service btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_service.php" type="button" class="btn style--two orange">All Service</a>
                                    </div>
                                    <!-- end add new service btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">Service Information</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_title">service Title</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="service_title" class="form-control <?php if (isset($service_title_error)) echo 'is-invalid' ?>" name="service_title" value="<?= (isset($_POST['service_title'])) ? $_POST['service_title'] : $data['service_title'] ?>" onkeydown="show_update_btn()">

                                            <?php
                                            if (isset($service_title_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $service_title_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_icon">Service Icon</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="service_icon" class="form-control <?php if (isset($service_icon_error)) echo 'is-invalid' ?>" name="service_icon" value="<?= (isset($_POST['service_icon'])) ? $_POST['service_icon'] : $data['service_icon'] ?>" onkeydown="show_update_btn()">

                                            <?php
                                            if (isset($service_icon_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $service_icon_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_icon"></label>
                                        </div>
                                        <div class="col-9" style="height: 100px; overflow: scroll;">
                                            <!-- all icon show here  -->
                                            <?php
                                            require_once('all_icon_class.php');

                                            foreach ($fonts as $key => $font) {


                                            ?>

                                                <i class="<?= 'fa' . ' ' . $font ?>" value="<?= 'fa' . ' ' . $font ?>" onclick="showValue('<?= 'fa' . ' ' . $font ?>')"></i>

                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_text">service Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($service_text_error)) echo 'is-invalid' ?>" id="service_text" name="service_text" value="<?= (isset($_POST['service_text'])) ? $_POST['service_text'] : $data['service_text'] ?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($service_text_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $service_text_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="button_link">Button Link</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($button_link_error)) echo 'is-invalid' ?>" id="button_link" name="button_link" value="<?= (isset($_POST['button_link'])) ? $_POST['button_link'] : $data['button_link'] ?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($button_link_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $button_link_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="button_text">Button Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($button_text_error)) echo 'is-invalid' ?>" id="button_text" name="button_text" value="<?= (isset($_POST['button_text'])) ? $_POST['button_text'] : $data['button_text'] ?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($button_text_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $button_text_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_image">service Image</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" class="" id="service_image" name="service_image" onchange="show_update_btn()">

                                            <?php
                                            if (isset($service_image_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $service_image_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="service_image"></label>
                                        </div>
                                        <div class="col-9">

                                            <?php

                                            if ($data["service_image"] != '') {
                                            ?>
                                                <img style="width: 150px;" class="img200" src="uploads/<?= $data['service_image']; ?>" alt="service" />
                                            <?php
                                            } else {
                                            ?>
                                                <img style="width: 150px;" src="images/avatar.jpg" alt="User" />
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <div class="button-group pt-1 m-auto" id="service_data_update_btn">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink" id="update_cancel_btn" onclick="hide_user_data_update_btn()">Cancel</button>

                                        <button type="submit" class="btn btn-sm">Save Change</button>
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

function showValue(a){

 $font_class = a;

 $service_icon = document.getElementById('service_icon');

 $service_icon.setAttribute('value', $font_class)
 document.getElementById('service_data_update_btn').style.display = "block";

}

</script>


<script>
    document.getElementById('service_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('service_data_update_btn').style.display = "block";
    }

    function hide_service_data_update_btn() {
        document.getElementById('service_data_update_btn').style.display = "none";

    }
</script>