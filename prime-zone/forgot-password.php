<?php require_once('../library.php');
require_once('../lib/basic-functions.php');
$title = $siteName . ' - Admin Forgot Password';
$msg = '';
if (isset($_POST['emailfgt'])) {
    $emailfgt = $_POST['emailfgt'];
    if (!empty($emailfgt)) {
        $check = $cal->checkifdataExists($emailfgt, 'email', $user_tb);
        if ($check == 1) {
            $msg = $email_call->forgetpassword($emailfgt, $user_tb, 'email');
        } else {
            $msg = '!Oop email address dose not exist in the systems record!';
        }
    } else {
        $msg =  'Enter a valid email!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php'); ?>

<body>
    <section class="log-in-section section-b-space">
        <a href="#" class="logo-login"><img src="../img/logo.png" alt="" class="img-fluid"></a>
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Forgot Password</h3>
                        </div>

                        <div class="input-box">
                            <form method="post" enctype="multipart/form-data" class="row g-4">
                                <div class="col-12">
                                    <div class="alart alert-warning"><?php echo @$msg; ?></div>
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label pt-0">Enter Your Recovery Email</label>
                                    <input type="email" name="emailfgt" id="emailfgt" placeholder="Enter Email">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" name="emailfgt"
                                        type="submit">Recover Account</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div>
                            <h6 class="text-center mt-3">
                                I have an active account
                                <a href="./" class="font-primary f-w-600">Login</a>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>