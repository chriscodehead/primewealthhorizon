<?php
require_once('include.php');
$title = 'Dashboard | Add User';
$bassic->checkLogedINAdmin('login');

if (isset($_POST['sub'])) {
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $fullname = $fname . ' ' . $lname;
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $pass = mysqli_real_escape_string($link, $_POST['pass']);
    $cpass = mysqli_real_escape_string($link, $_POST['cpass']);
    $affilaite_id = $bassic->randGenerator();
    $user_code = $bassic->randGenerator();
    $date_created = $bassic->getDate();
    $last_updated = $bassic->getDate();
    $rawpass = $pass;
    $two_factor_code = $bassic->picker();
    $forget_password_code = uniqid();
    $passh = $bassic->passwordHash($agorithm, $pass);
    $hashed_pot = $bassic->passwordHash($agorithm, $email);
    $username = strtoupper($bassic->picker() . uniqid());

    if (!empty($email) && !empty($fname) && !empty($lname) && !empty($pass)) {
        if ($pass == $cpass) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($cal->checkifdataExists($email, 'email', $user_tb) == 1) {
                    $msg = "Error! The email address entered already exists";
                } else if ($cal->checkifdataExists($email, 'email', $user_tb) == 0) {
                    if ($cal->checkifdataExists($username, 'client_username', $user_tb) == 1) {
                        $msg = "Error! The username entered already exists.";
                    } else if ($cal->checkifdataExists($username, 'client_username', $user_tb) == 0) {
                        $feilds = array('id', 'user_code', 'affilaite_id', 'client_username', 'fname', 'lname', 'email', 'phone',  'password', 'rawpass', 'forget_password_code', 'two_factor_code', 'date_created', 'hashed_pot', 'last_updated');
                        $value = array(null, $user_code, $affilaite_id, $username, $fname, $lname, $email, $phone, $passh, $pass, $forget_password_code, $two_factor_code, $date_created, $hashed_pot, $last_updated);
                        $result = $cal->insertDataB($user_tb, $feilds, $value);
                        if ($result == 'Registration was successful. Proceed to login!') {
                            $msg = 'Success! The user has been created successfully.';
                            @$email_call->ActivateMail($email, $pass, $fullname);
                        } else {
                            $msg = $result;
                        }
                    }
                }
            } else {
                $msg = 'Error! Please enter a valid email address.';
            }
        } else {
            $msg = "Error! Passwords do not match.";
        }
    } else {
        $msg = "Error! Please complete all required fields.";
    }
}
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
                                                                                <input type="text" name="fname" placeholder="Enter First Name">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="input-box">
                                                                                <h6>Last Name<span class="text-danger">*</span></h6>
                                                                                <input type="text" name="lname" placeholder="Enter Last Name">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="input-box">
                                                                                <h6>Email<span class="text-danger">*</span></h6>
                                                                                <input type="email" name="email" placeholder="Enter Email">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="input-box">
                                                                                <h6>Phone Number</h6>
                                                                                <input type="tel" name="phone" placeholder="Enter Phone Number">
                                                                            </div>
                                                                        </div>

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