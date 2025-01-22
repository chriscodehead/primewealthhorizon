<?php
require_once('include.php');
$title = 'Dashboard | Starter Pack';
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
         <div class="title-header option-title d-sm-flex d-block">
          <h5>Pack List</h5>
          <div class="right-options">
           <ul>
            <li>
             <a class="btn btn-dashed" href="add-new-starter-pack">Add New Pack</a>
            </li>
           </ul>
          </div>
         </div>
         <div>
          <div class="table-responsive theme-scrollbar">
           <table class="table category-table dataTable no-footer" id="table_id">
            <thead>
             <tr>
              <th><input id="checkall" class="custom-checkbox" type="checkbox" name="text"></th>
              <th>Pack Image</th>
              <th>Pack Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
              <th style="display: none;">Affiliate Commision</th>
              <th>Status</th>
              <th>Option</th>
             </tr>
            </thead>

            <tbody>
             <?php $sql = query_sql("SELECT * FROM $starter_pack_tb  ORDER BY id ASC");
             if (mysqli_num_rows($sql) > 0) {
              $c = 0;
              while ($row = mysqli_fetch_assoc($sql)) { ?>
               <tr>
                <td><input class="custom-checkbox" type="checkbox" name="text"></td>
                <td>
                 <div class="table-image">
                  <img src="../../photo/<?php print $row['product_thumbnail']; ?>" class="img-fluid"
                   alt="">
                 </div>
                </td>

                <td><?php print $row['product_name']; ?></td>

                <td><?php print $sqli->getCategoryTable($row['category_id'], 'category_name'); ?></td>

                <td class="f-w-500"><?php print $base_currency; ?><?php print $row['product_price']; ?></td>

                <td class="td-price">
                 <?php print $row['product_quantity']; ?>
                </td>

                <td style="display: none;" class="td-price">
                 <?php print $row['product_commision']; ?>%
                </td>

                <td class="status-danger">
                 <span><?php if ($row['product_status'] == 1) {
                        print 'In Stock';
                       } else {
                        print 'Out Of Stock';
                       } ?></span>
                </td>

                <td>
                 <ul>
                  <li>
                   <a href="edit-pack?pack-id=<?php print $row['product_id']; ?>">
                    <i class="ri-pencil-line"></i>
                   </a>
                  </li>

                  <li>
                   <a href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#exampleModalToggle<?php print $row['product_id']; ?>">
                    <i class="ri-delete-bin-line"></i>
                   </a>
                  </li>
                 </ul>
                </td>
               </tr>

               <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle<?php print $row['product_id']; ?>" aria-hidden="true" tabindex="-1">
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
                    <p>You are about to delete this product. Once this action is executed, it cannot be undone.</p>
                   </div>
                  </div>
                  <div class="modal-footer">
                   <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                   <!--data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" -->
                   <button type="button" onclick="deletePack('<?php print $row['product_id']; ?>')" id="delProduct" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Yes <i id="spin" class=""></i></button>
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
     function deletePack(p_id) {
      var hr = new XMLHttpRequest();
      var url = "ajax-call.php?action=deletePack";
      var productId = p_id;
      var vars = "productId=" + productId;
      $('i#spin').attr("class", "fa fa-spinner fa-spin");

      if (productId == "") {

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
    </script>

</body>

</html>