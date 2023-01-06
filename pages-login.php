<?php

include_once('./backEND/connect.php');

$selectdata = new DB_con();

if (isset($_POST['login'])) {
  $username = htmlentities($_POST['username']);
  $pass = htmlentities($_POST['pass']);
  $sql = $selectdata->login($username, $pass);
}

if (isset($_POST['remember'])) {
  // Set the "username" cookie to expire in 7 days
  setcookie("username", $username, time() + 604800);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-500" style="padding: 40px;">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 mb-3">เข้าสู่ระบบด้วยบัญชี Admin</h5>
                    <p class="text-center small mb-5">ใส่ชื่อและรหัสผ่านบัญชีผู้ใช้ที่ได้ทำการสมัคร</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">ชื่อผู้ใช้ :</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">ID :</span>
                        <input type="text" name="username" class="form-control" id="username" value="<?php $username ?>" required>
                        <div class="invalid-feedback">กรุณาใส่บัญชีผู้ใช้ </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">รหัสผ่าน :</label>
                      <input type="password" name="pass" id="pass" class="form-control" required>
                      <div class="invalid-feedback">กรุณาใส่รหัสผ่าน </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="remember" id="remember" name="remember">จดจำชื่อผู้ใช้</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button type="submit" name="login" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                    </div>
                    <div class="col-12 mt-4">
                      <p class="small mb-0">หากยังไม่มีบัญชีผู้ใช้ <a href="pages-register.php">สมัครบัญชีผู้ใช้</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>