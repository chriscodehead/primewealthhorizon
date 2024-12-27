<?php
require_once('include.php');
$bassic->checkLogedINSendOutAdmin('index');
$user = $cal->selectFrmDB($updating, 'id', 'values_set', $_SESSION['admin_set']);
if ($user == '1') {
} else {
  header('location:../../end-current-session');
}
?>
<?php
if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
  header("location:../host-admin/");
}
$msg = '';
if (isset($_POST['sub'])) {
  $email = htmlentities($_POST['email']);
  $password = $_POST['password'];
  if (!empty($email) && !empty($password)) {
    $passwordh = $bassic->passwordHash("haval160,4", $password);
    $login = $cal->loginAdmin($email, $passwordh, '../host-admin/');
    if (!empty($login)) {
      $msg = $login;
    }
  } else {
    $msg = 'Please Fill all fields!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta
    name="description"
    content="admin" />
  <meta
    name="keywords"
    content="admin, mirracare" />
  <meta name="author" content="pixelstrap" />
  <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
  <link
    rel="shortcut icon"
    href="assets/images/favicon.png"
    type="image/x-icon" />
  <title><?php print $siteName; ?> - Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet" />
  <!-- Bootstrap css -->
  <link
    rel="stylesheet"
    type="text/css"
    href="assets/css/vendors/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
  <section class="log-in-section section-b-space">

    <div class="container w-100">
      <div class="row">
        <div class="col-xl-5 col-lg-6 me-auto">
          <div class="log-in-box">
            <div class="log-in-title">
              <center><a href="./" class=""><img style="width: 200px;" src="../../img/logo.png" class="img-fluid" alt="" /></a></center><br />
              <h3>Log In Your Account</h3>
            </div>

            <div class="input-box">
              <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-12">
                  <div class="alart alert-warning"><?php echo @$msg; ?></div>
                </div>
                <div class="col-12">
                  <label class="col-form-label pt-0">Your Email</label>
                  <div class="form-floating theme-form-floating log-in-form">
                    <input
                      type="email"
                      name="email"
                      placeholder="Enter Email" />
                  </div>
                </div>

                <div class="col-12">
                  <label class="col-form-label pt-0">Your Password</label>
                  <div class="form-floating theme-form-floating log-in-form">
                    <input
                      type="password"
                      name="password"
                      placeholder="Enter Password" />
                  </div>
                </div>

                <div class="col-12">
                  <div class="forgot-box">
                    <div class="form-check ps-0 m-0 remember-box">
                      <input
                        class="custom-checkbox p-0"
                        type="checkbox"
                        name="text"
                        id="flexCheckDefault" />
                      <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                    </div>

                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" name="sub" id="suber"
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
                Visit website?
                <a href="../../" class="font-primary f-w-600">Home</a>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>