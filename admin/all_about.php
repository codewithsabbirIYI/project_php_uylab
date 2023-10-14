<?php
require_once('functions/admin_function.php');

// header part here 
get_header();

// sidebar part here 
get_sidebar();

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
                                <h4 class="font-20">All about Information</h4>

                                <div class="d-flex flex-wrap">
                                    <!-- Date Picker -->
                                    <div class="dashboard-date style--six mr-20 mt-3 mt-sm-0">
                                        <span class="input-group-addon">
                                            <img src="../../assets/img/svg/calender-color.svg" alt="" class="svg">
                                        </span>

                                        <input type="text" id="default-date" value="28 October 2019">
                                    </div>
                                    <!-- End Date Picker -->


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
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Invoice List Table -->
                            <table class="text-nowrap dh-table">
                                <thead>
                                    <tr>
                                        <th>About Title</th>
                                        <th>Button Link</th>
                                        <th>Button Text</th>
                                        <th>About Home Image</th>
                                        <th>About Page Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- all data find and loop here  -->
                                    <?php
                                    $sel = "SELECT * FROM about ORDER BY id ASC";
                                    $Q = mysqli_query($con, $sel);
                                    while ($data = mysqli_fetch_assoc($Q)) {
                                    ?>

                                        <!-- table item here  -->
                                        <tr>
                                            <td><?= $data['about_title']; ?></td>
                                            <td><?= $data["button_link"]; ?></td>
                                            <td><?= $data["button_text"]; ?></td>
                                            <!-- about home img  -->
                                            <td>
                                                <?php

                                                if ($data["about_home_image"] != '') {
                                                ?>
                                                    <img style="width: 100px;" class="img200" src="uploads/<?= $data['about_home_image']; ?>" alt="about" />
                                                <?php
                                                } else {
                                                ?>
                                                    <img style="width: 100px;" src="asset/img/avatar/avatar-about.png" alt="about" />
                                                <?php
                                                }

                                                ?>
                                            </td>
                                                <!-- about page img  -->
                                            <td>
                                                <?php

                                                if ($data["about_pase_image"] != '') {
                                                ?>
                                                    <img style="width: 100px;" class="img200" src="uploads/<?= $data['about_pase_image']; ?>" alt="about" />
                                                <?php
                                                } else {
                                                ?>
                                                    <img style="width: 100px;" src="asset/img/avatar/avatar-about.png" alt="about" />
                                                <?php
                                                }

                                                ?>
                                            </td>
                                           
                                            <td>
                                                <!-- Dropdown Button -->
                                                <div class="dropdown-button">
                                                    <a href="#" class="d-flex align-items-center justify-content-start" data-toggle="dropdown" aria-expanded="false">
                                                        Manage
                                                        <div class="icofont-arrow-right ml-1">

                                                        </div>

                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1004px, 82px, 0px);">
                                                        <a href="view-about.php?e=<?= $data["id"]; ?>">View</a>
                                                        <a href="view-about.php?e=<?= $data["id"]; ?>">Edit</a>

                                                        <a href="delete-about.php?d=<?= $data["id"]; ?>">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- End Dropdown Button -->
                                            </td>

                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <!-- End Invoice List Table -->
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