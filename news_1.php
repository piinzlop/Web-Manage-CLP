<?php

include_once('./backEND/connect.php');

if (!isset($_COOKIE['username'])) {
  echo "<script>alert('กรุณาลงชื่อเข้าใช้ก่อนเข้าเว็บไซต์ !');</script>";
  echo "<script>window.location.href='pages-login.php'</script>";
}

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
  $newsName1 = htmlentities($_POST['newsName1']);
  $img1 = htmlentities($_POST['img1']);
  $NewsMsg1 = htmlentities($_POST['NewsMsg1']);
  $note1 = htmlentities($_POST['note1']);
  $modi_user1 = htmlentities($_POST['modi_user1']);

  $sql = $insertdata->insert($newsName1, $img1, $NewsMsg1, $note1, $modi_user1);

  if ($sql) {
    echo "<script>alert('เพิ่มข้อมูลข่าว 1 เรียบร้อย !');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('มีบางอย่าผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
    echo "<script>window.location.href='news_1.php'</script>";
  }
}

if (isset($_GET['logout'])) {
  setcookie("username", "", time() - 3600);
  setcookie("fname", "", time() - 3600);
  setcookie("lname", "", time() - 3600);
  echo "<script>window.location.href='pages-login.php'</script>";
}

$username = htmlentities($_COOKIE['username']);

$updateuser = new DB_con();
$sql = $updateuser->fetchonerecordMember($username);
while ($row = mysqli_fetch_array($sql)) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CLP - เพิ่มข่าว 1</title>
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt=""><span style="margin: 5px;"></span>
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

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
              <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Nav -->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['fname']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </h6>
                <span>Username : <?php echo $row['username']; ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
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
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="components-alerts.html">
                <i class="bi bi-circle"></i><span>Alerts</span>
              </a>
            </li>
            <li>
              <a href="components-accordion.html">
                <i class="bi bi-circle"></i><span>Accordion</span>
              </a>
            </li>
            <li>
              <a href="components-badges.html">
                <i class="bi bi-circle"></i><span>Badges</span>
              </a>
            </li>
            <li>
              <a href="components-breadcrumbs.html">
                <i class="bi bi-circle"></i><span>Breadcrumbs</span>
              </a>
            </li>
            <li>
              <a href="components-buttons.html">
                <i class="bi bi-circle"></i><span>Buttons</span>
              </a>
            </li>
            <li>
              <a href="components-cards.html">
                <i class="bi bi-circle"></i><span>Cards</span>
              </a>
            </li>
            <li>
              <a href="components-carousel.html">
                <i class="bi bi-circle"></i><span>Carousel</span>
              </a>
            </li>
            <li>
              <a href="components-list-group.html">
                <i class="bi bi-circle"></i><span>List group</span>
              </a>
            </li>
            <li>
              <a href="components-modal.html">
                <i class="bi bi-circle"></i><span>Modal</span>
              </a>
            </li>
            <li>
              <a href="components-tabs.html">
                <i class="bi bi-circle"></i><span>Tabs</span>
              </a>
            </li>
            <li>
              <a href="components-pagination.html">
                <i class="bi bi-circle"></i><span>Pagination</span>
              </a>
            </li>
            <li>
              <a href="components-progress.html">
                <i class="bi bi-circle"></i><span>Progress</span>
              </a>
            </li>
            <li>
              <a href="components-spinners.html">
                <i class="bi bi-circle"></i><span>Spinners</span>
              </a>
            </li>
            <li>
              <a href="components-tooltips.html">
                <i class="bi bi-circle"></i><span>Tooltips</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>เพิ่มข่าว</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="news_1.php" class="active">
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
              <a href="news_4.php">
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

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts-chartjs.html">
                <i class="bi bi-circle"></i><span>Chart.js</span>
              </a>
            </li>
            <li>
              <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i><span>ApexCharts</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i><span>ECharts</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.php">
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
            <li class="breadcrumb-item active">เพิ่มข่าว 1</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <!-- หัวข้อบน -->
      <section class="section dashboard">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">เพิ่มข่าวเพจ 1</h5>

            <?php

            // $fetchdata = new DB_con();
            // $sql = $fetchdata->fetchdata();
            // while ($row = mysqli_fetch_array($sql)) {

            ?>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="" method="post">

              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" name="newsName1" placeholder="newsName1" require>
                  <label for="newsName1">ชื่อหัวข่าว</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" name="img1" placeholder="img1" require>
                  <label for="img1">ไฟล์รูป</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="NewsMsg1" name="NewsMsg1" style="height: 100px;" require></textarea>
                  <label for="NewsMsg1">เนื้อหาข่าว</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="note1" placeholder="note1" require>
                    <label for="note1">หมายเหตุ</label>
                  </div>
                </div>
              </div>
              <div clase="col-md-12">
                <div class="form-floating">
                  <input hidden type="text" class="form-control" name="modi_user1" placeholder="modi_user1" value=<?php echo $username; ?>>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="insert" class="btn btn-primary">Submit</button>
                <a href="upNews_1.php?id=1" class="btn btn-success">Edit</a>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
            </form><!-- End floating Labels Form -->

            <?php
            // }
            ?>

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