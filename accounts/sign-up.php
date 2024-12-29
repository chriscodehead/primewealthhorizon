<?php
require_once('../include.php');
$bassic->checkLogedINSendOut('../dashboard/');
$msg = '';

if (isset($_POST['sub'])) {
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $pass = mysqli_real_escape_string($link, $_POST['pass']);
    $cpass = mysqli_real_escape_string($link, $_POST['cpass']);
    $user_code = $bassic->randGenerator();
    $affilaite_id = $bassic->randGenerator();
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
                            $msg = 'Success! Your account was created successfully.';
                            @$email_call->ActivateMail($email, $pass, $fullname);
                            header("location:login?inc=" . $msg);
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

$title = $siteName . ' - Signup';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php'); ?>

<body>

    <section class="log-in-section section-b-space">

        <div class="container w-100">
            <div class="row">
                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <center><a href="./"><img style="width: 200px;" src="../img/logo.png" class="img-fluid" alt="" /></a></center><br />
                            <h3>Create Account. Becoming An Affiliate</h3>
                        </div>

                        <div class="input-box">
                            <form enctype="multipart/form-data" method="post" class="row g-3">
                                <div class="col-12">
                                    <div class="alart alert-warning"><?php echo @$msg; ?></div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label pt-0">Your First Name</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" name="fname" placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label pt-0">Your Last Name</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" name="lname" placeholder="Enter Last Name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label pt-0">Enter Your Email</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Enter Your Email" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label pt-0">Enter Your Phone Number</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input
                                            type="tel"
                                            name="phone"
                                            placeholder="Enter Your Phone Number" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label pt-0">Enter Your Password</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input
                                            type="password"
                                            name="pass"
                                            placeholder="Enter Your Password" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label pt-0">Confirm Your Password</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input
                                            type="password"
                                            name="cpass"
                                            placeholder="Confirm Your Password" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input required class="custom-checkbox p-0" type="checkbox" name="text" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Agree with
                                                <a target="_blank" href="../policy"><span class="font-primary f-w-50">Privacy Policy</span></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button name="sub" id="suber"
                                        class="btn btn-animation w-100 justify-content-center"
                                        type="submit">Create An Account</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div>
                            <h6 class="text-center mt-3">
                                Already have an account?
                                <a href="login" class="font-primary f-w-600">Login</a>
                            </h6>
                        </div>

                        <div>
                            <h6 class="text-center mt-3">
                                Take me to website
                                <a href="../" class="font-primary f-w-600">Home</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('footer.php'); ?>
</body>

</html>