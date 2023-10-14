<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

   // find old counter data 
   $id = $_GET['e'];
   $sel = "SELECT * FROM counters WHERE id = '$id'";
   $datas = mysqli_query($con, $sel);
   $data = mysqli_fetch_assoc($datas);

   // store data in variable from form 
   if(!empty($_POST)){
     $counter_icon=$_POST['counter_icon'];
     $counter_number=$_POST['counter_number'];
     $counter_title=$_POST['counter_title'];
     $counter_text=$_POST['counter_text'];
     
 
   // empty validation here 
   if(!empty($counter_icon)){
   
     if(!empty($counter_number)){
     
       if(!empty($counter_title)){
        

         if(!empty($counter_text)){
         
               // insert query here 
               $update="UPDATE `counters` SET `counter_icon`='$counter_icon',`counter_number`='$counter_number',`counter_title`='$counter_title',`counter_text`='$counter_text' WHERE id ='$id'";

               // insert query run or data insert here 
               if(mysqli_query($con,$update)){

               header('Location: all_counter.php');
               echo "counter Update successful";
               }else{
               echo "Ops! counter Update failed";
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
                                        <a href="all_counter.php" type="button" class="btn style--two orange">All counter</a>
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
                                            <label for="counter_icon">Counter Icon</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" id="counter_icon" class="form-control <?php if (isset($counter_icon_error)) echo 'is-invalid' ?>" name="counter_icon" value = "<?= (isset($_POST['counter_icon'])) ? $_POST['counter_icon'] : $data['counter_icon']?>" onkeydown="show_update_btn()">

                                            <?php
                                            if (isset($counter_icon_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $counter_icon_error; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="counter_icon"></label>
                                        </div>
                                        <div class="col-9" style="height: 100px; overflow: scroll;">
                                             <!-- all icon show here  -->
                                            <?php
                                                require_once('all_icon_class.php');

                                                foreach ($fonts as $key => $font) {
    
                                                
                                            ?>

                                            <i class="<?='fa'.' '.$font?>" value="<?='fa'.' '.$font?>" onclick="showValue('<?='fa'.' '.$font?>')"></i>

                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="counter_number">counter Subtitle</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($counter_number_error)) echo 'is-invalid' ?>" id="counter_number" name="counter_number" value = "<?= (isset($_POST['counter_number'])) ? $_POST['counter_number'] : $data['counter_number']?>" onkeydown="show_update_btn()">
                                            <?php
                                            if (isset($counter_number_error)) {
                                            ?>
                                                <span class="text-danger"></span><?= $counter_number_error; ?></span>
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
                                            <input type="phone" class="form-control <?php if (isset($counter_title_error)) echo 'is-invalid' ?>" id="counter_title" name="counter_title" value = "<?= (isset($_POST['counter_title'])) ? $_POST['counter_title'] : $data['counter_title']?>" onkeydown="show_update_btn()">
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
                                            <input type="phone" class="form-control <?php if (isset($counter_text_error)) echo 'is-invalid' ?>" id="counter_text" name="counter_text"value = "<?= (isset($_POST['counter_text'])) ? $_POST['counter_text'] : $data['counter_text']?>" onkeydown="show_update_btn()">
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

  $counter_icon = document.getElementById('counter_icon');

  $counter_icon.setAttribute('value', $font_class)
  document.getElementById('counter_data_update_btn').style.display = "block";

 }

</script>

<script>
  

    document.getElementById('counter_data_update_btn').style.display = "none";

    function show_update_btn() {
        document.getElementById('counter_data_update_btn').style.display = "block";
    }

    function hide_counter_data_update_btn() {
        document.getElementById('counter_data_update_btn').style.display = "none";

    }
</script>