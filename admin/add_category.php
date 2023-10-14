<?php
require_once('functions/admin_function.php');

// header part here 
// get_header();

// sidebar part here 
// get_sidebar();

  
    // store data in variable from form 
    if(!empty($_POST)){
        $portfolio_categoty_name = $_POST['portfolio_categoty_name'];
        $portfolio_categoty_slug = strtolower(str_replace(' ', '-', $portfolio_categoty_name)); 
        
        echo $portfolio_categoty_slug ;
        die();

      // empty validation here 
      if(!empty($counter_icon)){
  
        if(!empty($counter_number)){
  
          if(!empty($counter_title)){
  
  
            if(!empty($counter_text)){
  
                  // insert query here 
                  $insert="INSERT INTO counters(counter_icon,counter_number,counter_title,counter_text)
                  VALUES('$counter_icon','$counter_number','$counter_title','$counter_text')";
  
                  // insert query run or data insert here 
                  if(mysqli_query($con,$insert)){
  
                  header('Location: all_counter.php');
                  $_SESSION['success'] = "counter Insert successful";
                  }else{
                    $_SESSION['error'] = "Ops! counter Insert failed";
                  }
  
  
              }else{
                $counter_text_error = "Please input Counter text";
              }
  
            }else{
              $counter_title_error = "Please input Counter number";
            }
  
          }else{
            $counter_number_error = "Please input Counter number";
          }
  
        }else{
          $counter_icon_error = "Please input Counter Icon Class";
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
                                <h4 class="font-20">Edit counters</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new counter btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_counter.php" type="button" class="btn style--two orange">Add Counter</a>
                                    </div>
                                    <!-- end add new counter btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-3">Counter Information</h4>
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                
                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="portfolio_categoty_name">counter Subtitle</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($portfolio_categoty_name_error)) echo 'is-invalid' ?>" id="portfolio_categoty_name" name="portfolio_categoty_name" value = "<?php if(isset($_POST['portfolio_categoty_name'])) echo  $_POST['portfolio_categoty_name']?>">
                                            <?php
                                            if (isset($portfolio_categoty_name_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $portfolio_categoty_name_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="counter_title">Counter Title</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($counter_title_error)) echo 'is-invalid' ?>" id="counter_title" name="counter_title" value = "<?php if(isset($_POST['counter_title'])) echo  $_POST['counter_title']?>">
                                            <?php
                                            if (isset($counter_title_error)) {
                                            ?>
                                                <span class="title-danger"></span><?= $counter_title_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->


                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="counter_text">Counter Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($counter_text_error)) echo 'is-invalid' ?>" id="counter_text" name="counter_text" value = "<?php if(isset($_POST['counter_text'])) echo  $_POST['counter_text']?>">
                                            <?php
                                            if (isset($counter_text_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $counter_text_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <div class="button-group pt-1 m-auto" id="counter_data_update_btn">
                                        <button type="reset" class="link-btn bg-transparent mr-3 soft-pink" id="update_cancel_btn" onclick="hide_user_data_update_btn()">Cancel</button>

                                        <button type="submit" class="btn btn-sm">Save</button>
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

  $counter_icon = document.getElementById('counter_icon');

  $counter_icon.setAttribute('value', $font_class)
  document.getElementById('counter_data_update_btn').style.display = "block";

 }

</script>
