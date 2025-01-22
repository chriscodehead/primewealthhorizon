<?php
require_once('include.php');
$title = 'User Dashboard'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php'); ?>

<body>
    <div class="tap-top">
        <i class="ri-arrow-up-double-fill"></i>
    </div>

    <?php require_once('loader.php');
    ?>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <?php require_once('header.php'); ?>

        <div class="page-body-wrapper">
            <?php require_once('side-bar.php'); ?>

            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xxl-12 col-xl-12 col-md-12 col-12">
                            <div class="row">

                                <?php require_once('email-activation-check.php'); ?>

                                <div class="col-xxl-4 col-sm-6 ">
                                    <div class="card widgets-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 d-flex d-lg-block justify-content-between align-items-center">
                                                    <h5>Total Sale</h5>
                                                    <h2>$254.90</h2>
                                                </div>
                                                <div class="col-lg-7 col-12 p-0">
                                                    <div id="daily-value"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-sm-6 ">
                                    <div class="card widgets-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 d-flex d-lg-block justify-content-between align-items-center">
                                                    <h5>Total Commision</h5>
                                                    <h2>$254.90</h2>
                                                </div>
                                                <div class="col-lg-7 col-12 p-0">
                                                    <div id="order-value"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-xl-6 d-xxl-block">
                                    <div class="card widgets-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <h5>Total Products</h5>
                                                    <h2>10</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-xl-6 d-xxl-block">
                                    <div class="card widgets-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <h5>Total Orders</h5>
                                                    <h2>1500</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'approved_for_affiliate') == 'no') { ?>
                                    <div class="col-xxl-12 col-sm-12 ">
                                        <div class="card widgets-card">
                                            <div class="card-body">
                                                <div class="">
                                                    To become an affiliate, simply purchase one of our Affiliate Starter Packs to unlock eligibility to join our dynamic team. Once verified, you'll be ready to start earning like a pro, joining countless others who are already turning their efforts into real income. Take the first step toward financial success today!
                                                    <a href="buy-affiliate-pack">
                                                        <button class="btn btn-sm btn-danger pull-right" type="button">Become An Affiliate</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-xxl-12 col-sm-12 ">
                                    <div class="card widgets-card">
                                        <div class="card-body">
                                            <div class="">
                                                <h5>Affiliate Store Link:</h5>
                                                <?php print $siteUrl; ?><input style="width: 200px;" type="text" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'affilaite_url'); ?>" id="storeName" name="storeName" placeholder="Enter store name" oninput="formatInput()"> <i onclick="saveStoreName();" id="updateStoreUrl" class="fa fa-edit text-warning">Save</i>
                                            </div>
                                            <a style="font-size: 10px;" target="_blank" href="<?php print $siteUrl; ?><?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'affilaite_url'); ?>"><?php print $siteUrl; ?><?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'affilaite_url'); ?></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order Reports</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive theme-scrollbar">
                                        <div>
                                            <table class="table user-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Order Image</th>
                                                        <th>Order Id</th>
                                                        <th>User</th>
                                                        <th></th>
                                                        <th>Quantity</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Payment Status</th>
                                                        <th>Delivery Status</th>
                                                        <th>Date</th>
                                                        <th>Tracking</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $affilaite_id = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'affilaite_id');
                                                    $sql = query_sql("SELECT * FROM $orders WHERE `affilaite_id`='" . $affilaite_id . "' and `delete_status`='no' ORDER BY id DESC LIMIT 10");
                                                    if (mysqli_num_rows($sql) > 0) {
                                                        $c = 0;
                                                        while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                            <tr data-bs-toggle="offcanvas">
                                                                <td>
                                                                    <a class="d-block">
                                                                        <span class="order-image">
                                                                            <img src="../photo/<?php print $sqli->getProductTable($row['product_id'], 'product_thumbnail'); ?>"
                                                                                class="img-fluid" alt="IMG">
                                                                        </span>
                                                                    </a>
                                                                </td>

                                                                <td><?php print $row['order_id']; ?></td>

                                                                <td><?php print @$sqli->getUserTable($row['user_id'], 'email'); ?></td>

                                                                <td><?php $row['order_qauntity']; ?></td>

                                                                <td><?php print $row['order_qauntity']; ?></td>

                                                                <td><?php print $row['order_price']; ?></td>

                                                                <td><button class="btn btn-sm btn-primary text-dark"><?php print $row['order_payment_method']; ?></button></td>

                                                                <td><?php if ($row['order_payment_status'] == 'yes') {
                                                                        print '<button  class="btn btn-sm btn-warning text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paymentApprove' . $row['order_id'] . '">Approved</button>';
                                                                    } else {
                                                                        print '<button class="btn btn-sm btn-primary text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paymentPending' . $row['order_id'] . '">Pending</button>';
                                                                    } ?>
                                                                </td>


                                                                <td><?php if ($row['delivery_status'] == 'yes') {
                                                                        print '<button  class="btn btn-sm btn-warning text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deliveryApprove' . $row['order_id'] . '">Delivered</button>';
                                                                    } else {
                                                                        print '<button class="btn btn-sm btn-primary text-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deliveryPending' . $row['order_id'] . '">Processing</button>';
                                                                    } ?>
                                                                </td>


                                                                <td><?php print $row['date_created']; ?></td>


                                                                <td>
                                                                    <a class="btn btn-sm btn-dashed text-white"
                                                                        href="order-tracking?orderId=<?php print $row['order_id'] ?>">
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

                <?php require_once('footer.php'); ?>
                <script>
                    //saveStoreName
                    function saveStoreName() {
                        var hr = new XMLHttpRequest();
                        var url = "ajax-call.php?action=saveStoreName";
                        var storeName = document.getElementById('storeName').value;
                        var vars = "storeName=" + storeName;

                        if (storeName == "") {
                            setTimeout(function() {
                                sweetUnpre('Unexpected Error!!! Please try again!');
                            }, 1500);
                        } else {
                            hr.open("POST", url, true);
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if (hr.readyState == 4) {
                                    if (hr.status == 200) {
                                        var return_data = hr.responseText;
                                        sweetUnpre(return_data);
                                        setTimeout(function() {
                                            location.reload();
                                        }, 1000);
                                    } else {
                                        sweetUnpre('An unexpected error occurred. Please try again later.');
                                    }
                                }
                            }
                            hr.send(vars);
                        }
                    }

                    $(document).ready(function() {
                        $('#updateStoreUrl').css('cursor', 'pointer');
                    });

                    //formatInput
                    function formatInput() {
                        const inputField = document.getElementById('storeName');
                        const formattedText = inputField.value
                            .toLowerCase()
                            .replace(/\s+/g, '')
                            .replace(/[^a-z0-9]/g, '');
                        inputField.value = formattedText;
                    }

                    ///resendEmailActivation
                    function resendEmailActivation(email) {
                        var hr = new XMLHttpRequest();
                        var url = "../reg_process.php?action=resendEmailActivation";
                        var vars = "email=" + email;

                        if (email == "") {
                            setTimeout(function() {
                                sweetUnpre('Unexpected Error!!! Please try again!');
                            }, 1500);
                        } else {
                            hr.open("POST", url, true);
                            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            hr.onreadystatechange = function() {
                                if (hr.readyState == 4) {
                                    if (hr.status == 200) {
                                        var return_data = hr.responseText;
                                        sweetUnpre(return_data);
                                    } else {
                                        sweetUnpre('An unexpected error occurred. Please try again later.');
                                    }
                                }
                            }
                            hr.send(vars);
                        }
                    }
                </script>
</body>

</html>