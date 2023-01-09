<?php

include_once('./backEND/connect.php');

if (!isset($_COOKIE['username'])) {
  echo "<script>alert('กรุณาลงชื่อเข้าใช้ก่อนเข้าเว็บไซต์ !');</script>";
  echo "<script>window.location.href='pages-login.php'</script>";
}

if (isset($_GET['logout'])) {
  foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time() - 3600);
    echo "<script>window.location.href='pages-login.php'</script>";
  }
}

$username = htmlentities($_COOKIE['username']);

$updatedata = new DB_con();

if (isset($_POST['updateName'])) {

  $username = htmlentities($_GET['id']);
  $fname = htmlentities($_POST['fname']);
  $lname = htmlentities($_POST['lname']);

  $sql = $updatedata->updateName($fname, $lname, $username);
  if ($sql) {
    echo "<script>alert('แก้ไขข้อมูลชื่อเรียบร้อย !');</script>";
    echo "<script>window.location.href='users-profile.php?id=" . $username . "'</script>";
  } else {
    echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองอีกรอบ');</script>";
    echo "<script>window.location.href='users-profile.php?id=" . $username . "'</script>";
  }
}

if (isset($_POST['changePass'])) {

  $username = htmlentities($_GET['id']);
  $pass = htmlentities($_POST['pass']);
  $newPass = htmlentities($_POST['newPass']);
  $confirmPass = htmlentities($_POST['confirmPass']);

  if ($newPass === $confirmPass) {
    $sql2 = $updatedata->changePass($username, $pass, $newPass);
    if ($sql2) {
      echo "<script>alert('แก้ไขรหัสผ่านเรียบร้อย !');</script>";
      echo "<script>window.location.href='users-profile.php?id=" . $username . "'</script>";
    }
  } else {
    echo "<script>alert('รหัสผ่าน กับยืนยันรหัสผ่านไม่ตรงกัน กรุณาลองอีกรอบ');</script>";
    echo "<script>window.location.href='users-profile.php?id=" . $username . "'</script>";
  }
}

$updateuser = new DB_con();
$sql = $updateuser->fetchonerecordMember($username);
while ($row = mysqli_fetch_array($sql)) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
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
          <img src="assets\img\CLP_logo.png" alt="">
          <span class="d-none d-lg-block" style="margin: 10px;">CLP : Admin</span>
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
              <img src="https://w7.pngwing.com/pngs/481/915/png-transparent-computer-icons-user-avatar-woman-avatar-computer-business-conversation-thumbnail.png" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['fname']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h6>
                <span>Username : <?php echo $row['username']; ?></span>
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
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>เพิ่มข่าว</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="news_1.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 1</span>
              </a>
            </li>
            <li>
            <li>
              <a href="news_2.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 2</span>
              </a>
            </li>
            <li>
            <li>
              <a href="news_3.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 3</span>
              </a>
            </li>
            <li>
            <li>
              <a href="news_4.php">
                <i class="bi bi-circle"></i><span>เพิ่มข่าว 4</span>
              </a>
            </li>
            <li>
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
            <li>
              <a href="upNews_2.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 2</span>
              </a>
            </li>
            <li>
            <li>
              <a href="upNews_3.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 3</span>
              </a>
            </li>
            <li>
            <li>
              <a href="upNews_4.php?id=1">
                <i class="bi bi-circle"></i><span>แก้ไขข่าว 4</span>
              </a>
            </li>
            <li>
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
          <a class="nav-link " href="users-profile.php?id=<?php echo $row['username']; ?>">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="https://w7.pngwing.com/pngs/481/915/png-transparent-computer-icons-user-avatar-woman-avatar-computer-business-conversation-thumbnail.png" alt="Profile" class="rounded-circle">
                <h2 class="mt-4"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h2>
                <h3 class="m-3"> User Name : <?php echo $row['username']; ?></h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">User Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['username']; ?></div>
                    </div>
                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">


                    <!-- Profile Edit Form -->
                    <form action="" method="post">
                      <div class="row mb-3">
                        <label for="fname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="fname" type="text" class="form-control" value="<?php echo $row['fname']; ?>" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="lname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lname" type="text" class="form-control" value="<?php echo $row['lname']; ?>" required>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" name="updateName" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">

                    <!-- Change Password Form -->
                    <form action="" method="post">

                      <div class="row mb-3">
                        <label for="pass" class="col-md-4 col-lg-3 col-form-label">รหัสปัจจุบัน</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="pass" type="password" class="form-control" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPass" class="col-md-4 col-lg-3 col-form-label">รหัสผ่านใหม่</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newPass" type="password" class="form-control" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="confirmPass" class="col-md-4 col-lg-3 col-form-label">ยืนยันรหัสผ่านใหม่อีกครั้ง</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="confirmPass" type="password" class="form-control" required>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" name="changePass" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>

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

<?php }  ?>