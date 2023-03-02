<?php

include_once('./backEND/connect.php');

if (!isset($_COOKIE['username'])) {
  echo "<script>alert('กรุณาลงชื่อเข้าใช้ก่อนเข้าเว็บไซต์ !');</script>";
  echo "<script>window.location.href='pages-login.php'</script>";
}


$conn = new DB_con();

if (isset($_POST['update5'])) {

  $news5_id = htmlentities($_GET['id']);
  $newsName5 = htmlentities($_POST['newsName5']);
  $img5 = htmlentities($_POST['img5']);
  $img52 = htmlentities(empty($_POST['img52'])) ? "" : $_POST['img52'];
  $img53 = htmlentities(empty($_POST['img53'])) ? "" : $_POST['img53'];
  $img54 = htmlentities(empty($_POST['img54'])) ? "" : $_POST['img54'];
  $img55 = htmlentities(empty($_POST['img55'])) ? "" : $_POST['img55'];
  $img56 = htmlentities(empty($_POST['img56'])) ? "" : $_POST['img56'];
  $NewsMsg5 = htmlentities($_POST['NewsMsg5']);
  $note5 = htmlentities($_POST['note5']);
  $modi_user5 = htmlentities($_POST['modi_user5']);

  $sql = $conn->update5($newsName5, $img5, $img52, $img53, $img54, $img55, $img56, $NewsMsg5, $note5, $modi_user5, $news5_id);
  if ($sql) {
    echo "<script>alert('แก้ไขข้อมูลข่าว 5 เรียบร้อย !');</script>";
    echo "<script>window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองอีกรอบ');</script>";
    echo "<script>window.location.href='upNews_5.php?id=1.php'</script>";
  }
}

if (isset($_GET['logout'])) {
  foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', strtotime("-12 hours"), '/', '', true, true);
    echo "<script>window.location.href='pages-login.php'</script>";
  }
}

