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
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5>Transactions</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive theme-scrollbar">
                    <div>
                      <table class="table user-table" id="table_id">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                            <th>Type</th>
                            <th>Proof Of Payment</th>
                            <th>Items</th>
                            <th>Date</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php $sql = query_sql("SELECT * FROM $top_up ORDER BY id DESC ");
                          if (mysqli_num_rows($sql) > 0) {
                            $a = 0;
                            while ($row = mysqli_fetch_assoc($sql)) { ?>

                              <tr>
                                <td><?php print $row['payment_id']; ?></td>
                                <td><?php print $row['currency']; ?><?php print $row['amount']; ?></td>
                                <td><?php if ($row['status'] == 1) {
                                      print '<button  class="btn btn-sm btn-warning text-dark" href="javascript:void(0)" data-bs-toggle="modal"
                                      data-bs-target="#approveStarter' . $row['payment_id'] . '">Approved</button>';
                                    } else {
                                      print '<button class="btn btn-sm btn-primary text-dark" href="javascript:void(0)" data-bs-toggle="modal"
                                      data-bs-target="#unApproveStarter' . $row['payment_id'] . '">Pending</button>';
                                    } ?>
                                </td>
                                <div class="modal fade theme-modal remove-coupon" id="approveStarter<?php print $row['payment_id']; ?>" aria-hidden="true" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header d-block text-center">
                                        <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                          <i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="remove-box">
                                          <p>You are about to unapprove this starter.</p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-animation btn-md fw-bold " onclick="unApproveStarter('<?php print $row['payment_id']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade theme-modal remove-coupon" id="unApproveStarter<?php print $row['payment_id']; ?>" aria-hidden="true" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header d-block text-center">
                                        <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                          <i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="remove-box">
                                          <p>You are about to approve this starter.</p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-animation btn-md fw-bold " onclick="approveStarter('<?php print $row['payment_id']; ?>')" data-bs-dismiss=" modal">Yes <i id="spin" class=""></i></button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <td><?php $row['type']; ?></td>
                                <td><?php print $row['type']; ?></td>
                                <td>
                                  <a target="_blank" href="../../photo/<?php print $row['payment_proof']; ?>" class="d-block">
                                    <span class="order-image">
                                      <img width="70px" src="../../photo/<?php print $row['payment_proof']; ?>"
                                        class="img-fluid" alt="IMG">
                                    </span>
                                  </a>
                                </td>
                                <td><?php print $row['items']; ?></td>
                                <td><?php print $row['date_pay']; ?></td>
                              </tr>

                            <?php $a++;
                            }
                          } else { ?>
                            <tr>
                              <td colspan="7">
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
          //unApproveStarter
          function unApproveStarter(packId) {
            var hr = new XMLHttpRequest();
            var url = "ajax-call.php?action=unApproveStarter";
            var packId = packId;
            var vars = "packId=" + packId;
            $('i#spin').attr("class", "fa fa-spinner fa-spin");

            if (packId == "") {

              document.getElementById('defaultTitle').innerHTML = 'Invalid Pack Id!!!';
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

          //approveStarter
          function approveStarter(packId) {
            var hr = new XMLHttpRequest();
            var url = "ajax-call.php?action=approveStarter";
            var packId = packId;
            var vars = "packId=" + packId;
            $('i#spin').attr("class", "fa fa-spinner fa-spin");

            if (packId == "") {

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