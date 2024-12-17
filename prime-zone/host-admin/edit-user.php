<?php
require_once('include.php');
$title = 'Dashboard | Add User';
$bassic->checkLogedINAdmin('login');
$msg = '';
if (isset($_GET['userId']) && !empty($_GET['userId'])) {
        $userId = $_GET['userId'];
} else {
        header('Location:add-new-user');
}

if (isset($_POST['sub'])) {
        $fname = mysqli_real_escape_string($link, $_POST['fname']);
        $lname = mysqli_real_escape_string($link, $_POST['lname']);
        $fullname = $fname . ' ' . $lname;
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $pass = mysqli_real_escape_string($link, $_POST['pass']);
        $cpass = mysqli_real_escape_string($link, $_POST['cpass']);
        $user_code = $bassic->randGenerator();
        $date_created = $bassic->getDate();
        $rawpass = $pass;
        $two_factor_code = $bassic->picker();
        $forget_password_code = uniqid();
        $passh = $bassic->passwordHash($agorithm, $pass);
        $hashed_pot = $bassic->passwordHash($agorithm, $email);
        $username = strtoupper($bassic->picker() . uniqid());

        $bank_routing_number = mysqli_real_escape_string($link, $_POST['bank_routing_number']);
        $bank_name = mysqli_real_escape_string($link, $_POST['bank_name']);
        $account_number = mysqli_real_escape_string($link, $_POST['account_number']);
        $account_name = mysqli_real_escape_string($link, $_POST['account_name']);
        $id_document_status = mysqli_real_escape_string($link, $_POST['id_document_status']);
        $id_document = '';
        $id_type = mysqli_real_escape_string($link, $_POST['id_type']);
        $affilaite_url = mysqli_real_escape_string($link, $_POST['affilaite_url']);
        $twitter_url = mysqli_real_escape_string($link, $_POST['twitter_url']);
        $youtube_url = mysqli_real_escape_string($link, $_POST['youtube_url']);
        $instagram_url = mysqli_real_escape_string($link, $_POST['instagram_url']);
        $facebook_url = mysqli_real_escape_string($link, $_POST['facebook_url']);
        $linkedin_url = mysqli_real_escape_string($link, $_POST['linkedin_url']);
        $address = mysqli_real_escape_string($link, $_POST['address']);
        $country = mysqli_real_escape_string($link, $_POST['country']);
        $short_bio = mysqli_real_escape_string($link, $_POST['short_bio']);
        $sex = mysqli_real_escape_string($link, $_POST['sex']);
        $pin = mysqli_real_escape_string($link, $_POST['pin']);

        if (!empty($fname) && !empty($lname)) {

                if (!empty($pass)) {
                        if ($pass == $cpass) {
                                $feilds = array('fname', 'lname', 'phone',  'password', 'forget_password_code', 'two_factor_code', 'date_created', 'hashed_pot', 'bank_routing_number', 'bank_name', 'account_number', 'account_name', 'id_document_status', 'id_type', 'affilaite_url', 'twitter_url', 'youtube_url', 'instagram_url', 'facebook_url', 'linkedin_url', 'address', 'country', 'short_bio', 'sex', 'rawpass', 'pin');
                                $value = array($fname, $lname, $phone, $passh, $forget_password_code, $two_factor_code, $date_created, $hashed_pot, $bank_routing_number, $bank_name, $account_number, $account_name, $id_document_status, $id_type, $affilaite_url, $twitter_url, $youtube_url, $instagram_url, $facebook_url, $linkedin_url, $address, $country, $short_bio, $sex, $rawpass, $pin);
                        } else {
                                $msg = "Error! Passwords do not match.";
                        }
                } else {
                        $feilds = array('fname', 'lname', 'phone', 'forget_password_code', 'two_factor_code', 'date_created', 'hashed_pot', 'bank_routing_number', 'bank_name', 'account_number', 'account_name', 'id_document_status', 'id_type', 'affilaite_url', 'twitter_url', 'youtube_url', 'instagram_url', 'facebook_url', 'linkedin_url', 'address', 'country', 'short_bio', 'sex', 'rawpass', 'pin');
                        $value = array($fname, $lname, $phone, $forget_password_code, $two_factor_code, $date_created, $hashed_pot, $bank_routing_number, $bank_name, $account_number, $account_name, $id_document_status, $id_type, $affilaite_url, $twitter_url, $youtube_url, $instagram_url, $facebook_url, $linkedin_url, $address, $country, $short_bio, $sex, $rawpass, $pin);
                }

                $result = $cal->update($user_tb, $feilds, $value, 'user_code', $userId);
                if ($result == 'Registration was successful. Proceed to login!') {
                        $msg = 'Success! The user has been created successfully.';
                } else {
                        $msg = $result;
                }
        } else {
                $msg = "Error! Please complete all required fields.";
        }
}

