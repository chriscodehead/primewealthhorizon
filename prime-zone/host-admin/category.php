<?php
require_once('include.php');
$title = 'Category List | Dashboard';
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
                                        <h5>All Category</h5>
                                        <form class="d-inline-flex">
                                            <a href="add-new-categorys"
                                                class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Add New
                                            </a>
                                        </form>
                                    </div>
                                    <div class="table-responsive theme-scrollbar">
                                        <div>
                                            <table class="table category-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th><input id="checkall" class="custom-checkbox" type="checkbox" name="text">
                                                        </th>
                                                        <th>Category Image</th>
                                                        <th>Category Name</th>
                                                        <th>Date</th>
                                                        <th>Products</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $sql = query_sql("SELECT * FROM $category_tb  ORDER BY id DESC");
                                                    if (mysqli_num_rows($sql) > 0) {
                                                        $c = 0;
                                                        while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                            <tr>
                                                                <td>
                                                                    <input class="custom-checkbox" type="checkbox" name="text">
                                                                </td>

                                                                <td>
                                                                    <div class="table-image">
                                                                        <img src="../../photo/<?php print $row['category_image']; ?>" class="img-fluid"
                                                                            alt="">
                                                                    </div>
                                                                </td>
                                                                <td><?php print $bassic->reduceTextLength($row['category_name'], 20); ?></td>

                                                                <td><?php print $row['date_created']; ?></td>

                                                                <td><?php print $sqli->countProductByCategory($row['category_id']); ?></td>

                                                                <td>
                                                                    <ul
                                                                        class="d-flex align-items-center  justify-content-center">

                                                                        <li>
                                                                            <a href="edit-category?cat_id=<?php print $row['category_id']; ?>">
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
                                                            </tr>
                                                        <?php $c++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6">
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

                <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-block text-center">
                                <h5 class="modal-title w-100" id="exampleModalLabel22">Deleting not allowed</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="remove-box">
                                    <p>Deleting categories is disabled on this platform to prevent potential disruptions to its functionality. We recommend editing the categories instead. Thank you for your understanding.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Ok</button>
                                <button style="display: none;" type="button" class="btn btn-animation btn-md fw-bold" data-bs-target="#exampleModalToggle2"
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

</body>

</html>