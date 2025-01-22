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



              </div>
            </div>

            <div class="col-12">


              <div class="trending-orders">
                <div class="card">
                  <h3>Affiliate Packages</h3>
                </div>

                <div class="row">

                  <?php $sql = query_sql("SELECT * FROM $starter_pack_tb WHERE `product_status`=1 ORDER BY id ASC");
                  if (mysqli_num_rows($sql) > 0) {
                    $c = 0;
                    while ($row = mysqli_fetch_assoc($sql)) { ?>

                      <div class="col-lg-4 mb-3">
                        <div class="trending-box">
                          <div class="col-lg-12">
                            <div class="card-body trending-items">
                              <img style="width: 100%;" src="../photo/<?php print $row['product_thumbnail']; ?>" alt="">
                              <div class="d-flex align-items-leftjustify-content-between">
                                <h5 style="text-align: left;"><?php print $row['product_name']; ?></h5>
                              </div>
                              <p><?php print $row['product_description']; ?></p>
                              <h3><?php print $base_currency; ?><?php print $row['product_price']; ?></h3>

                              <ul class="rating">

                              </ul>
                              <center>
                                <a href="subscribe-to-package?pack-id=<?php print $row['product_id']; ?>"> <button class="btn btn-warning">Subscribe</button></a>
                              </center>

                            </div>
                          </div>
                        </div>
                      </div>
                  <?php $c++;
                    }
                  }  ?>

                </div>

              </div>
            </div>

          </div>
        </div>

        <?php require_once('footer.php'); ?>
</body>

</html>