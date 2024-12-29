<?php
require_once('include.php');
$title = 'Dashboard | Edit Category';
$bassic->checkLogedINAdmin('login');
$msg = '';

if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
 $category_id = $_GET['cat_id'];
} else {
 header('Location:category');
}
if (isset($_POST['sub'])) {
 $category_name = $_POST['name'];
 $category_description = $_POST['message'];
 $category_status = $_POST['publisher'];
 $pic_name  = $_FILES['theFile']['name'];
 $pic_tmp = $_FILES['theFile']['tmp_name'];
 $pic_size = $_FILES['theFile']['size'];
 $passportIn = $cal->selectFrmDB($category_tb, 'category_image', 'category_id', $category_id);

 if (!empty($category_name)) {
  $gen_Num = $bassic->randGenerator();
  $extension_Name = $bassic->extentionName($pic_name);
  $new_name = $gen_Num . uniqid() . $extension_Name;
  $path = '../../photo/' . $new_name;
  $picvalidation = $bassic->picVlidator($pic_name, $pic_size);

  if (!empty($pic_name)) {
   if (empty($picvalidation)) {
    if ($passportIn == 'avatar.png') {
    } else {
     $bassic->unlinkFile($passportIn, '../../photo/');
    }
    $upl = $bassic->uploadImage($pic_tmp, $path);
    if (empty($upl)) {
     $fieldup = array("category_name", "category_image", "category_status", "category_description", "last_updated");
     $valueup = array($category_name, $new_name, $category_status, $category_description, $bassic->getDate());
     $update = $cal->update($category_tb, $fieldup, $valueup, 'category_id', $category_id);
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
   $fieldup = array("category_name", "category_status", "category_description", "last_updated");
   $valueup = array($category_name, $category_status, $category_description, $bassic->getDate());
   $update = $cal->update($category_tb, $fieldup, $valueup, 'category_id', $category_id);
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

$sql = query_sql("SELECT * FROM $category_tb WHERE `category_id`='" . $category_id . "'");
$row = mysqli_fetch_assoc($sql);
?>
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
      <div class="col-12">
       <div class="row">
        <div class="col-12">
         <div class="card">
          <div class="card-header">
           <h5>Category Information</h5>
          </div>

          <form method="post" enctype="multipart/form-data">
           <div class="card-body">
            <div class="input-items">
             <div class="row gy-3">

              <?php if (!empty($msg)) { ?>
               <div id="go" class=" col-lg-12">
                <div id="go" class="alert alert-warning" style="text-align: center; color:dark;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
               </div>
              <?php } ?>

              <div class="col-12">
               <div class="input-box">
                <h6>Name</h6>
                <input type="text" name="name" value="<?php print $row['category_name']; ?>" placeholder="Enter Your Name">
               </div>
              </div>

              <div class="col-12">
               <div class="input-box">
                <h6>Category Image</h6>
                <a onClick="performClick('theFile');" id="point">
                 <div class="dropzone-wrapper" id="clik">
                  <div class="dz-message needsclick" style="padding: 10px 16px;
border: 1px dashed #dedbdb; width: 100%; border-radius: 4px; background-color: white;">
                   <div>
                    <i class="icon-cloud-up" style="font-size: 40px;"></i>
                    <h6>Select file here or click to upload.</h6>
                    <img style="width: 80px;" src="../../photo/<?php print $row['category_image']; ?>" class="img-fluid" alt="">
                   </div>
                  </div>
                 </div>
                </a>
                <input style="display: none;" class="hidden cropper-source" id="theFile" type="file" name="theFile" />
               </div>
              </div>

              <div class="col-12">
               <div class="input-box">
                <h6>Description</h6>
                <textarea name="message" rows="4"><?php print $row['category_description']; ?></textarea>
               </div>
              </div>


              <div class="col-12">
               <div class="input-box d-flex align-items-center gap-2">
                <input value="1" <?php if ($row['category_status'] == 1) {
                                  print 'checked';
                                 } ?> name="publisher" class="custom-checkbox" type="radio" id="c-1">
                <label for="c-1" class="mb-0">Publish</label>
               </div>
              </div>

              <div class="col-12">
               <div class="input-box d-flex align-items-center gap-2">
                <input value="0" <?php if ($row['category_status'] == 0) {
                                  print 'checked';
                                 } ?> name="publisher" class="custom-checkbox" type="radio" id="c-2">
                <label for="c-2" class="mb-0">Add to draft</label>
               </div>
              </div>

              <div class="col-12">
               <button type="submit" name="sub" class="btn restaurant-button">Save</button>
              </div>

             </div>
            </div>
           </div>
          </form>

         </div>
        </div>
       </div>
      </div>
     </div>
    </div>

    <?php require_once('footer.php'); ?>
    <script>
     $('#clik').css("cursor", "pointer");
    </script>
</body>

</html>