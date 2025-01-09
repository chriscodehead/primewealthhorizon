<?php
require_once('include.php');
$title = 'Dashboard | Edit Pack';
$bassic->checkLogedINAdmin('login'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php');
$msg = '';
if (isset($_GET['product-id']) && !empty($_GET['product-id'])) {
 $productId = $_GET['product-id'];
} else {
 header('Location:products');
}

if (isset($_POST['sub'])) {

 $product_name = $_POST['product_name'];
 $product_category = $_POST['product_category'];
 $product_description = $_POST['editor_content'];
 $product_video = $_POST['product_video'];
 $product_price = $_POST['product_price'];
 $product_old_price = $_POST['product_old_price'];
 $product_commision = $_POST['product_commision'];
 $product_status = $_POST['product_status'];
 $product_features = '';

 $pic_name  = $_FILES['product_thumbnail']['name'];
 $pic_tmp = $_FILES['product_thumbnail']['tmp_name'];
 $pic_size = $_FILES['product_thumbnail']['size'];

 $pic_name1  = $_FILES['product_image']['name'];
 $pic_tmp1 = $_FILES['product_image']['tmp_name'];
 $pic_size1 = $_FILES['product_image']['size'];

 $url_info = str_replace(' ', '-', $product_name);
 $theurl = preg_replace('/[^A-Za-z0-9\-]/', '', $url_info);
 $product_slug = $theurl . '-' . $bassic->randGenerator();
 $product_id = $bassic->randGenerator();

 if (!empty($product_name) && !empty($product_category) && !empty($product_description) && !empty($product_price)) {

  $gen_Num = $bassic->randGenerator();
  $extension_Name = $bassic->extentionName($pic_name);
  $new_name = $gen_Num . uniqid() . $extension_Name;
  $path = '../../photo/' . $new_name;
  $picvalidation = $bassic->picVlidator($pic_name, $pic_size);
  $passportIn = $cal->selectFrmDB($starter_pack_tb, 'product_thumbnail', 'product_id', $productId);

  $gen_Num1 = $bassic->randGenerator();
  $extension_Name1 = $bassic->extentionName($pic_name1);
  $new_name1 = $gen_Num . uniqid() . $extension_Name1;
  $path1 = '../../photo/' . $new_name1;
  $picvalidation1 = $bassic->picVlidator($pic_name1, $pic_size1);
  $passportIn1 = $cal->selectFrmDB($starter_pack_tb, 'product_image', 'product_id', $productId);

  if (!empty($pic_name) && !empty($pic_name1)) {
   if (empty($picvalidation)) {
    if ($passportIn == 'avatar.png') {
    } else {
     $bassic->unlinkFile($passportIn, '../../photo/');
    }
    if ($passportIn1 == 'avatar.png') {
    } else {
     $bassic->unlinkFile($passportIn1, '../../photo/');
    }
    $upl = $bassic->uploadImage($pic_tmp, $path);
    $upl2 = $bassic->uploadImage($pic_tmp1, $path1);

    if (empty($upl)) {
     $fieldup = array("product_slug", "category_id", "product_name", "product_price", "product_old_price", "product_commision", "product_thumbnail", "product_image", "product_description", "product_features", "product_video", "product_status", "last_updated");
     $valueup = array($product_slug, $product_category, $product_name, $product_price, $product_old_price, $product_commision, $new_name, $new_name1, $product_description, $product_features, $product_video, $product_status, $bassic->getDate());
     $update = $cal->update($starter_pack_tb, $fieldup, $valueup, 'product_id', $productId);
     if (!empty($update)) {
      $msg = $update;
     } else {
      $msg = 'An error occured!';
     }
    } else {
     $msg =  $upl;
    }
   } else {
    $msg =  $picvalidation;
   }
  } else {
   $fieldup = array("product_slug", "category_id", "product_name", "product_price", "product_old_price", "product_commision", "product_description", "product_features", "product_video", "product_status", "last_updated");
   $valueup = array($product_slug, $product_category, $product_name, $product_price, $product_old_price, $product_commision, $product_description, $product_features, $product_video, $product_status, $bassic->getDate());
   $update = $cal->update($starter_pack_tb, $fieldup, $valueup, 'product_id', $productId);
   if (!empty($update)) {
    $msg = $update;
   } else {
    $msg = 'An error occured!';
   }
  }
 } else {
  $msg = 'Please fill all fields';
 }
}

$sql = query_sql("SELECT * FROM $starter_pack_tb WHERE `product_id`='" . $productId . "' ORDER by id LIMIT 1");
$row = mysqli_fetch_assoc($sql);
?>

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
      <div class="col-12">
       <form method="post" enctype="multipart/form-data">
        <div class="row">
         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Packk Information</h5>
           </div>
           <?php if (!empty($msg)) { ?>
            <div id="go" class=" col-lg-12">
             <div id="go" class="alert alert-warning" style="text-align: center; color:dark;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
            </div>
           <?php } ?>
           <div class="card-body">
            <div class="input-items">

             <div class="row gy-3">

              <div class="col-xl-6">
               <div class="input-box">
                <h6>Pack Name</h6>
                <input name="product_name" value="<?php print $row['product_name']; ?>" type="text"
                 placeholder="Pack Name">
               </div>
              </div>

              <div class="col-xl-6">
               <div class="input-box">
                <h6>Category</h6>
                <?php $cat = $row['category_id']; ?>
                <select class="js-example-basic-single w-100" name="product_category">
                 <option selected disabled value="">Select Category</option>

                 <?php
                 $sql = query_sql("SELECT * FROM $category_tb ORDER BY id DESC");
                 $i = 1;
                 if (mysqli_num_rows($sql) > 0) {
                  while ($rowc = mysqli_fetch_assoc($sql)) { ?>
                   <option <?php if ($cat == $rowc['category_id']) print 'selected'; ?> value="<?php print $rowc['category_id']; ?>"><?php print $rowc['category_name']; ?></option>
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

         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Description</h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">
              <div class="col-12">
               <div class="input-box">
                <textarea name="editor_content" id="editor"><?php print htmlspecialchars($row['product_description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                <script>
                 CKEDITOR.replace('editor');
                </script>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>

         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Pack Images (Note: Ensure to select both images to enable update)</h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">
              <div class="col-xl-6">
               <div class="input-box">
                <h6>Images</h6>
                <input name="product_image" type="file"
                 id="formFile" multiple>
                <img style="width: 80px;" src="../../photo/<?php print $row['product_image']; ?>" class="img-fluid" alt="">
               </div>
              </div>

              <div class="col-xl-6">
               <div class="input-box">
                <h6>Thumbnail Image</h6>
                <input name="product_thumbnail" type="file"
                 id="formFile1" multiple>
                <img style="width: 80px;" src="../../photo/<?php print $row['product_thumbnail']; ?>" class="img-fluid" alt="">
               </div>
              </div>

             </div>
            </div>
           </div>
          </div>
         </div>

         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Pack Videos</h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">
              <div class="col-xl-6">
               <div class="input-box">
                <h6>Video Provider</h6>
                <select class="js-example-basic-single w-100" name="state">
                 <option>Youtube</option>
                </select>
               </div>
              </div>
              <div class="col-xl-6">
               <div class="input-box">
                <h6>Video Link</h6>
                <input name="product_video" value="<?php print $row['product_video']; ?>" type="text"
                 placeholder="Video Link">
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>

         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Pack Price</h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">
              <div class="col-xl-6">
               <div class="input-box">
                <h6>price(<?php print $base_currency; ?>)</h6>
                <input name="product_price" value="<?php print $row['product_price']; ?>" type="number" placeholder="0">
               </div>
              </div>
              <div class="col-xl-6">
               <div class="input-box">
                <h6>Compare at price(<?php print $base_currency; ?>)</h6>
                <input name="product_old_price" value="<?php print $row['product_old_price']; ?>" type="number" placeholder="0">
               </div>
              </div>
              <div style="display: none;" class="col-xl-4">
               <div class="input-box">
                <h6>Affiliate Commision(%)</h6>
                <input name="product_commision" value="<?php print $row['product_commision']; ?>" type="number" placeholder="0">
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>

         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Pack Inventory</h5>
           </div>
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">

              <div class="col-xl-12">
               <div class="input-box">
                <h6>Stock Status</h6>
                <select class="js-example-basic-single w-100" name="product_status">
                 <option <?php if ($row['product_status'] == 1) {
                          print 'selected';
                         } ?> value="1">In Stock</option>
                 <option <?php if ($row['product_status'] == 0) {
                          print 'selected';
                         } ?> value="0">Out Of Stock</option>
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
            <div class="input-items">
             <div class="row gy-3">

              <div class="col-12">
               <button name="sub" class="btn restaurant-button">Save</button>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>

        </div>
       </form>
      </div>
     </div>
    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>