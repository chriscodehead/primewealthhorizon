<?php
require_once('include.php');
$title = 'Transactions | Dashboard'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php'); ?>

<body>
  <div class="tap-top">
    <i class="ri-arrow-up-double-fill"></i>
  </div>

  <?php //require_once('loader.php'); 
  ?>

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
                      <!--  class="table user-table" id="table_id" -->
                      <table>
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Proof Of Payment</th>
                            <th>Items</th>
                            <th>Date</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php $sql = query_sql("SELECT * FROM $top_up WHERE `email` = '" . $sqli->getEmail($_SESSION['user_code']) . "' ORDER BY id DESC ");
                          if (mysqli_num_rows($sql) > 0) {
                            $a = 0;
                            while ($row = mysqli_fetch_assoc($sql)) { ?>

                              <tr>
                                <td><?php print $row['payment_id']; ?></td>
                                <td><?php print $row['currency']; ?><?php print $row['amount']; ?></td>
                                <td><?php if ($row['status'] == 1) {
                                      print '<button  class="btn btn-sm btn-warning text-dark">Approved</button>';
                                    } else {
                                      print '<button class="btn btn-sm btn-primary text-dark">Pending</button>';
                                    } ?>
                                </td>
                                <td><?php print $row['type']; ?></td>
                                <td>
                                  <a target="_blank" href="../photo/<?php print $row['payment_proof']; ?>" class="d-block">
                                    <span class="order-image">
                                      <img width="70px" src="../photo/<?php print $row['payment_proof']; ?>"
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
</body>

</html>