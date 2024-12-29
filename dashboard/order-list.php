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
                                        <!-- <a href="#" class="btn btn-dashed">Download all orders</a> -->
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
                                                    <?php $sql = query_sql("SELECT * FROM $orders WHERE `delete_status`='no' ORDER BY id DESC");
                                                    if (mysqli_num_rows($sql) > 0) {
                                                        $c = 0;
                                                        while ($row = mysqli_fetch_assoc($sql)) { ?>

                                                            <tr data-bs-toggle="offcanvas">
                                                                <td>
                                                                    <a class="d-block">
                                                                        <span class="order-image">
                                                                            <img src="../../photo/<?php print $sqli->getProductTable($row['product_id'], 'product_thumbnail'); ?>"
                                                                                class="img-fluid" alt="IMG">
                                                                        </span>
                                                                    </a>
                                                                </td>

                                                                <td><?php print $row['order_id']; ?></td>

                                                                <td><?php print @$sqli->getUserTable($row['user_id'], 'email'); ?></td>

                                                                <td><?php print $row['order_qauntity']; ?></td>

                                                                <td><?php print $row['order_price']; ?></td>

                                                                <td><button class="btn btn-sm btn-primary text-dark"><?php print $row['order_payment_method']; ?></button></td>

                                                                <td><?php if ($row['order_payment_status'] == 'yes') {
                                                                        print '<button  class="btn btn-sm btn-warning text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paymentApprove' . $row['order_id'] . '">Approved</button>';
                                                                    } else {
                                                                        print '<button class="btn btn-sm btn-primary text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paymentPending' . $row['order_id'] . '">Pending</button>';
                                                                    } ?>
                                                                </td>

                                                                <div class="modal fade theme-modal remove-coupon" id="paymentPending<?php print $row['order_id']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                    <p>Please confirm if you want to approve this order payment.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                                <button type="button" class="btn btn-animation btn-md fw-bold " onclick="approveOrderPayment('<?php print $row['order_id']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal fade theme-modal remove-coupon" id="paymentApprove<?php print $row['order_id']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                    <p>Please confirm if you want to cancel this order payment.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                                <button type="button" class="btn btn-animation btn-md fw-bold " onclick="cancelOrderPaymnet('<?php print $row['order_id']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <td><?php if ($row['delivery_status'] == 'yes') {
                                                                        print '<button  class="btn btn-sm btn-warning text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deliveryApprove' . $row['order_id'] . '">Delivered</button>';
                                                                    } else {
                                                                        print '<button class="btn btn-sm btn-primary text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deliveryPending' . $row['order_id'] . '">Processing</button>';
                                                                    } ?>
                                                                </td>


                                                                <td><?php print $row['date_created']; ?></td>

                                                                <td>
                                                                    <ul>


                                                                        <li>
                                                                            <a href="order-detail?orderId=<?php print $row['order_id'] ?>">
                                                                                <i class="ri-pencil-line"></i>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle<?php print $row['order_id'] ?>">
                                                                                <i class="ri-delete-bin-line"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-dashed text-white"
                                                                        href="order-tracking?orderId=<?php print $row['order_id'] ?>">
                                                                        Tracking
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle<?php print $row['order_id'] ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>You are about to delete this order. Once this action is executed, it cannot be undone.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" onclick="delOrder('<?php print $row['order_id']; ?>')" class="btn btn-animation btn-md fw-bold" data-bs-toggle="modal" data-bs-dismiss="modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

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

                <?php require_once('footer.php'); ?>

                <script>
                    function delOrder(orderId) {
                        var hr = new XMLHttpRequest();
                        var url = "ajax-call.php?action=delOrder";
                        var orderId = orderId;
                        var vars = "orderId=" + orderId;
                        $('i#spin').attr("class", "fa fa-spinner fa-spin");

                        if (orderId == "") {

                            document.getElementById('defaultTitle').innerHTML = 'Invalid Product Id!!!';
                            document.getElementById('defaultMessage').innerHTML = 'Unexpected error occoured. Refresh page and try again!';
                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                            modal.show();

                        } else {

                            hr.open("POST", url, true); // asynchronous request
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if (hr.readyState == 4) {
                                    $(".se-pre-con2").css('display', 'none');
                                    if (hr.status == 200) {
                                        var return_data = JSON.parse(hr.responseText);
                                        if (return_data.success) {
                                            const modal = new bootstrap.Modal(document.getElementById('exampleModalToggle2'));
                                            modal.show();
                                            setTimeout(function() {
                                                location.reload();
                                            }, 5000);

                                        } else {
                                            document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                            document.getElementById('defaultMessage').innerHTML = return_data.msg;
                                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                            modal.show();
                                        }
                                    } else {

                                        document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                        document.getElementById('defaultMessage').innerHTML = 'An unexpected error occurred. Please try again later.';
                                        const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                        modal.show();
                                    }
                                }
                            }
                            hr.send(vars); // Actually execute the request

                        }

                    }

                    //cancelOrderPaymnet
                    function cancelOrderPaymnet(orderId) {
                        var hr = new XMLHttpRequest();
                        var url = "ajax-call.php?action=cancelOrderPaymnet";
                        var orderId = orderId;
                        var vars = "orderId=" + orderId;
                        $('i#spin').attr("class", "fa fa-spinner fa-spin");

                        if (orderId == "") {

                            document.getElementById('defaultTitle').innerHTML = 'Invalid User Id!!!';
                            document.getElementById('defaultMessage').innerHTML = 'Unexpected error occoured. Refresh page and try again!';
                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                            modal.show();

                        } else {

                            hr.open("POST", url, true); // asynchronous request
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if (hr.readyState == 4) {
                                    $(".se-pre-con2").css('display', 'none');
                                    if (hr.status == 200) {
                                        var return_data = JSON.parse(hr.responseText);
                                        if (return_data.success) {
                                            document.getElementById('defaultTitle').innerHTML = return_data.success;
                                            document.getElementById('defaultMessage').innerHTML = return_data.msg;
                                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                            modal.show();
                                            setTimeout(function() {
                                                location.reload();
                                            }, 5000);

                                        } else {
                                            document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                            document.getElementById('defaultMessage').innerHTML = return_data.msg;
                                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                            modal.show();
                                        }
                                    } else {

                                        document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                        document.getElementById('defaultMessage').innerHTML = 'An unexpected error occurred. Please try again later.';
                                        const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                        modal.show();
                                    }
                                }
                            }
                            hr.send(vars); // Actually execute the request

                        }

                    }

                    //approveOrderPayment  
                    function approveOrderPayment(orderId) {
                        var hr = new XMLHttpRequest();
                        var url = "ajax-call.php?action=approveOrderPayment";
                        var orderId = orderId;
                        var vars = "orderId=" + orderId;
                        $('i#spin').attr("class", "fa fa-spinner fa-spin");

                        if (orderId == "") {

                            document.getElementById('defaultTitle').innerHTML = 'Invalid User Id!!!';
                            document.getElementById('defaultMessage').innerHTML = 'Unexpected error occoured. Refresh page and try again!';
                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                            modal.show();

                        } else {

                            hr.open("POST", url, true); // asynchronous request
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if (hr.readyState == 4) {
                                    $(".se-pre-con2").css('display', 'none');
                                    if (hr.status == 200) {
                                        var return_data = JSON.parse(hr.responseText);
                                        if (return_data.success) {
                                            document.getElementById('defaultTitle').innerHTML = return_data.success;
                                            document.getElementById('defaultMessage').innerHTML = return_data.msg;
                                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                            modal.show();
                                            setTimeout(function() {
                                                location.reload();
                                            }, 5000);

                                        } else {
                                            document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                            document.getElementById('defaultMessage').innerHTML = return_data.msg;
                                            const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                            modal.show();
                                        }
                                    } else {

                                        document.getElementById('defaultTitle').innerHTML = 'An error occured!';
                                        document.getElementById('defaultMessage').innerHTML = 'An unexpected error occurred. Please try again later.';
                                        const modal = new bootstrap.Modal(document.getElementById('defaultModal'));
                                        modal.show();
                                    }
                                }
                            }
                            hr.send(vars); // Actually execute the request

                        }

                    }
                </script>

</body>

</html>