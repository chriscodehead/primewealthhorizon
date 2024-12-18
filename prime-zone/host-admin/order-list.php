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
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Order List</h5>
                                        <a href="#" class="btn btn-dashed">Download all orders</a>
                                    </div>
                                    <div>
                                        <div class="table-responsive theme-scrollbar">
                                            <table class="table category-table dataTable no-footer" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Order Image</th>
                                                        <th>Order Id</th>
                                                        <th>User</th>
                                                        <th>Quantity</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Payment Status</th>
                                                        <th>Delivery Status</th>
                                                        <th>Date</th>
                                                        <th class="text-center">Option</th>
                                                        <th>Tracking</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $sql = query_sql("SELECT * FROM $product  ORDER BY id DESC");
                                                    if (mysqli_num_rows($sql) > 0) {
                                                        $c = 0;
                                                        while ($row = mysqli_fetch_assoc($sql)) { ?>

                                                            <tr data-bs-toggle="offcanvas">
                                                                <td>
                                                                    <a class="d-block">
                                                                        <span class="order-image">
                                                                            <img src="../../photo/<?php print $sqli->getProductTable($row['product_id'], 'product_thumbnail'); ?>"
                                                                                class="img-fluid" alt="users">
                                                                        </span>
                                                                    </a>
                                                                </td>

                                                                <td><?php print $row['order_id']; ?></td>

                                                                <td><?php print $sqli->getUserTable($row['user_id'], 'email'); ?></td>

                                                                <td><?php print $row['order_qauntity']; ?></td>

                                                                <td><?php print $row['order_price']; ?></td>

                                                                <td><?php print $row['order_payment_method']; ?></td>

                                                                <td><?php print $row['order_payment_status']; ?></td>

                                                                <td><?php print $row['delivery_status']; ?></td>

                                                                <td class="order-success">
                                                                    <span class="font-success f-w-500">Success</span>
                                                                </td>



                                                                <td>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="order-detail.html">
                                                                                <i class="ri-eye-line"></i>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="javascript:void(0)">
                                                                                <i class="ri-pencil-line"></i>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModalToggle">
                                                                                <i class="ri-delete-bin-line"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-dashed text-white"
                                                                        href="order-tracking.html">
                                                                        Tracking
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        <?php $c++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="12">
                                                                <h3>No data found!</h3>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-block text-center">
                                <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="remove-box">
                                    <p>The permission for the use/group, preview is inherited from the object, object will create a
                                        new permission for this object</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-target="#exampleModalToggle2"
                                    data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="remove-box text-center">
                                    <div class="wrapper">
                                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                        </svg>
                                    </div>
                                    <h4 class="text-content">It's Removed.</h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="offcanvas offcanvas-end order-offcanvas" tabindex="-1" id="order-details"
                    aria-labelledby="offcanvasExampleLabel" aria-expanded="false">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title" id="offcanvasExampleLabel">#573-685572</h4>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="order-date">
                            <h6>September 17, 2024 <span class="ms-3">8:12 PM</span></h6>
                            <a href="javascript:void(0)" class="d-block mt-1">Cancel Order</a>
                        </div>

                        <div class="accordion accordion-flush custome-accordion" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Status
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="status-list">
                                            <li>
                                                <a href="javascript:void(0)">Shipped</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Pending</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                        body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                        demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                        body. Nothing more exciting happening here in terms of content, but just filling up the
                                        space to make it look, at least at first glance, a bit more representative of how this would
                                        look in a real-world application.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>
</body>

</html>