$username = htmlentities($_COOKIE['username']);
$deUsername = base64_decode($username);
$fname = htmlentities($_COOKIE['fname']);
$lname = htmlentities($_COOKIE['lname']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CLP - แก้ไขข่าว 5</title>
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $fname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fname ?> <?php echo $lname ?> </h6>
              <span>Username : <?php echo $deUsername ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $username; ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php?id=<?php echo $username; ?>">
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
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>แก้ไขข่าว</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
            <a href="upNews_5.php?id=1" class="active">
              <i class="bi bi-circle"></i><span>แก้ไขข่าว 5</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php?id=<?php echo $username; ?>">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->


  <!-- เริ่มตัวเว็บ -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>หน้าแก้ไขข่าว</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">แก้ไขข่าว 5</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- หัวข้อบน -->
    <section class="section dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">แก้ไขข่าว 5</h5>

          <?php

          $news5_id = $_GET['id'];
          $sql = $conn->fetchonerecord5($news5_id);
          while ($row = mysqli_fetch_array($sql)) {

          ?>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="" method="post">
              <div class="col-md-12">
                <div class="form-floating">
                  <p>ชื่อข่าว : </p>
                  <input type="text" class="form-control" name="newsName5" placeholder="newsName5" value="<?php echo $row['newsName5']; ?>" require>
                </div>
              </div>

              <!-- สคลิปโชว์ภาพตัวอย่าง -->
              <script>
                function popUpImage(imageUrl) {
                  if (imageUrl) {
                    event.preventDefault(); // ทำให้กดปุ่มแล้วไม่รีเฟรซหน้า
                    window.open(imageUrl, '', 'location=yes,height=auto,width=auto,scrollbars=yes,status=yes');
                  }
                }

                // สคลิปปุ่มเพิ่มรูป
                var addImageBtn = document.getElementById("addImageBtn");
                document.getElementById("addImageBtn").removeAttribute("required");

                function showInput(event) {
                  event.preventDefault(); // ทำให้กดปุ่มแล้วไม่รีเฟรซหน้า
                  if (document.getElementById("inputContainer").style.display === "block") {
                    document.getElementById("inputContainer").style.display = "none";
                  } else {
                    document.getElementById("inputContainer").style.display = "block";
                  }
                }
              </script>

              <div class="col-md-12">
                <div class="form-floating">
                  <p>ลิ้งค์รูปที่ 1 :
                    <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img5']; ?>')">ตัวอย่างภาพ</button>
                  </p>
                  <input type="text" class="form-control" name="img5" placeholder="img5" value="<?php echo $row['img5']; ?>" require>
                </div>
              </div>

              <?php if (!empty($row['img52'])) : ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูปที่ 2 : <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img52'] ?>')">ตัวอย่างภาพ</button></p>
                    <input type="text" class="form-control" name="img52" value="<?php echo $row['img52']; ?>">
                  </div>
                </div>
              <?php else : ?>
                <div id="inputContainer" style="display: none;">
                  <p>ลิ้งค์รูปที่ 2 : </p>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="img52">
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['img53'])) : ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูปที่ 3 : <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img53'] ?>')">ตัวอย่างภาพ</button></p>
                    <input type="text" class="form-control" name="img53" value="<?php echo $row['img53']; ?>">
                  </div>
                </div>
              <?php else : ?>
                <div id="inputContainer" style="display: none;">
                  <p>ลิ้งค์รูปที่ 3 : </p>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="img53">
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['img54'])) : ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูปที่ 4 : <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img54'] ?>')">ตัวอย่างภาพ</button></p>
                    <input type="text" class="form-control" name="img54" value="<?php echo $row['img54']; ?>">
                  </div>
                </div>
              <?php else : ?>
                <div id="inputContainer" style="display: none;">
                  <p>ลิ้งค์รูปที่ 4 : </p>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="img54">
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['img55'])) : ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูปที่ 5 : <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img55'] ?>')">ตัวอย่างภาพ</button></p>
                    <input type="text" class="form-control" name="img55" value="<?php echo $row['img55']; ?>">
                  </div>
                </div>
              <?php else : ?>
                <div id="inputContainer" style="display: none;">
                  <p>ลิ้งค์รูปที่ 5 : </p>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="img55">
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['img56'])) : ?>
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>ลิ้งค์รูปที่ 6 : <button class="btn btn-outline-primary" onclick="popUpImage('<?php echo $row['img56'] ?>')">ตัวอย่างภาพ</button></p>
                    <input type="text" class="form-control" name="img56" value="<?php echo $row['img56']; ?>">
                  </div>
                </div>
              <?php else : ?>
                <div id="inputContainer" style="display: none;">
                  <p>ลิ้งค์รูปที่ 6 : </p>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="img56">
                  </div>
                </div>
              <?php endif; ?>

              <?php
              if (empty($row['img52']) || empty($row['img53']) || empty($row['img54']) || empty($row['img55']) || empty($row['img56'])) {
                echo '<button class="btn btn-outline-primary" id="addImageBtn" onclick="showInput(event)">เพิ่มรูป</button>';
              }
              ?>

              <div class="col-12">
                <div class="form-floating">
                  <p>เนื้อหาข่าว : </p>
                  <textarea class="form-control" placeholder="NewsMsg5" name="NewsMsg5" style="height: 150px;" require><?php echo $row['NewsMsg5']; ?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-floating">
                    <p>หมายเหตุ : </p>
                    <input type="text" class="form-control" name="note5" placeholder="note5" value="<?php echo $row['note5']; ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <input hidden type="text" class="form-control" name="modi_user5" placeholder="modi_user5" value=<?php echo $username; ?>>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="update5" class="btn btn-primary">ยืนยัน</button>
                <a href="news_5.php" class="btn btn-success">เพิ่มข่าว</a>
              </div>
            </form><!-- End floating Labels Form -->

            <?php

            // Connect to the database
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

            // Set the number of records to display per page
            $records_per_page = 10;

            // Get the current page number
            $page = 1;
            if (isset($_GET['id'])) {
              $page = (int)$_GET['id'];
            }

            // Calculate the start index for the current page
            $start = ($page - 1) * $records_per_page;

            // Fetch the records from the database
            $result = mysqli_query($conn, "SELECT * FROM news_5 LIMIT $start, $records_per_page");

            // Calculate the total number of pages
            $resultCount = mysqli_query($conn, "SELECT COUNT(*) as num_records FROM news_5");
            $row = mysqli_fetch_assoc($resultCount);
            $num_records = $row['num_records'];
            $num_pages = ceil($num_records / $records_per_page);

            // Output the navigation links
            echo '<nav aria-label="Page navigation example" class="mt-4">';
            echo '<ul class="pagination justify-content-center">';

            for ($i = 1; $i <= $num_pages; $i++) {
              if ($i == $page) {
                echo '    <li class="page-item active" aria-current="page">';
              } else {
                echo '    <li class="page-item">';
              }

              while ($row = mysqli_fetch_assoc($result)) {

                echo  '

                  <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="upNews_5.php?id=' . $row['news5_id'] . '">' . $row['news5_id'] . '</a></li>
                  </ul>
                
                      ';

                echo '    </li>';
              }

              echo '  </ul>';
              echo '</nav>';
            }

            ?>

          <?php } ?>

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