$sql = query_sql("SELECT * FROM $user_tb WHERE `user_code`='" . $userId . "' ORDER by id LIMIT 1");
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
                                                                                                <h5>Add New User</h5>
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
                                                                                                                                                                <h6>First Name<span class="text-danger">*</span></h6>
                                                                                                                                                                <input type="text" name="fname" value="<?php print $row['fname']; ?>" placeholder="Enter First Name">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Last Name<span class="text-danger">*</span></h6>
                                                                                                                                                                <input type="text" value="<?php print $row['lname']; ?>" name="lname" placeholder="Enter Last Name">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Email<span class="text-danger">*</span></h6>
                                                                                                                                                                <input disabled type="email" value="<?php print $row['email']; ?>" name="email" placeholder="Enter Email">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Phone Number</h6>
                                                                                                                                                                <input type="tel" name="phone" value="<?php print $row['phone']; ?>" placeholder="Enter Phone Number">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Gender</h6>
                                                                                                                                                                <select class="js-example-basic-single w-100" name="sex">
                                                                                                                                                                        <option <?php if ($row['sex'] == 'Male') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="Male">Male</option>
                                                                                                                                                                        <option <?php if ($row['sex'] == 'Female') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="Female">Female</option>
                                                                                                                                                                </select>
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Bio</h6>
                                                                                                                                                                <textarea name="short_bio" placeholder="Tell your story"><?php print $row['short_bio']; ?></textarea>
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Contact</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Country</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['country']; ?>" name="country" placeholder="Enter Your Country">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>State</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['state']; ?>" name="state" placeholder="Enter Your State">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-12">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Address</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['address']; ?>" name="address" placeholder="Enter Your Address">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Facebook</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['facebook_url']; ?>" name="facebook_url" placeholder="Facebook Link">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Instagram</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['instagram_url']; ?>" name="instagram_url" placeholder="Instagram Link">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Youtube</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['youtube_url']; ?>" name="youtube_url" placeholder="Youtube Link">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Linkedin</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['linkedin_url']; ?>" name="linkedin_url" placeholder="Linkedin Link">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Twitter</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['twitter_url']; ?>" name="twitter_url" placeholder="Twitter Link">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Affiliate Link</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">

                                                                                                                                                <div class="col-12">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h5>Affilaite Link (eg: <?php print $siteUrl; ?>brizwealths)</h5>
                                                                                                                                                                <?php print $siteUrl; ?><input style="width: 250px;" type="text" value="<?php print $row['affilaite_url']; ?>" name="affilaite_url" placeholder="Enter store name">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Identity</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Document Type</h6>
                                                                                                                                                                <select class="js-example-basic-single w-100" name="id_type">
                                                                                                                                                                        <option <?php if ($row['id_type'] == 'National Identity Card') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="National Identity Card">National Identity Card</option>
                                                                                                                                                                        <option <?php if ($row['id_type'] == 'International Passport') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="International Passport">International Passport</option>
                                                                                                                                                                        <option <?php if ($row['id_type'] == 'Driver’s License') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="Driver’s License">Driver’s License</option>
                                                                                                                                                                        <option <?php if ($row['id_type'] == 'Voter’s Identification Card') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="Voter’s Identification Card">Voter’s Identification Card</option>
                                                                                                                                                                </select>
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-xl-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Copy Of Document from user</h6>
                                                                                                                                                                <!--<input name="id_document" type="file"
                     id="formFile1" multiple>-->
                                                                                                                                                                <img style="width: 80px;" src="../../photo/<?php print $row['id_document']; ?>" class="img-fluid" alt="">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Document Status</h6>
                                                                                                                                                                <select class="js-example-basic-single w-100" name="id_document_status">
                                                                                                                                                                        <option <?php if ($row['id_document_status'] == 'yes') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="yes">Verified</option>
                                                                                                                                                                        <option <?php if ($row['id_document_status'] == 'no') {
                                                                                                                                                                                        print 'selected';
                                                                                                                                                                                } ?> value="no">Unverified</option>
                                                                                                                                                                </select>
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Payment Details</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Account Name</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['account_name']; ?>" name="account_name" placeholder="Enter Your Account Name">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Account Number</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['account_number']; ?>" name="account_number" placeholder="Enter Your Account Number">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Bank Name</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['bank_name']; ?>" name="bank_name" placeholder="Enter Your Bank Name">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Routing Number</h6>
                                                                                                                                                                <input type="text" value="<?php print $row['bank_routing_number']; ?>" name="bank_routing_number" placeholder="Enter Your Routing Number">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Security</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Password<span class="text-danger">*</span></h6>
                                                                                                                                                                <input type="password" name="pass" placeholder="Enter Your Password">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Confirm Password<span class="text-danger">*</span></h6>
                                                                                                                                                                <input type="password" name="cpass" placeholder="Enter Your Confirm Password">
                                                                                                                                                        </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Security Pin</h6>
                                                                                                                                                                <input type="text" maxlength="4" value="<?php print $row['pin']; ?>" name="pin" placeholder="Enter Your Pin">
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                        <div>
                                                                                                                                <div class="card-header-1">
                                                                                                                                        <h5 class="mb-2">Registration</h5>
                                                                                                                                </div>
                                                                                                                                <div class="input-items">
                                                                                                                                        <div class="row gy-3 mb-4">
                                                                                                                                                <div class="col-md-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Joined</h6>
                                                                                                                                                                <div>
                                                                                                                                                                        <label class="text-warning">
                                                                                                                                                                                <?php print $row['date_created']; ?>
                                                                                                                                                                        </label>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                </div>

                                                                                                                                                <div class="col-md-6">
                                                                                                                                                        <div class="input-box">
                                                                                                                                                                <h6>Last Updated</h6>
                                                                                                                                                                <div>
                                                                                                                                                                        <label class="text-warning">
                                                                                                                                                                                <?php print $row['last_updated']; ?>
                                                                                                                                                                        </label>
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
                                                                        </div>

                                                                        <div style="padding-bottom: 100px;" class="col-12">
                                                                                <div class="">
                                                                                        <div class="">
                                                                                                <div class="">
                                                                                                        <div class="row gy-3">

                                                                                                                <div class="col-12">
                                                                                                                        <button name="sub" type="submit" class="btn restaurant-button">Save</button>
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