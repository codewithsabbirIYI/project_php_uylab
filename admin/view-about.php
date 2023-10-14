<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

 
      // find about data here 
      $id = $_GET['e'];
      $sel = "SELECT * FROM about WHERE id = '$id'";
      $datas = mysqli_query($con, $sel);
      $data = mysqli_fetch_assoc($datas);



    // store data in variable from form 
    if(!empty($_POST)){
      $about_title=$_POST['about_title'];
      $about_text=$_POST['about_text'];
      $button_link=$_POST['button_link'];
      $button_text=$_POST['button_text'];
      
      $about_home_image= $_FILES['about_home_image'];
      $about_pase_image= $_FILES['about_pase_image'];


    // empty validation here     
    if(!empty($about_title)){
     
        if(!empty($about_text)){
          if(!empty($button_link)){
            if(!empty($button_text)){

                // check about page image is given for update 
                if(!empty($about_home_image['name'])){
                
                  $home_imageCustomeName='about_home'.time().'_'.rand(10000,1000000).'.'.pathinfo($about_home_image['name'],PATHINFO_EXTENSION);

                // home image update query here 
                $update="UPDATE `about` SET `about_title`='$about_title',`about_text`='$about_text',`button_link`='$button_link',`button_text`=' $button_text', `about_home_image` = '$home_imageCustomeName' WHERE id ='$id'";

                  // insert query run or data insert here 
                  if(mysqli_query($con,$update)){
                    
                    move_uploaded_file($about_home_image['tmp_name'],'uploads/'.$home_imageCustomeName);

                    header('Location: all_about.php');
                    $_SESSION['success'] = "about Insert successful";
                    
                  }else{
                    $_SESSION['error'] = "Ops! about Insert failed";
                  }
                 
                }else{

                    $update="UPDATE `about` SET `about_title`='$about_title',`about_text`='$about_text',`button_link`='$button_link',`button_text`='$button_text' WHERE id ='$id'";

                  if(mysqli_query($con, $update)){


                    header('Location: all_about.php');
                    echo$_SESSION['success'] = "about update without image successfully";
  
                  }else{
                    $_SESSION['error'] = "about update faild";
                  }
                }

                if(!empty($about_pase_image['name'])){

                    $pase_imageCustomeName='about_pase'.time().'_'.rand(10000,1000000).'.'.pathinfo($about_pase_image['name'],PATHINFO_EXTENSION);

                     // pase image update query here 
                     $update="UPDATE `about` SET `about_title`='$about_title',`about_text`='$about_text',`button_link`='$button_link',`button_text`=' $button_text', `about_pase_image` = '$pase_imageCustomeName' WHERE id ='$id'";

                     if(mysqli_query($con, $update)){

                        move_uploaded_file($about_pase_image['tmp_name'],'uploads/'.$pase_imageCustomeName);

                        header('Location: all_about.php');
                        $_SESSION['success'] = "about Insert successful";

                     }else{
                        $_SESSION['error'] = "Ops! about Insert failed";
                     }

                }else{

                    $update="UPDATE `about` SET `about_title`='$about_title',`about_text`='$about_text',`button_link`='$button_link',`button_text`='$button_text' WHERE id ='$id'";

                    if(mysqli_query($con, $update)){
  
  
                      header('Location: all_about.php');
                      echo$_SESSION['success'] = "about update without image successfully";
    
                    }else{
                      $_SESSION['error'] = "about update faild";
                    }
                }
          
              }else{
                $button_text_error = "Please enter Button Text";
              }
            }else{
              $button_link_error = "Please enter about Link";
            }
      
          }else{
            $about_text_error = "Please enter about Text";
          }
      
      }else{
        $about_title_error = "Please Enter about Title";
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
                                <h4 class="font-20">Edit About</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new about btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_about.php" type="button" class="btn style--two orange">All About</a>
                                    </div>
                                    <!-- end add new about btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">About Information</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="about_title">About Title</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="about_title" class="form-control <?php if (isset($about_title_error)) echo 'is-invalid' ?>" name="about_title" value = "<?= (isset($_POST['about_title'])) ? $_POST['about_title'] : $data['about_title']?>" onkeydown="show_update_btn()">

                                            <?php
                                            if (isset($about_title_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $about_title_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="about_text">About Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($about_text_error)) echo 'is-invalid' ?>" id="about_text" name="about_text" value = "<?= (isset($_POST['about_text'])) ? $_POST['about_text'] : $data['about_text']?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($about_text_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $about_text_error; ?></span>
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
                                            <label for="about_home_image">About Home Image</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" class="" id="about_home_image"  name="about_home_image" oninput="show_update_btn()">
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="about_home_image"></label>
                                        </div>
                                        <div class="col-9">

                                        <?php

                                        if($data["about_home_image"] != ''){
                                        ?>
                                        <img style="width: 150px;" class="img200" src="uploads/<?= $data['about_home_image']; ?>" alt="about"/>
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

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="about_pase_image">About Page Image</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="file" class="" id="about_pase_image"  name="about_pase_image" oninput="show_update_btn()">
                                        </div>
                                    </div>
                                    <!-- Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="about_pase_image"></label>
                                        </div>
                                        <div class="col-9">

                                        <?php

                                        if($data["about_pase_image"] != ''){
                                        ?>
                                        <img style="width: 150px;" class="img200" src="uploads/<?= $data['about_pase_image']; ?>" alt="about"/>
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

                                    <div class="button-group pt-1 m-auto" id="about_data_update_btn">
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
  

    document.getElementById('about_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('about_data_update_btn').style.display = "block";
    }

    function hide_about_data_update_btn() {
        document.getElementById('about_data_update_btn').style.display = "none";

    }
</script>