<?php
require_once('include.php');
$title = 'Dashboard | Orders';
$bassic->checkLogedINAdmin('login'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php'); ?>

<body>

    <div class="tap-top">
        <i class="ri-arrow-up-double-fill"></i>
    </div>

    <div class="loader-wrapper">
        <img src="assets/images/loader.gif" alt="">
    </div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <?php require_once('header.php'); ?>

        <div class="page-body-wrapper">
            <?php require_once('side-bar.php'); ?>

            <div class="page-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card">
                                <div class="delivery-root">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.8415665736!2d-0.26674604057231066!3d51.52873932359012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sin!4v1714986124652!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="nav setting-main-box driver-main-box sticky theme-scrollbar" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <li>
                                                    <button class="nav-link active" id="Settings-tab"
                                                        data-bs-toggle="pill" data-bs-target="#Settings" role="tab"
                                                        aria-controls="Settings" aria-selected="true">
                                                        <i class="ri-settings-line"></i>Order Status</button>
                                                </li>
                                                <li>
                                                    <button class="nav-link" id="Info-tab" data-bs-toggle="pill"
                                                        data-bs-target="#Info" role="tab"
                                                        aria-controls="Info" aria-selected="false">
                                                        <i class="ri-information-2-line"></i>Order Details</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <div class="restaurant-tab">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="Settings" role="tabpanel"
                                                        aria-labelledby="Settings-tab">
                                                        <div class="input-items">
                                                            <div class="row gy-3">
                                                                <div class="col-12">
                                                                    <div class="input-box driver-details-box">
                                                                        <h6>Drivers Information</h6>
                                                                        <div class="driver-details-item">
                                                                            <img src="assets/images/user/1.jpg" alt="">
                                                                            <div>
                                                                                <div>
                                                                                    <p>Driver Name :</p>
                                                                                    <h5>Jose Mike</h5>
                                                                                </div>
                                                                                <div>
                                                                                    <p>Estimated Delivery Time :</p>
                                                                                    <h5>30 mins</h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="input-box driver-details-box">
                                                                        <h6>Shipping Details</h6>
                                                                        <ul class="delivery-list">
                                                                            <li>
                                                                                <img src="assets/images/svg/driver.svg" alt="">
                                                                                <div>
                                                                                    <h5>Driver position</h5>
                                                                                    <p>Blackville</p>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/svg/placed.svg" alt="">
                                                                                <div>
                                                                                    <h5>Restaurant Address</h5>
                                                                                    <p>Starbucks</p>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/svg/user-map.svg" alt="">
                                                                                <div>
                                                                                    <h5>Delivery Address</h5>
                                                                                    <p>Blackville </p>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="Info" role="tabpanel"
                                                        aria-labelledby="Info-tab">
                                                        <div class="checkout-detail">
                                                            <div class="cart-address-box">
                                                                <div class="add-img">
                                                                    <img class="img-fluid img sm-size" src="assets/images/svg/location.svg" alt="rp1">
                                                                </div>
                                                                <div class="add-content">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <h5 class=" deliver-place">
                                                                            Deliver to : Home
                                                                            <i class="ri-check-line"></i>
                                                                        </h5>
                                                                    </div>
                                                                    <h6 class="address mt-sm-2 mt-1 content-color">
                                                                        93, Songbird Cir, South Carolina, USA
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="cart-address-box mt-3">
                                                                <div class="add-img">
                                                                    <img class="img-fluid img sm-size" src="assets/images/svg/wallet-add.svg" alt="rp1">
                                                                </div>
                                                                <div class="add-content">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <h5 class=" deliver-place">
                                                                            Payment Method: <i class="ri-check-line"></i>
                                                                        </h5>
                                                                    </div>
                                                                    <h6 class="address mt-sm-2 mt-1 content-color">
                                                                        Card: 98** **** **20
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="horizontal-product-box">
                                                                        <div class="product-content">
                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                <h5>Ultimate Loaded Nacho Fiesta</h5>
                                                                                <h6 class="product-price">$20</h6>
                                                                            </div>
                                                                            <h6 class="ingredients-text">
                                                                                Hot Nacho Chips
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="horizontal-product-box">
                                                                        <div class="product-content">
                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                <h5>Smoked Salmon Bagel</h5>
                                                                                <h6 class="product-price">$40</h6>
                                                                            </div>
                                                                            <h6 class="ingredients-text">
                                                                                Smoked Biscuit
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="horizontal-product-box">
                                                                        <div class="product-content">
                                                                            <div class="d-flex align-items-center justify-content-between">
                                                                                <h5>Cranberry Club Sandwich</h5>
                                                                                <h6 class="product-price">$50</h6>
                                                                            </div>
                                                                            <h6 class="ingredients-text">Vegetables</h6>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <h5 class="bill-details-title fw-semibold ">
                                                                Bill Details
                                                            </h5>
                                                            <div class="sub-total">
                                                                <h6 class="content-color fw-normal">Sub Total</h6>
                                                                <h6 class="fw-semibold">$110</h6>
                                                            </div>
                                                            <div class="sub-total">
                                                                <h6 class="content-color fw-normal">
                                                                    Delivery Charge (2 kms)
                                                                </h6>
                                                                <h6 class="fw-semibold success-color">Free</h6>
                                                            </div>
                                                            <div class="sub-total">
                                                                <h6 class="content-color fw-normal">
                                                                    Discount (10%)
                                                                </h6>
                                                                <h6 class="fw-semibold">$10</h6>
                                                            </div>
                                                            <div class="grand-total">
                                                                <h6 class="fw-semibold ">Total</h6>
                                                                <h6 class="fw-semibold amount">$100</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tracking table end -->

                <div class="container-fluid">
                    <!-- footer start-->
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2024 ©Zomo template by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <!-- tracking section End -->
        </div>
    </div>
    <!-- page-wrapper End -->

    <!-- Modal start -->
    <div class="modal theme-modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Logging Out</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-cancel" type="button" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                    <button class="btn btn-submit" type="submit" data-bs-dismiss="modal" aria-label="Close"><a href="login.html">Yes</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.net/zomo/landing/backend/order-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2024 10:20:50 GMT -->

</html>