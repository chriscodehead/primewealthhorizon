<?php
require_once('include.php');
$title = 'Buy Pack | Dashboard'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php');
$msg = '';
if (isset($_GET['pack-id']) && !empty($_GET['pack-id'])) {
  $productId = $_GET['pack-id'];
} else {
  header('Location:./');
}

if (isset($_POST['sub'])) {
  $miira_cell = mysqli_real_escape_string($link, $_POST['miira_cell']);
  $miira_curve = mysqli_real_escape_string($link, $_POST['miira_curve']);
  $miira_tiara = mysqli_real_escape_string($link, $_POST['miira_tiara']);
  $miira_phyll = mysqli_real_escape_string($link, $_POST['miira_phyll']);
  $Miira_Coffee = mysqli_real_escape_string($link, $_POST['Miira_Coffee']);
  $payment_method = mysqli_real_escape_string($link, $_POST['payment_method']);
  if (empty($miira_cell) && empty($miira_curve) && empty($miira_tiara) && empty($miira_phyll) && empty($Miira_Coffee)) {
    $msg = "Please select at least one product.";
  } else {
    $_SESSION['miira_cell'] = $miira_cell;
    $_SESSION['miira_curve'] = $miira_curve;
    $_SESSION['miira_tiara'] = $miira_tiara;
    $_SESSION['miira_phyll'] = $miira_phyll;
    $_SESSION['miira_coffee'] = $Miira_Coffee;
    $_SESSION['payment_method'] = $payment_method;
    $_SESSION['pack_id'] = $productId;
    header("location: buy-pack?pack-id=" . $productId);
  }
}

$sql = query_sql("SELECT * FROM $starter_pack_tb WHERE `product_id`='" . $productId . "' ORDER by id LIMIT 1");
$row = mysqli_fetch_assoc($sql);

$products = array('Miira-Cell+', 'Miira-Curve', 'Miira-Tiara', 'Miira-Phyll', 'Miira-Coffee');
$products_img = array('miira-cell-1-4.jpg', 'miira-curve-1-3.jpg',  'miira-tiara-general.png', 'miira-phyll-1.jpg', 'miira-coffee-2.jpg');
$product_name = array('miira_cell', 'miira_curve', 'miira_tiara', 'miira_phyll', 'miira_coffee');
?>

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
        <form enctype="multipart/form-data" method="post">
          <div class="container-fluid">
            <div class="row">
              <?php if (!empty($msg)) { ?>
                <div id="go" class=" col-lg-12">
                  <div id="go" class="alert alert-warning" style="text-align: center; color:dark;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
                </div>
              <?php } ?>
              <div class="col-12">
                <div class="row">
                  <?php if ($sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'approved_for_affiliate') == 'no') { ?>
                    <div class="col-xxl-12 col-sm-12 ">
                      <div class="card widgets-card">
                        <div class="card-body">
                          <div class="">
                            To become an affiliate, simply purchase <?php print $row['product_name']; ?> to unlock eligibility to join our dynamic team. Once verified, you'll be ready to start earning like a pro, joining countless others who are already turning their efforts into real income. Take the first step toward financial success today!
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5>Subscribe to <?php print $row['product_name']; ?>: <?php print $base_currency; ?><?php print $row['product_price']; ?></h5>
                        <h3 class="text-success">(Select <?php print $row['product_quantity']; ?> Pack from below.)</h3>
                      </div>
                      <div class="card-body">
                        <div class="input-items">
                          <div class="row gy-3">
                            <input id="packageSelect" value="<?php print $row['product_quantity']; ?>" type="hidden" />

                            <?php for ($i = 0; $i < count($products); $i++) { ?>
                              <div class="col-xl-4">
                                <div class="input-box">
                                  <h3><?php print $products[$i]; ?> Affiliate Pack</h3><br>
                                  <img src="../img/<?php print $products_img[$i]; ?>" style="width: 100%;" />
                                  <br /><br />
                                  <input name="<?php print $product_name[$i]; ?>" class="productField" style="width: 100%;" type="number" placeholder="Quantity" id="numberInput<?php print $i; ?>" oninput="validateQuantity('<?php print $i; ?>')">
                                </div>
                              </div>

                            <?php } ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5>Select Payment Method</h5>
                      </div>
                      <div class="card-body">
                        <div class="input-items">
                          <div class="row gy-3">
                            <div class="col-xl-12">
                              <div class="input-box">
                                <select class="js-example-basic-single w-100" name="payment_method">
                                  <?php
                                  $sql = query_sql("SELECT * FROM $payment_method WHERE `status`=1 ORDER BY id ASC");
                                  $i = 1;
                                  if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_assoc($sql)) { ?>
                                      <option value="<?php print $row['type']; ?>"><?php print $row['type']; ?></option>
                                  <?php }
                                  } ?>

                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="padding-bottom: 100px;" class="col-12">
                    <div class="">
                      <div class="">
                        <div class="">
                          <div class="row gy-3">

                            <div class="col-12">
                              <button name="sub" type="submit" class="btn restaurant-button">Continue to Payment</button>
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
        </form>
        <?php require_once('footer.php'); ?>
        <script>
          function validateQuantity(id) {
            const inputField = document.getElementById('numberInput' + id);
            inputField.value = inputField.value.replace(/[^0-9]/g, '');
            if (inputField.value < 0) {
              inputField.value = '';
            }

            const packageSelect = document.getElementById("packageSelect");
            const allowedQuantity = parseInt(packageSelect.value);

            const productFields = document.querySelectorAll(".productField");

            let totalQuantity = 0;
            productFields.forEach(field => {
              const value = parseInt(field.value) || 0;
              totalQuantity += value;
            });

            if (totalQuantity > allowedQuantity) {
              var msg = `You can only select ${allowedQuantity} product(s) for the selected package.`;
              alert(msg);
              event.target.value = '';
            } else {

            }
          }
        </script>
</body>

</html>