<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();


   // find old counter data 
   $id = $_GET['e'];
   $sel = "SELECT * FROM portfolio_categoty WHERE id = '$id'";
   $datas = mysqli_query($con, $sel);
   $data = mysqli_fetch_assoc($datas);

// store data in variable from form 
if (!empty($_POST)) {
    $portfolio_categoty_name = $_POST['portfolio_categoty_name'];
    $portfolio_categoty_slug = strtolower(str_replace(' ', '-', $portfolio_categoty_name));

    // empty validation here 
    if (!empty($portfolio_categoty_name)) {
        // update query here 
        $update = "UPDATE portfolio_categoty SET portfolio_categoty_name = '$portfolio_categoty_name',portfolio_categoty_slug = '$portfolio_categoty_slug' WHERE id = '$id'";

        // update query run or data update here 
        if (mysqli_query($con, $update)) {

            header('Location: all_portfolio_category.php');
            $_SESSION['success'] = "Portfolio Category update successful";
        } else {
            $_SESSION['error'] = "Ops! Portfolio Category update failed";
        }
    } else {
        $portfolio_categoty_name_error = "Please input Portfolio Category Name";
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
                                <h4 class="font-20">ADD Portfolio Categorys</h4>

                                <div class="d-flex flex-wrap">

                                    <!-- start add new portfolio_category btn  -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="all_portfolio_category.php" type="button" class="btn style--two orange">All Portfolio Category</a>
                                    </div>
                                    <!-- end add new portfolio_category btn  -->
                                </div>
                            </div>
                            <br>
                            <div class="edit-personal-info mb-5">
                                <div class="row">
                                  
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">

                                    <!-- Form Group -->
                                    <div class="form-group row align-items-center">
                                        <div class="col-3">
                                            <label for="portfolio_categoty_name">Category Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="phone" class="form-control <?php if (isset($portfolio_categoty_name_error)) echo 'is-invalid' ?>" id="portfolio_categoty_name" name="portfolio_categoty_name" value = "<?= (isset($_POST['portfolio_categoty_name'])) ? $_POST['portfolio_categoty_name'] : $data['portfolio_categoty_name']?>" onkeydown="show_update_btn()">
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

                                    <div class="button-group pt-1 m-auto" id="portfolio_category_data_update_btn">
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
  

  document.getElementById('counter_data_update_btn').style.display = "none";

  function show_update_btn() {
      document.getElementById('counter_data_update_btn').style.display = "block";
  }

  function hide_counter_data_update_btn() {
      document.getElementById('counter_data_update_btn').style.display = "none";

  }
</script>