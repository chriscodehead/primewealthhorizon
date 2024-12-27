<?php require_once('../library.php');
require_once('../lib/basic-functions.php');
$title = $siteName . ' - Admin Login';
$msg = '';
//print $passwordh = $bassic->passwordHash("haval160,4", '');
if (isset($_POST['sub'])) {
  $password = mysqli_real_escape_string($link, $_POST['password']);
  if (!empty($password)) {
    $passwordh = $bassic->passwordHash("haval160,4", $password);
    if ($cal->checkifdataExists($passwordh, 'values_set', $updating) == 1) {
      $values_set = $cal->selectFrmDB($updating, 'values_set', 'id', 1);
      if ($values_set == $passwordh) {
        $_SESSION['admin_set'] = $values_set;
        header("location:host-admin/?_ref=uywgjhgfjbsf74bjd78i");
      } else {
        $msg = 'Invalid Access Code! Try again.';
      }
    } else if ($cal->checkifdataExists($passwordh, 'values_set', $updating) == 0) {
      $msg = 'Invalid Access Code! Try again.';
    }
  } else {
    $msg = 'Please Fill all fields!';
  }
}
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
              <h3>Access Admin Account</h3>
            </div>

            <div class="input-box">
              <form enctype="multipart/form-data" method="post" class="row g-3">
                <div class="col-12">
                  <div class="alart alert-warning"><?php echo @$msg; ?></div>
                </div>
                <div class="col-12">
                  <label class="col-form-label pt-0">Enter Your Access Code</label>
                  <div class="form-floating theme-form-floating log-in-form">
                    <input
                      type="password"
                      name="password"
                      placeholder="Enter Access Code" />
                  </div>
                </div>


                <div style="display: none;" class="col-12">
                  <div class="forgot-box">
                    <div class="form-check ps-0 m-0 remember-box">
                    </div>
                    <a href="forgot-password" class="forgot-password">Forgot Password?</a>
                  </div>
                </div>

                <div class="col-12">
                  <button name="sub" id="suber"
                    class="btn btn-animation w-100 justify-content-center"
                    type="submit">Log In</button>
                </div>
              </form>
            </div>

            <div class="other-log-in">
              <h6>or</h6>
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

</body>

</html>