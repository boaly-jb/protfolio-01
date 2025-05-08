<?php
session_start();
include "../include/backendHeader.php";
?>

<div class="container">
    <div class="card bg-primary text-white mt-5 p-3 shadow-sm border-rounded-3">
        <p> Header Section Edit Page</p>
    </div>
    <form action="../controller/herrorController.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-light shadow-sm border-rounded-3">

                    <div class="card-header"> Fill All Input </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="herrorDetail" class="form-label">Herror Detail</label>
                            <span class="text-danger">
                                <?= $_SESSION['error']['herror-detail'] ?? null ?>
                            </span>
                            <input value="<?= $_SESSION['herror-detail'] ?? null ?>" type="text" name="herror-detail"
                                class="form-control" id="herrorDetail">
                        </div>
                        <div class="mb-3">
                            <label for="herrorTitle" class="form-label">Header Title</label>
                            <span class="text-danger">
                                <?= $_SESSION['error']['herror-title'] ?? null ?>
                            </span>
                            <input type="text" name="herror-title" class="form-control" id="herrorTitle">
                        </div>
                        <div class="mb-3">
                            <label for="btnLink" class="form-label">Button Link</label>
                            <input value="<?= $_SESSION['error']['btn-link'] ?? null ?>" type="text" name="btn-link"
                                class="form-control" id="btnLink">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card bg-light shadow-sm p-3">
                    <div class="row">
                        <div class="col-lg-6">

                            <p> Herror Background Image</p>
                            <hr>
                            <div class="mb-3  ">

                                <label for="herrorBg" class="form-label">
                                    <div class="img-box bg-primary"
                                        style=" width: 200px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img class="img-fluid"
                                            src="https://i.pinimg.com/736x/09/a3/47/09a3474c42de10846b57e294a7a15e84.jpg"
                                            alt="">
                                    </div>
                                </label>
                                <input type="file" name="herror_bg_img" class="form-control d-none" id="herrorBg">

                                <span class="text-danger">
                                    <?= $_SESSION['error']['herror_bg_img'] ?? null ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p> Herror Profile Image</p>
                            <hr>
                            <div class="mb-3">
                                <label for="herrorProfile" class="form-label">
                                    <div class="img-box bg-primary"
                                        style=" width: 200px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img class="img-fluid"
                                            src="https://i.pinimg.com/736x/61/a6/7a/61a67a13b71fd9971e3d9cd5bd935b31.jpg"
                                            alt="">
                                    </div>
                                </label>
                                <input type="file" name="herror_profile_img" class="form-control d-none"
                                    id="herrorProfile">
                                <span class="text-danger">
                                    <?= $_SESSION['error']['herror_profile_img'] ?? null ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-lg form-controller btn-primary float-right shadow"> Submit </button>
    </form>
</div>

<?php
include "../include/backendFooter.php";
unset($_SESSION ['error']);
?>