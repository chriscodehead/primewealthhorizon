<?php
require_once('include.php');
$title = 'Dashboard | All Users';
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
                                        <h5>All Users</h5>
                                        <form class="d-inline-flex">
                                            <a href="add-new-user" class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Add New
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive theme-scrollbar table-product">
                                        <table class="table category-table dataTable no-footer " id="table_id">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Affiliate Payment</th>
                                                    <th>Affiliate Status</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $sql = query_sql("SELECT * FROM $user_tb  ORDER BY id DESC");
                                                if (mysqli_num_rows($sql) > 0) {
                                                    $c = 0;
                                                    while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                        <tr>
                                                            <td class="f-w-600"><?php print $c + 1; ?></td>

                                                            <td>
                                                                <div class="table-image">
                                                                    <img src="../../userImg/<?php print $row['passport']; ?>" class="img-fluid rounded"
                                                                        alt="">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="user-name">
                                                                    <?php print $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?>
                                                                </div>
                                                            </td>

                                                            <td class="f-w-600"><?php print $row['email']; ?></td>

                                                            <td><?php if ($row['payment_activation_status'] == 'yes') {
                                                                    print '<button data-bs-toggle="modal"
        data-bs-target="#modalPaid' . $row['user_code'] . '" class="btn btn-sm btn-warning text-dark">Paid</button>';
                                                                } else {
                                                                    print '<button data-bs-toggle="modal"
        data-bs-target="#modalunpaid' . $row['user_code'] . '" class="btn btn-sm btn-primary text-dark">Pending</button>';
                                                                } ?>
                                                            </td>

                                                            <div class="modal fade theme-modal remove-coupon" id="modalPaid<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to disapprove this payment status and change it to pending payment.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="setPendingPayment('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade theme-modal remove-coupon" id="modalunpaid<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to approve this payment status and mark it as paid.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="setPaidPayment('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>






                                                            <td><?php if ($row['approved_for_affiliate'] == 'yes') {
                                                                    print '<button data-bs-toggle="modal"
        data-bs-target="#modalApproveAfiliate' . $row['user_code'] . '" class="btn btn-sm btn-warning text-dark">Approved</button>';
                                                                } else {
                                                                    print '<button data-bs-toggle="modal"
        data-bs-target="#modalUnapproveAfiliate' . $row['user_code'] . '" class="btn btn-sm btn-primary text-dark">Pending</button>';
                                                                } ?>
                                                            </td>



                                                            <div class="modal fade theme-modal remove-coupon" id="modalApproveAfiliate<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to disapprove this affilaie status and change it to pending approval.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="setPendingApproveAfiliate('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade theme-modal remove-coupon" id="modalUnapproveAfiliate<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to approve this affiliate status and mark it as approved.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="setApproveAfiliate('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td><?php if ($row['blocked_account'] == 0) {
                                                                    print '<button data-bs-toggle="modal"
data-bs-target="#modalBlockUser' . $row['user_code'] . '" class="btn btn-sm btn-warning text-dark">Active</button>';
                                                                } else {
                                                                    print '<button data-bs-toggle="modal"
data-bs-target="#modalUnblockUser' . $row['user_code'] . '" class="btn btn-sm btn-primary text-dark">Blocked</button>';
                                                                } ?>
                                                            </td>


                                                            <div class="modal fade theme-modal remove-coupon" id="modalBlockUser<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to unblock this users account.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="unblockUser('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade theme-modal remove-coupon" id="modalUnblockUser<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                                <p>Please confirm if you want to block this users account.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                            <button type="button" class="btn btn-animation btn-md fw-bold " onclick="blockUser('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td>
                                                                <ul>
                                                                    <li>
                                                                        <a href="user-details?userId=<?php print $row['user_code']; ?>">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="edit-user?userId=<?php print $row['user_code']; ?>">
                                                                            <i class="ri-pencil-line"></i>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModalToggle<?php print $row['user_code']; ?>">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle<?php print $row['user_code']; ?>" aria-hidden="true" tabindex="-1">
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
                                                                            <p>You are about to delete this user. Once this action is executed, it cannot be undone.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                                        <button type="button" class="btn btn-animation btn-md fw-bold " onclick="delUser('<?php print $row['user_code']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php $c++;
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="8">
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
                    function delUser(UserId) {
                        var hr = new XMLHttpRequest();
                        var url = "ajax-call.php?action=deleteUser";
                        var UserId = UserId;
                        var vars = "UserId=" + UserId;
                        $('i#spin').attr("class", "fa fa-spinner fa-spin");

                        if (UserId == "") {

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

                    //setPendingPayment setPaidPayment
                    //setPendingApproveAfiliate setApproveAfiliate
                    //unblockUser blockUser
                </script>
</body>

</html>