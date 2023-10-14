<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

 // find banner data here 
 $id = $_GET['e'];
 $sel = "SELECT * FROM banners WHERE banner_id = '$id'";
 $datas = mysqli_query($con, $sel);
 $data = mysqli_fetch_assoc($datas);



 // store data in variable from form 
 if(!empty($_POST)){
    $banner_title=$_POST['banner_title'];
    $banner_subtitle=$_POST['banner_subtitle'];
    $banner_text=$_POST['banner_text'];
    $button_link=$_POST['button_link'];
    $button_text=$_POST['button_text'];
    
    $banner_image= $_FILES['banner_image'];

 
    // banner image custome name set from here 
    if($banner_image['name']!=''){
    $imageCustomeName='banner_'.time().'_'.rand(10000,1000000).'.'.pathinfo($banner_image['name'],PATHINFO_EXTENSION);
    }

   // store data in variable from form 
   if(!empty($_POST)){
    $banner_title=$_POST['banner_title'];
    $banner_subtitle=$_POST['banner_subtitle'];
    $banner_text=$_POST['banner_text'];
    $button_link=$_POST['button_link'];
    $button_text=$_POST['button_text'];
    
    $banner_image= $_FILES['banner_image'];

   
  // empty validation here 
  if(!empty($banner_title)){
    if(!empty($banner_subtitle)){
      if(!empty($banner_text)){
        if(!empty($button_link)){
          if(!empty($button_text)){

              // check image is given for update 
              if(!empty($banner_image['name'])){

                $imageCustomeName='banner_'.time().'_'.rand(10000,1000000).'.'.pathinfo($banner_image['name'],PATHINFO_EXTENSION);
                // image update query here 

                $update="UPDATE `banners` SET `banner_title`='$banner_title',`banner_subtitle`='$banner_subtitle',`banner_text`='$banner_text',`button_link`='$button_link',`button_text`=' $button_text', `banner_image` = '$imageCustomeName' WHERE banner_id ='$id'";

                // insert query run or data insert here 
                if(mysqli_query($con,$update)){
                  
                  move_uploaded_file($banner_image['tmp_name'],'uploads/'.$imageCustomeName);
                
                  header('Location: all-banner.php');
                  $_SESSION['success'] = "Banner Insert successful";
                  
                }else{
                  $_SESSION['error'] = "Ops! Banner Insert failed";
                }
               
              }else{
                
                $update="UPDATE `banners` SET `banner_title`='$banner_title',`banner_subtitle`='$banner_subtitle',`banner_text`='$banner_text',`button_link`='$button_link',`button_text`=' $button_text' WHERE banner_id ='$id'";

                if(mysqli_query($con, $update)){


                  header('Location: all_banner.php');
                  echo$_SESSION['success'] = "banner update without image successfully";

                }else{
                  $_SESSION['error'] = "banner update faild";
                }
              }

            }else{
              $button_text_error = "Please enter Button Text";
            }
          }else{
            $button_link_error = "Please enter Banner Link";
          }
    
        }else{
          $banner_text_error = "Please enter Banner Text";
        }
    
      }else{
        $banner_subtitle_error = "Please enter Banner Subtile";
      }

    }else{
      $banner_title_error = "Please Enter Banner Title";
    }

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
                                <h4 class="font-20">Edit Banners</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new banner btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_banner.php" type="button" class="btn style--two orange">All Banner</a>
                                    </div>
                                    <!-- end add new banner btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">Banner Information</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="banner_title">Banner Title</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="banner_title" class="form-control <?php if (isset($banner_title_error)) echo 'is-invalid' ?>" name="banner_title" value = "<?= (isset($_POST['banner_title'])) ? $_POST['banner_title'] : $data['banner_title']?>" onkeydown="show_update_btn()">

                                            <?php
                                            if (isset($banner_title_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $banner_title_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="banner_subtitle">Banner Subtitle</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($banner_subtitle_error)) echo 'is-invalid' ?>" id="banner_subtitle" name="banner_subtitle" value = "<?= (isset($_POST['banner_subtitle'])) ? $_POST['banner_subtitle'] : $data['banner_subtitle']?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($banner_subtitle_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $banner_subtitle_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="banner_text">Banner Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($banner_text_error)) echo 'is-invalid' ?>" id="banner_text" name="banner_text" value = "<?= (isset($_POST['banner_text'])) ? $_POST['banner_text'] : $data['banner_text']?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($banner_text_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $banner_text_error; ?></span>
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
                                            <input type="phone" class="form-control <?php if (isset($button_link_error)) echo 'is-invalid' ?>" id="button_link" name="button_link"  value = "<?= (isset($_POST['button_link'])) ? $_POST['button_link'] : $data['button_link']?>" onkeydown="show_update_btn()">
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
                                            <input type="phone" class="form-control <?php if (isset($button_text_error)) echo 'is-invalid' ?>" id="button_text" name="button_text"value = "<?= (isset($_POST['button_text'])) ? $_POST['button_text'] : $data['button_text']?>" onkeydown="show_update_btn()">
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
                                            <label for="banner_image">Banner Image</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" class="" id="banner_image" name="banner_image" onchange="show_update_btn()">

                                            <?php
                                            if (isset($banner_image_error)) {
                                            ?>
                                            <span class="text-danger"></span><?= $banner_image_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="banner_image"></label>
                                        </div>
                                        <div class="col-9">

                                        <?php

                                        if($data["banner_image"] != ''){
                                        ?>
                                        <img style="width: 150px;" class="img200" src="uploads/<?= $data['banner_image']; ?>" alt="banner"/>
                                        <?php
                                        }else{
                                        ?>
                                        <img style="width: 150px;" src="images/avatar.jpg" alt="User"/>
                                        <?php
                                        }

                                        ?>

                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <div class="button-group pt-1 m-auto" id="banner_data_update_btn">
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
  

    document.getElementById('banner_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('banner_data_update_btn').style.display = "block";
    }

    function hide_banner_data_update_btn() {
        document.getElementById('banner_data_update_btn').style.display = "none";

    }
</script>