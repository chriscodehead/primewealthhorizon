<?php
require_once('include.php');
$title = 'Dashboard | Edit Admin';
$bassic->checkLogedINAdmin('login');
if (isset($_GET['adminId']) && !empty($_GET['adminId'])) {
 $adminId = $_GET['adminId'];
} else {
 header('Location:add-new-admin');
}

$msg = '';
$block = '';
if (isset($_POST['sub'])) {
 $name = mysqli_real_escape_string($link, $_POST['name']);
 $password = mysqli_real_escape_string($link, $_POST['password']);
 $role = mysqli_real_escape_string($link, $_POST['role']);
 if (!empty($name) && !empty($role)) {
  if (!empty($password)) {
   $passh = $bassic->passwordHash($agorithm, $password);
   $fields = array('password', 'name', 'role');
   $values = array($passh, $name, $role);
   $msg = $cal->update($admin_tb, $fields, $values, 'id', $adminId);
  } else {

   $fields = array('name', 'role');
   $values = array($name, $role);
   $msg = $cal->update($admin_tb, $fields, $values, 'id', $adminId);
  }
 } else {
  $msg = 'Please fill all fields';
 }
}

$sql = query_sql("SELECT * FROM $admin_tb WHERE `id`='" . $adminId . "' ORDER by id LIMIT 1");
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

        <form enctype="multipart/form-data" method="post">
         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h5>Add New Admin</h5>
           </div>
           <div class="card-body">
            <div class="row">

             <?php if (!empty($msg)) { ?>
              <div id="go" class=" col-lg-12">
               <div id="go" class="alert alert-warning" style="text-align: center; color:dark;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
              </div>
             <?php } ?>

             <div class="col-12">
              <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                <div class="input-items">
                 <div class="row gy-3">

                  <div class="col-6">
                   <div class="input-box">
                    <h6>Admin Name<span class="text-danger">*</span></h6>
                    <input id="name" value="<?php print $row['name']; ?>" required name="name" placeholder="Enter Admin Name" type="text">
                   </div>
                  </div>

                  <div class="col-6">
                   <div class="input-box">
                    <h6>Admin Email<span class="text-danger">*</span></h6>
                    <input disabled id="email" value="<?php print $row['email']; ?>" name="email" placeholder="Enter Admin Email" type="email">
                   </div>
                  </div>

                  <div class="col-6">
                   <div class="input-box">
                    <h6>Password</h6>
                    <input id="password" value="" name="password" placeholder="Enter Admin Password" type="password">
                   </div>
                  </div>

                  <div class="col-6">
                   <div class="input-box">
                    <h6>Admin Role<span class="text-danger">*</span></h6>
                    <?php $role = $row['role']; ?>
                    <select class="js-example-basic-single w-100" name="role" id="role">
                     <option selected="selected" value="">Select Admin Role</option>
                     <option <?php if ($role == 'admin1') echo 'selected="selected"'; ?> value="admin1">Admin1</option>
                     <option <?php if ($role == 'admin2') echo 'selected="selected"'; ?> value="admin2">Admin2</option>
                     <option <?php if ($role == 'admin3') echo 'selected="selected"'; ?> value="admin3">Admin3</option>
                    </select>
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
         </div>

         <div style="padding-bottom: 100px;" class="col-12">
          <div class="">
           <div class="">
            <div class="">
             <div class="row gy-3">

              <div class="col-12">
               <button type="submit" name="sub" class="btn restaurant-button">Save</button>
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
    </div>

    <?php require_once('footer.php'); ?>
</body>

</html>