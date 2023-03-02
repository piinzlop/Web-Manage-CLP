<?php

include_once('./backEND/connect.php');

if (!isset($_COOKIE['username'])) {
  echo "<script>alert('กรุณาลงชื่อเข้าใช้ก่อนเข้าเว็บไซต์ !');</script>";
  echo "<script>window.location.href='pages-login.php'</script>";
}

$conn = new DB_con();

if (isset($_POST['insert4'])) {
  $newsName4 = htmlentities($_POST['newsName4']);
  $img4 = htmlentities($_POST['img4']);
  $img42 = htmlentities(empty($_POST['img42'])) ? "" : $_POST['img42'];
  $img43 = htmlentities(empty($_POST['img43'])) ? "" : $_POST['img43'];
  $img44 = htmlentities(empty($_POST['img44'])) ? "" : $_POST['img44'];
  $img45 = htmlentities(empty($_POST['img45'])) ? "" : $_POST['img45'];
  $img46 = htmlentities(empty($_POST['img46'])) ? "" : $_POST['img46'];
  $NewsMsg4 = htmlentities($_POST['NewsMsg4']);
  $note4 = htmlentities($_POST['note4']);
  $modi_user4 = htmlentities($_POST['modi_user4']);

  $sql = $conn->insert4($newsName4, $img4, $img42, $img43, $img44, $img45, $img46, $NewsMsg4, $note4, $modi_user4);

  if ($sql) {
    echo "<script>alert('เพิ่มข้อมูลข่าว 4 เรียบร้อย !');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('มีบางอย่าผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
    echo "<script>window.location.href='news_4.php'</script>";
  }
}

if (isset($_GET['logout'])) {
  foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', strtotime("-12 hours"), '/', '', true, true);
    echo "<script>window.location.href='pages-login.php'</script>";
  }
}

$username = $_COOKIE['username'];
$deUsername = base64_decode($username);

$sql = $conn->fetchonerecordMember($username);
while ($row = mysqli_fetch_array($sql)) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CLP - เพิ่มข่าว 4</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets\img\CLP_logo.png" rel="icon">
    <link href="assets\img\CLP_logo.png" rel="apple-touch-icon">

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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets\img\CLP_logo.png" alt=""><span style="margin: 5px;"></span>
          <span class="d-none d-lg-block">CLP : Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="https://w7.pngwing.com/pngs/481/915/png-transparent-computer-icons-user-avatar-woman-avatar-computer-business-conversation-thumbnail.png" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['fname']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </h6>
                <span>Username : <?php echo $deUsername; ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $row['username']; ?>">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $row['username']; ?>">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="?logout=1">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Log out</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>เพิ่มข่าว</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="news_1.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 1</span>
              </a>
            </li>
            <li>
              <a href="news_2.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 2</span>
              </a>
            </li>
            <li>
              <a href="news_3.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 3</span>
              </a>
            </li>
            <li>
              <a href="news_4.php" class="active">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 4</span>
              </a>
            </li>
            <li>
              <a href="news_5.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 5</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>แก้ไขข่าว</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="upNews_1.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 1</span>
              </a>
            </li>
            <li>
              <a href="upNews_2.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 2</span>
              </a>
            </li>
            <li>
              <a href="upNews_3.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 3</span>
              </a>
            </li>
            <li>
              <a href="upNews_4.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 4</span>
              </a>
            </li>
            <li>
              <a href="upNews_5.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 5</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.php?id=<?php echo $row['username']; ?>">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->


    <!-- เริ่มตัวเว็บ -->
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>หน้าเพิ่มข่าว</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">เพิ่มข่าว 4</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <!-- หัวข้อบน -->
      <section class="section dashboard">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">เพิ่มข่าวเพจ 4</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="" method="post">

              <div class="col-md-12">
                <div class="form-floating">
                    <p>ชื่อหัวข่าว : </p>
                  <input type="text" class="form-control" name="newsName4" placeholder="newsName4" require>
                </div>
              </div>

              <div id="img-fields">
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูป : </p>
                    <input type="text" class="form-control" name="img4" placeholder="img4" require>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-outline-primary" id="addBtn" onclick="addImgField()">เพิ่มลิ้งค์รูป</button>
              <p id="end" style="display: none; text-align: center;">ไม่สามารถเพิ่มรูปได้อีกแล้ว</p>

              <script>
                var imgFieldCount = 1;
                var addBtn = document.getElementById("addBtn");
                var end = document.getElementById("end");

                function addImgField() {
                  if (imgFieldCount < 6) {
                    imgFieldCount++;
                    var fields = document.getElementById("img-fields");
                    var newField = document.createElement("div");
                    newField.innerHTML =
                      `
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control my-3" name="img4${imgFieldCount}" placeholder="img${imgFieldCount}" require>
                          <label for="img4${imgFieldCount}">ลิ้งค์รูปเพิ่มเติม : ${imgFieldCount}</label>
                        </div>
                      </div>
                      `;
                    fields.appendChild(newField);
                  } else {
                    addBtn.setAttribute("disabled", true);
                    end.style.display = "block";
                  }
                }
              </script>

              <div class="col-12">
                <div class="form-floating">
                    <p>เนื้อหาข่าว : </p>
                  <textarea class="form-control" placeholder="NewsMsg4" name="NewsMsg4" style="height: 100px;" require></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>หมายเหตุ : </p>
                    <input type="text" class="form-control" name="note4" placeholder="note4" require>
                  </div>
                </div>
              </div>
              <div clase="col-md-12">
                <div class="form-floating">
                  <input hidden type="text" class="form-control" name="modi_user4" placeholder="modi_user4" value=<?php echo $username; ?>>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="insert4" class="btn btn-primary">ยืนยัน</button>
                <a href="upNews_4.php?id=1" class="btn btn-success">แก้ไข</a>
                <button type="reset" class="btn btn-danger">ล้างค่า</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>
      </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- แจ้งเตือนขวาบน -->
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

<?php } ?>