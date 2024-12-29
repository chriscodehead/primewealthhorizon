<?php
require_once('../include.php');
$bassic->checkLogedINSendOut('../dashboard/');
$msg = '';

if (isset($_POST['sub'])) {
  $emaillog = strtolower(mysqli_real_escape_string($link, $_POST['email']));
  $passlog = mysqli_real_escape_string($link, $_POST['pass']);
  $passlogh = $bassic->passwordHash($agorithm, $passlog);

  if (!empty($emaillog) && !empty($passlog)) {

    if ($cal->checkifdataExists($emaillog, 'email', $user_tb) == 1) {
      $email_status = @$cal->selectFrmDB($user_tb, 'email_activation', 'email', mysqli_real_escape_string($link, $emaillog));
      $hashed_pot = @$cal->selectFrmDB($user_tb, 'hashed_pot', 'email', mysqli_real_escape_string($link, $emaillog));
      $user_code = @$cal->selectFrmDB($user_tb, 'user_code', 'email', mysqli_real_escape_string($link, $emaillog));

      $msg = @$cal->login($emaillog, $passlogh, '../dashboard/', 'email', 'password', $user_tb);
    } else {
      $msg = 'Invalid login credentials!!! The email address or password you entered is incorrect.';
    }
  } else {
    $msg =  "Invalid Entry!!! Please fill all necessary fields.";
  }
}

$title = $siteName . ' - Signin'; ?>
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
              <h3>Access Your Account</h3>
            </div>

            <div class="input-box">
              <form enctype="multipart/form-data" method="post" class="row g-3">
                <div class="col-12">
                  <div class="alart alert-warning"><?php echo @$msg; ?></div>
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
                  <label class="col-form-label pt-0">Enter Your Password</label>
                  <div class="form-floating theme-form-floating log-in-form">
                    <input
                      type="password"
                      name="pass"
                      placeholder="Enter Your Password" />
                  </div>
                </div>

                <div class="col-12">
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
                Don't have account?
                <a href="register" class="font-primary f-w-600">Create Account</a>
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
  <script>
    ///resendEmailActivation
    function resendEmailActivation(email) {
      var hr = new XMLHttpRequest();
      var url = "../reg_process.php?action=resendEmailActivation";
      var vars = "email=" + email;

      if (email == "") {
        setTimeout(function() {
          alert('Unexpected Error!!! Please try again!');
        }, 1500);
      } else {
        hr.open("POST", url, true); // asynchronous request
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
          if (hr.readyState == 4) {
            if (hr.status == 200) {
              var return_data = hr.responseText;
              sweetUnpre(return_data);
            } else {
              alert('An unexpected error occurred. Please try again later.');
            }
          }
        }
        hr.send(vars); // Actually execute the request
      }
    }
  </script>
</body>

</html>