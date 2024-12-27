<?php
require_once('include.php');
$title = 'Admin Dashboard';
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

                        <div class="col-xxl-12 col-xl-12 col-md-12 col-12">
                            <div class="row">

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
                                                    <h5>Total Users</h5>
                                                    <h2>1500</h2>
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

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Category</h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="categories-section">
                                                <div class="theme-arrow">
                                                    <div class="swiper categories-slider categories-style">
                                                        <div class="swiper-wrapper">

                                                            <?php $sql = query_sql("SELECT * FROM $category_tb  ORDER BY id DESC LIMIT 10");
                                                            if (mysqli_num_rows($sql) > 0) {
                                                                $c = 0;
                                                                while ($row = mysqli_fetch_assoc($sql)) { ?>

                                                                    <div class="swiper-slide">
                                                                        <a href="category" class="food-categories">
                                                                            <img class="img-fluid categories-img" src="../../photo/<?php print $row['category_image']; ?>" alt="p-1">
                                                                            <h4 class="dark-text"><?php print $row['category_name']; ?></h4>
                                                                        </a>
                                                                    </div>

                                                            <?php $c++;
                                                                }
                                                            } ?>

                                                        </div>
                                                    </div>
                                                    <div class="swiper-button-next categories-next"></div>
                                                    <div class="swiper-button-prev categories-prev"></div>
                                                </div>
                                            </div>
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
                                                    <?php $sql = query_sql("SELECT * FROM $orders WHERE `delete_status`='no' ORDER BY id DESC LIMIT 10");
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
</body>

</html>