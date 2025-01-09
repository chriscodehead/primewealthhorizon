<?php
require_once('include.php');
$title = 'User Dashboard'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php');
if (isset($_GET['pack-id']) && !empty($_GET['pack-id'])) {
 $productId = $_GET['pack-id'];
} else {
 header('Location:./');
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
           <h5>Subscribe to <?php print $row['product_name']; ?></h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Product Name</h6>
               <input type="text"
                placeholder="Product Name">
              </div>
             </div>
             <div class="col-12">
              <div class="service-item">
               <input class="custom-checkbox" id="category9" type="radio" name="text">
               <label for="category9">Active</label>
              </div>
             </div>
             <div class="col-12">
              <div class="service-item">
               <input class="custom-checkbox" id="category10" type="radio" name="text">
               <label for="category10">Inactive</label>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Product Type</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option disabled>Static Menu</option>
                <option>Simple</option>
                <option>Classified</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Category</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option disabled>Category Menu</option>
                <option>Electronics</option>
                <option>TV & Appliances</option>
                <option>Home & Furniture</option>
                <option>Another</option>
                <option>Baby & Kids</option>
                <option>Health, Beauty & Perfumes</option>
                <option>Uncategorized</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Subcategory</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option disabled>Subcategory Menu</option>
                <option>Ethnic Wear</option>
                <option>Ethnic Bottoms</option>
                <option>Women Western Wear</option>
                <option>Sandels</option>
                <option>Shoes</option>
                <option>Beauty & Grooming</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Brand</h6>
               <select class="js-example-basic-single w-100">
                <option disabled>Brand Menu</option>
                <option value="puma">Puma</option>
                <option value="hrx">HRX</option>
                <option value="roadster">Roadster</option>
                <option value="zara">Zara</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Unit</h6>
               <select class="js-example-basic-single w-100">
                <option disabled>Unit Menu</option>
                <option>Kilogram</option>
                <option>Pieces</option>
               </select>
              </div>
             </div>
             <div class="col-12">
              <div class="input-box">
               <h6>Tags</h6>
               <input type="text"
                placeholder="Type tag & hit enter">
              </div>
             </div>
             <div class="col-12">
              <div class="input-box">
               <div class="icon-state">
                <label class="switch-xsm mb-0">
                 <input type="checkbox" id="flexSwitchCheckDefault-1" checked=""><span class="slider round"></span>
                </label>
                <label class="form-check-label" for="flexSwitchCheckDefault-1">Refundable</label>
               </div>
              </div>
             </div>
             <div class="col-12">
              <div class="input-box">
               <div class="icon-state">
                <label class="switch-xsm mb-0">
                 <input type="checkbox" id="flexSwitchCheckDefault-2" checked=""><span class="slider round"></span>
                </label>
                <label class="form-check-label" for="flexSwitchCheckDefault-2">Exchangeable</label>
               </div>
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
               <div id="editor"></div>
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
           <h5>Product Images</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Images</h6>
               <input type="file"
                id="formFile" multiple>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Thumbnail Image</h6>
               <input type="file"
                id="formFile1" multiple>
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
           <h5>Product Videos</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Video Provider</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option>Video</option>
                <option>Youtube</option>
                <option>Dailymotion</option>
                <option>Vimeo</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Video Link</h6>
               <input type="text"
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
           <h5>Product variations</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Option Name</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option>Color</option>
                <option>Size</option>
                <option>Material</option>
                <option>Style</option>
               </select>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Option Value</h6>
               <input type="text" class="px-0"
                placeholder="Type tag & hit enter"
                data-role="tagsinput">
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
           <h5>Shipping</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Weight (kg)</h6>
               <input type="number" placeholder="Weight">
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Dimensions (cm)</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option>Length</option>
                <option>Width</option>
                <option>Height</option>
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
           <h5>Product Price</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>price</h6>
               <input type="number" placeholder="0">
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Compare at price</h6>
               <input type="number" placeholder="0">
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
           <h5>Product Inventory</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>SKU</h6>
               <input type="text">
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Stock Status</h6>
               <select class="js-example-basic-single w-100" name="state">
                <option>In Stock</option>
                <option>Out Of Stock</option>
                <option>On Backorder</option>
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
           <h5>Link Products</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Upsells</h6>
               <input type="text" name="text">
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Cross-Sells</h6>
               <input type="text" name="text">
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
           <h5>Search engine listing</h5>
          </div>
          <div class="card-body">
           <div class="input-items">
            <div class="row gy-3">
             <div class="col-12">
              <div class="input-box">
               <div class="seo-view">
                <span class="link">https://zomo.com</span>
                <h5>Online Order From Neardy Restaurant</h5>
                <p>Find then best restaurants, cafes and bars on zomo,
                 view menus , photos, rating and user reviews for top restaursnts.
                </p>
               </div>
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>Page title</h6>
               <input type="search"
                placeholder="Fresh Fruits">
              </div>
             </div>
             <div class="col-xl-6">
              <div class="input-box">
               <h6>URL handle</h6>
               <input type="search"
                placeholder="https://themes.pixelstrap.net/zomo/index.html">
              </div>
             </div>
             <div class="col-12">
              <a href="#" class="btn restaurant-button">Save</a>
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
    <!-- New Product Add End -->

    <?php require_once('footer.php'); ?>
</body>

</html>