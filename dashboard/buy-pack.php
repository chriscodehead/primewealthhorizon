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

$sql = query_sql("SELECT * FROM $starter_pack_tb WHERE `product_id`='" . $productId . "' ORDER by id LIMIT 1");
$row = mysqli_fetch_assoc($sql);

if (isset($_POST['sub'])) {
 $payment_id = $bassic->randGenerator();
 $email = $sqli->getEmail($_SESSION['user_code']);
 $amount = $row['product_price'];

 $pic_name  = $_FILES['payment_proof']['name'];
 $pic_tmp = $_FILES['payment_proof']['tmp_name'];
 $pic_size = $_FILES['payment_proof']['size'];

 $status = 0;
 $type = $row['product_name'];
 $date_pay = $bassic->getDate();
 $currency = $base_currency;
 $items = '';
 if (empty($_SESSION['miira_cell'])) {
 } else {
  $items .= 'Miira Cell+: ' . $_SESSION['miira_cell'];
 }

 if (empty($_SESSION['miira_curve'])) {
 } else {
  $items .= ' | Miira_Curve:' . $_SESSION['miira_curve'];
 }

 if (empty($_SESSION['miira_tiara'])) {
 } else {
  $items .= ' | Miira Tiara: ' . $_SESSION['miira_tiara'];
 }

 if (empty($_SESSION['miira_phyll'])) {
 } else {
  $items .= ' | Miira Phyll: ' . $_SESSION['miira_phyll'];
 }

 if (empty($_SESSION['miira_coffee'])) {
 } else {
  $items .= ' | Miira Coffee: ' . $_SESSION['miira_coffee'];
 }

 if (!empty($amount) && !empty($pic_name)) {

  $gen_Num = $bassic->randGenerator();
  $extension_Name = $bassic->extentionName($pic_name);
  $new_name = $gen_Num . uniqid() . $extension_Name;
  $path = '../photo/' . $new_name;
  $picvalidation = $bassic->picVlidator($pic_name, $pic_size);



  if (empty($picvalidation)) {
   $upl = $bassic->uploadImage($pic_tmp, $path);

   if (empty($upl)) {

    $fieldup = array('id', 'payment_id', 'email', 'amount', 'payment_proof', 'status', 'date_pay', 'type', 'items', 'currency');
    $valueup = array(null, $payment_id, $email, $amount, $new_name, $status, $date_pay, $type, $items, $currency);
    if ($cal->insertDataB($top_up, $fieldup, $valueup)) {

     $name = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'first_name') . ' ' . $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'last_name');

     header("location:transactions");
    } else {
     $msg =  $upl;
    }
   } else {
    $msg =  $picvalidation;
   }
  } else {
   $msg = 'Unexpected error occured!';
  }
 } else {
  $msg = 'Fill all necessary fields!';
 }
}

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
         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Pack: <?php print $row['product_name']; ?></h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">

              <?php if (!empty($_SESSION['miira_cell'])) { ?>
               <div class="col-3">
                <label>Miira Cell+</label>
                <input readonly value="<?php print $_SESSION['miira_cell']; ?>" type="number" />
               </div>
              <?php } ?>

              <?php if (!empty($_SESSION['miira_curve'])) { ?>
               <div class="col-3">
                <label>Miira Curve</label>
                <input readonly value="<?php print $_SESSION['miira_curve']; ?>" type="number" />
               </div>
              <?php } ?>

              <?php if (!empty($_SESSION['miira_tiara'])) { ?>
               <div class="col-3">
                <label>Miira Tiara</label>
                <input readonly value="<?php print $_SESSION['miira_tiara']; ?>" type="number" />
               </div>
              <?php } ?>

              <?php if (!empty($_SESSION['miira_phyll'])) { ?>
               <div class="col-3">
                <label>Miira Phyll</label>
                <input readonly value="<?php print $_SESSION['miira_phyll']; ?>" type="number" />
               </div>
              <?php } ?>

              <?php if (!empty($_SESSION['miira_coffee'])) { ?>
               <div class="col-3">
                <label>Miira Coffee</label>
                <input readonly value="<?php print $_SESSION['miira_coffee']; ?>" type="number" />
               </div>
              <?php } ?>

             </div>
            </div>
           </div>
          </div>
         </div>

        </div>
       </div>

       <?php if (isset($_SESSION['payment_method']) && !empty($_SESSION['payment_method']) && $_SESSION['payment_method'] == 'Manual') { ?>
        <div class="col-12">
         <div class="row">
          <div class="col-12">
           <div class="card">
            <div class="card-header">
             <h5>Send payments to infomation below (<?php print $_SESSION['payment_method']; ?> Payments)</h5>
            </div>
            <div class="card-body">
             <div class="input-items">
              <div class="row gy-3">
               <?php
               $sql = query_sql("SELECT * FROM $payment_account WHERE `show`='yes' ORDER BY id DESC");
               $i = 1;
               if (mysqli_num_rows($sql) > 0) {
                while ($row = mysqli_fetch_assoc($sql)) { ?>
                 <div class="col-6">
                  <div class="input-box">
                   <div class="seo-view">
                    <span class="link">Account Name: <em class="text-success"><?php print $row['name']; ?></em></span><br />

                    <span class="link">Account Number: <em class="text-success"><?php print $row['number']; ?></em></span><br />

                    <span class="link">Bank Name: <em class="text-success"><?php print $row['bank']; ?></em></span><br />

                    <span class="link">Type: <em class="text-success"><?php print $row['type']; ?></em></span><br />

                    <span class="link">Routing Number: <em class="text-success"><?php print $row['routing']; ?></em></span>
                    <p></p>
                   </div>
                  </div>
                 </div>
               <?php }
               } ?>

               <div class="col-6">
                <div class="input-box">
                 <div class="seo-view">
                  <a onClick="performClick('theFile');" id="point">
                   <div class="dropzone-wrapper" id="clik">
                    <i class="icon-cloud-up fa-3x"></i>
                    <h6>Upload Proof of Payment.</h6>
                    <p></p>
                   </div>
                  </a>
                  <input style="display: none;" class="hidden cropper-source" id="theFile" type="file" name="payment_proof" />
                 </div>
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
                <button name="sub" type="submit" class="btn restaurant-button">Complete Payment</button>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>

         </div>
        </div>
       <?php } ?>

       <?php if (isset($_SESSION['payment_method']) && !empty($_SESSION['payment_method']) && $_SESSION['payment_method'] == 'Instant') { ?>
        <div class="col-12">
         <div class="row">
          <div class="col-12">
           <div class="card">
            <div class="card-header">
             <h5>Send payments to infomation below (<?php print $_SESSION['payment_method']; ?> Payments)</h5>
            </div>
            <div class="card-body">
             <div class="input-items">
              <div class="row gy-3">

               <div class="col-12">
                <div class="input-box">
                 <div class="seo-view">
                  <img width="100%" src="../img/payment-methods-epicerie-ludo.png" />
                  <p></p>
                 </div>
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
                <button name="sub" type="submit" class="btn restaurant-button">Check Out</button>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>

         </div>
        </div>
       <?php } ?>

      </div>
     </div>
    </form>
    <?php require_once('footer.php'); ?>
    <script>
     $('#clik').css("cursor", "pointer");
    </script>
</body>

</html>