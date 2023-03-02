<?php

include_once('./backEND/connect.php');

if (!isset($_COOKIE['username'])) {
  echo "<script>alert('กรุณาลงชื่อเข้าใช้ก่อนเข้าเว็บไซต์ !');</script>";
  echo "<script>window.location.href='pages-login.php'</script>";
}

if (isset($_GET['logout'])) {
  foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', strtotime("-12 hours"), '/', '', true, true);
    echo "<script>window.location.href='pages-login.php'</script>";
  }
}

$username = htmlentities($_COOKIE['username']);
$deUsername = base64_decode($username);

$conn = new DB_con();

$total_visitors = $conn->countVisitors();
$total_News = $conn->total_News();

$sql = $conn->fetchonerecordMember($username);
while ($row = mysqli_fetch_array($sql)) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CLP : Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/CLP_logo.png" rel="icon">
    <link href="assets/img/CLP_logo.png" rel="apple-touch-icon">

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

    <!-- แสดงเวลาแบบ Real-time -->
    <script type="text/javascript">
      function startTime() {
        var today = new Date();
        var options = {
          hour12: false,
          timeZone: 'Asia/Bangkok'
        };
        var time = today.toLocaleTimeString('en-US', options);
        document.getElementById("clock").innerHTML = time;
        setTimeout(startTime, 1000);
      }

      function checkTime(i) {
        return i < 10 ? "0" + i : i;
      }
    </script>

  </head>

  <body onload="startTime()">

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
          <input type="text" name="query" placeholder="ค้นหา" title="Enter search keyword">
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

    <!-- ======= Navbar แถบข้างซ้าย ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

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

        <li class="nav-heading">Pages</li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.php?id=<?php echo $row['username']; ?>">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row">

              <!-- ช่องวันที่ -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title"><?= thai_date_and_time(time()) ?>
                    </h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-clock"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <div id="clock"></div>
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- ช่องวันที่ -->

              <!-- ช่องเช็กคนเข้าชม -->
              <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="card-body">
                    <h5 class="card-title">ผู้เข้าใช้ <span>| คน</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_visitors; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- ช่องเช็กคนเข้าชม -->

              <!-- ช่องนับข่าว -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">ข่าวทั้งหมด <span>| ข่าว</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-newspaper"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_News; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- ช่องนับข่าว -->

              <!-- ตารางข่าวทั้งหมด -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <h5 class="card-title">ตารางข่าวทั้งหมด
                      <a href="index.php" class="btn btn-outline-success btn-sm ms-2">Refresh</a>
                    </h5>

                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">รูปข่าว</th>
                          <th scope="col">ชื่อบัญชีผู้แก้ไข</th>
                          <th scope="col">ชื่อข่าว</th>
                          <th scope="col">หมายเหตุ</th>
                          <th scope="col">เวลาอัปเดตล่าสุด</th>
                        </tr>
                      </thead>

                      <?php

                      $sql = $conn->News1();
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $deUsername = base64_decode($row['modi_user1']);

                        echo "<tr>";
                        echo '<td><a href="upNews_1.php?id=' . $row['news1_id'] . '"><img src="' . $row['img1'] . '" width="auto" height="70" alt="image"></a></td>';
                        echo "<td><span class='fw-bold text-success'>" . $deUsername . "</td>";
                        echo "<td><a class='fw-bold text-primary' href='upNews_1.php?id=" . $row['news1_id'] . "'>" . $row['newsName1'] . "</td>";
                        echo "<td><span class='fw-bold '>" . $row['note1'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['updated_at1'] . "</td>";
                        echo "</tr>";
                      }

                      $sql = $conn->News2();
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $deUsername = base64_decode($row['modi_user2']);

                        echo "<tr>";
                        echo '<td><a href="upNews_2.php?id=' . $row['news2_id'] . '"><img src="' . $row['img2'] . '" width="auto" height="70" alt="image"></a></td>';
                        echo "<td><span class='fw-bold text-success'>" . $deUsername . "</td>";
                        echo "<td><a class='fw-bold text-primary' href='upNews_2.php?id=" . $row['news2_id'] . "'>" . $row['newsName2'] . "</td>";
                        echo "<td><span class='fw-bold '>" . $row['note2'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['updated_at2'] . "</td>";
                        echo "</tr>";
                      }

                      $sql = $conn->News3();
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $deUsername = base64_decode($row['modi_user3']);

                        echo "<tr>";
                        echo '<td><a href="upNews_3.php?id=' . $row['news3_id'] . '"><img src="' . $row['img3'] . '" width="auto" height="70" alt="image"></a></td>';
                        echo "<td><span class='fw-bold text-success'>" . $deUsername . "</td>";
                        echo "<td><a class='fw-bold text-primary' href='upNews_3.php?id=" . $row['news3_id'] . "'>" . $row['newsName3'] . "</td>";
                        echo "<td><span class='fw-bold '>" . $row['note3'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['updated_at3'] . "</td>";
                        echo "</tr>";
                      }

                      $sql = $conn->News4();
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $deUsername = base64_decode($row['modi_user4']);

                        echo "<tr>";
                        echo '<td><a href="upNews_4.php?id=' . $row['news4_id'] . '"><img src="' . $row['img4'] . '" width="auto" height="70" alt="image"></a></td>';
                        echo "<td><span class='fw-bold text-success'>" . $deUsername . "</td>";
                        echo "<td><a class='fw-bold text-primary' href='upNews_4.php?id=" . $row['news4_id'] . "'>" . $row['newsName4'] . "</td>";
                        echo "<td><span class='fw-bold '>" . $row['note4'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['updated_at4'] . "</td>";
                        echo "</tr>";
                      }

                      $sql = $conn->News5();
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $deUsername = base64_decode($row['modi_user5']);

                        echo "<tr>";
                        echo '<td><a href="upNews_5.php?id=' . $row['news5_id'] . '"><img src="' . $row['img5'] . '" width="auto" height="70" alt="image"></a></td>';
                        echo "<td><span class='fw-bold text-success'>" . $deUsername . "</td>";
                        echo "<td><a class='fw-bold text-primary' href='upNews_5.php?id=" . $row['news5_id'] . "'>" . $row['newsName5'] . "</td>";
                        echo "<td><span class='fw-bold '>" . $row['note5'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['updated_at5'] . "</td>";
                        echo "</tr>";
                      }

                      ?>

                    </table>
                  </div>
                </div>
              </div><!-- ตารางข่าวทั้งหมด  -->

              <!-- IP Address ของผู้เข้าใช้ -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">

                  <div class="card-body">
                    <h5 class="card-title">IP Address ของผู้เข้าใช้
                      <a href="index.php" class="btn btn-outline-success btn-sm ms-2">Refresh</a>
                    </h5>

                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">เข้าชมคนที่</th>
                          <th scope="col">IP Address</th>
                          <th scope="col">เวลาที่เข้าชมครั้งแรก</th>
                          <th scope="col">เวลาที่เข้าชมครั้งล่าสุด</th>
                        </tr>
                      </thead>

                      <?php

                      $sql = $conn->viewIP();
                      while ($row = mysqli_fetch_assoc($sql)) {

                        echo "<tr>";
                        echo "<td><a class='text-primary fw-bold'># " . $row['visitors_id'] . "</a></td>";
                        echo "<td><span class='fw-bold text-danger'>" . $row['ip_address'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['visi_date'] . "</td>";
                        echo "<td class='fw-bold text-success'>" . $row['latest_enter'] . "</td>";
                      }

                      ?>

                    </table>
                  </div>
                </div>
              </div><!-- IP Address ของผู้เข้าใช้ -->

            </div>
          </div><!-- End Left side columns -->

          <!-- Right side columns -->
          <div class="col-lg-4">

            <!-- ผู้เข้าใช้เว็บไซต์ -->
            <div class="card">

              <div class="card-body">
                <h5 class="card-title">ผู้เข้าใช้ชม <span>| ล่าสุด</span></h5>
                <div class="activity">

                  <?php

                  $sql = $conn->viewIP_list();
                  while ($row = mysqli_fetch_assoc($sql)) {

                    echo "<div class='activity-item d-flex'>";
                    echo "  <div class='fw-bold activite-label text-primary'># " . $row['visitors_id'] . "</div>";
                    echo "  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>";
                    echo "  <div class='fw-bold activity-content text-danger'>";
                    echo "     " . $row['ip_address'] . "   <a  class='fw-bold text-dark ms-2'>" . $row['latest_enter'] . "</a>";
                    echo "  </div>";
                    echo "</div>";
                  }

                  ?>

                </div>

              </div>
            </div><!-- ผู้เข้าใช้เว็บไซต์ -->

            <!-- News & Updates Traffic -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title"> ข่าว <span>| แก้ไขล่าสุด</span></h5>
                <div class="news">

                  <?php

                  $latest_News = $conn->latest_News();
                  while ($row = mysqli_fetch_assoc($latest_News)) {
                    // กรองข้อความที่มากกว่า 250 อักษรขึ้นไป
                    $newsMsg = $row['NewsMsg1'];
                    if (strlen($newsMsg) > 140) {
                      $newsMsg = substr($newsMsg, 0, 140) . "...";
                    }

                    echo "<div class='post-item clearfix'>";
                    echo "<img src='" . $row['img'] . "' alt=''>";
                    echo "  <h4><a href='#'>" . $row['newsName'] . "</a></h4>";
                    echo "<p>" . $newsMsg . "</p>";
                    echo "</div>";
                  }

                  ?>

                </div><!-- End sidebar recent posts-->
                </br>
              </div>
            </div><!-- End News & Updates -->
          </div><!-- End Right side columns -->
        </div>
      </section>

    </main><!-- End #main -->

    <!-- ปุ่มเลื่อนบนสุด -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- สคริปแผนภูมิ ApexCharts -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- สคริป Nabbar -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- สคริป แผนภูมิ Charts -->
    <script src="assets/vendor/chart.js/chart.min.js"></script>

    <!-- สคริป แผนภูมิ ECharts -->
    <script src="assets/vendor/echarts/echarts.min.js"></script>

    <script src="assets/vendor/quill/quill.min.js"></script>

    <!-- สคริปกรองข้อมูลในตาราง -->
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>

    <!-- สคริปฟอร์มอีเมล -->
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

  </html>

<?php } ?>