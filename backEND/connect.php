<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'clp');

class DB_con
{
    public $dbcon;

    function __construct()
    {
        $this->dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno()) {
            die("เชื่อมต่อไปยังฐานข้อมูลผิดพลาด กรุณาลองใหม่อีกครั้ง : " . mysqli_connect_error());
        }   
    }

    // แสดง ตารางข่าว 1
    public function News1()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_1");
        return $result;
    }

    // แสดง ตารางข่าว 2
    public function News2()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_2");
        return $result;
    }

    // แสดง ตารางข่าว 3
    public function News3()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_3");
        return $result;
    }

    // แสดง ตารางข่าว 4
    public function News4()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_4");
        return $result;
    }

    // แสดง ตารางข่าว 5
    public function News5()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_5");
        return $result;
    }

    // แสดง IP ผู้เข้าใช้ตรงแถบข้างขวา
    public function viewIP_list()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM visitors ORDER BY latest_enter DESC LIMIT 20");
        return $result;
    }

    // แสดง IP ผู้เข้าใช้
    public function viewIP()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM visitors ORDER BY latest_enter DESC");
        return $result;
    }

    // นับผู้เข้าใช้ด้วย IP ของผู้เข้าใช้
    public function countVisitors()
    {
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $result = mysqli_query($this->dbcon, "SELECT * FROM visitors WHERE ip_address = '$visitor_ip'");
        $total_visitors = mysqli_num_rows($result);

        if ($total_visitors < 1) {
            $query = "INSERT INTO visitors(`ip_address`) VALUES ('$visitor_ip')";
            $result = mysqli_query($this->dbcon, $query);
        } else {
            $query = "UPDATE visitors SET latest_enter = CURRENT_TIMESTAMP() WHERE ip_address='$visitor_ip'";
            $result = mysqli_query($this->dbcon, $query);
        }

        $result = mysqli_query($this->dbcon, "SELECT * FROM visitors");
        $total_visitors = mysqli_num_rows($result);

        return $total_visitors;
    }

    // เข้าสู่ระบบ
    public function login($username, $pass)
    {
        // เข้ารหัสให้กับ $username
        $username = base64_encode($username);

        $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE username='$username'");

        if (mysqli_num_rows($result) > 0) {

            // เรียกรหัสผ่านที่เข้ารหัสใน Mysql แล้วนำไปแทนค่า
            $result = mysqli_query($this->dbcon, "SELECT pass FROM member WHERE username = '$username'");
            $row = mysqli_fetch_assoc($result);
            $hashedPassDB = $row['pass'];

            // เข้ารหัสให้กับ Pass ที่พิมพ์มา
            $hashedPass = hash('sha256', 'Lnwza007' . $pass);

            // เช็ก Pass ที่เข้ารหัสว่าตรงกันกับใน Mysql 
            if ($hashedPass === $hashedPassDB) {
                $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE username='$username'");
                $row = mysqli_fetch_assoc($result);

                setcookie("fname", $row['fname'], strtotime("+12 hours"), '/', '', true, true);
                setcookie("lname", $row['lname'], strtotime("+12 hours"), '/', '', true, true);
                setcookie("username", $row['username'], strtotime("+12 hours"), '/', '', true, true);

                echo "<script>alert('เข้าสู่ระบบเรียบร้อย !');</script>";
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('รหัสผ่านผิดพลาด กรุณาลองใหม่อีกครั้ง !');</script>";
                echo "<script>window.location.href='pages-login.php'</script>";
            }
        } else {
            echo "<script>alert('ไม่พบบัญชีผู้ใช้นี้ในระบบ กรุณาลองใหม่อีกครั้ง !');</script>";
            echo "<script>window.location.href='pages-login.php'</script>";
        }
    }

    // สมัครบัญชีผู้ใช้ 
    public function register($fname, $lname, $username, $pass)
    {
        // เข้ารหัสให้กับ $username
        $username = base64_encode($username);

        $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE username='$username'");

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('ชื่อบัญชีผู้ใช้ถูกใช้งานไปแล้ว กรุณาใช้ชื่ออื่น');</script>";
        } else {
            if (strlen($pass) < 8) {
                echo "<script>alert('รหัสต้องมีความยาวอย่างน้อย 8 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
            } else {
                if (!preg_match("/[A-Z]/", $pass)) {
                    echo "<script>alert('รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษตัวใหญ่อย่างน้อย 1 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
                } else {
                    $hashedPass = hash('sha256', 'Lnwza007' . $pass);
                    $result = mysqli_query($this->dbcon, "INSERT INTO member(fname, lname, username, pass) 
                        VALUES('$fname', '$lname', '$username', '$hashedPass')");
                    return $result;
                }
            }
        }
    }

    // แก้ไขชื่อ
    public function updateName($fname, $lname, $username)
    {
        $result = mysqli_query($this->dbcon, "UPDATE member SET 
                fname = '$fname',
                lname = '$lname'
                WHERE username = '$username'
            ");
        return $result;
    }

    // เปลี่ยนรหัสผ่าน 
    public function changePass($username, $pass, $newPass)
    {
        // เรียกรหัสผ่านที่เข้ารหัสใน Mysql แล้วนำไปแทนค่า
        $result = mysqli_query($this->dbcon, "SELECT pass FROM member WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);
        $hashedPassDB = $row['pass'];

        // เข้ารหัสให้กับ Pass ที่พิมพ์มา
        $hashedPass = hash('sha256', 'Lnwza007' . $pass);

        // เช็ก Pass ที่เข้ารหัสว่าตรงกันกับใน Mysql 
        if ($hashedPass === $hashedPassDB) {
            if (strlen($newPass) < 8) {
                echo "<script>alert('รหัสต้องมีความยาวอย่างน้อย 8 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
            } else {
                if (!preg_match("/[A-Z]/", $newPass)) {
                    echo "<script>alert('รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษตัวใหญ่อย่างน้อย 1 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
                } else {
                    // เข้ารหัสให้กับรหัสผ่านใหม่ที่พิมพ์มา 
                    $hashedNewPass = hash('sha256', 'Lnwza007' . $newPass);

                    $result = mysqli_query($this->dbcon, "UPDATE member SET 
                            pass = '$hashedNewPass'
                            WHERE username = '$username' AND pass = '$hashedPassDB'
                        ");
                    return $result;
                }
            }
        } else {
            echo "<script>alert('รหัสผ่านเก่าผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
        }
    }

    // แสดงข้อมูลสมาชิก
    public function fetchdataMember()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM member");
        return $result;
    }

    public function fetchonerecordMember($username)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE username = '$username'");
        return $result;
    }

    // เพิ่มข่าว 1
    public function insert($newsName1, $img1, $img12, $img13, $img14, $img15, $img16, $NewsMsg1, $note1, $modi_user1)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_1(newsName1, img1, img12, img13, img14, img15, img16, NewsMsg1, note1, modi_user1) 
            VALUES('$newsName1', '$img1', '$img12', '$img13', '$img14', '$img15', '$img16', '$NewsMsg1', '$note1', '$modi_user1')");
        return $result;
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_1");
        return $result;
    }

    public function fetchonerecord($news1_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_1 WHERE news1_id = '$news1_id'");
        return $result;
    }

    public function update($newsName1, $img1, $img12, $img13, $img14, $img15, $img16, $NewsMsg1, $note1, $modi_user1, $news1_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_1 SET 
                newsName1 = '$newsName1',
                img1 = '$img1',
                img12 = '$img12',
                img13 = '$img13',
                img14 = '$img14',
                img15 = '$img15',
                img16 = '$img16',
                NewsMsg1 = '$NewsMsg1',
                note1 = '$note1',
                modi_user1 = '$modi_user1'
                WHERE news1_id = '$news1_id'
            ");
        return $result;
    }

    public function delete($news1_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM news_1 WHERE news1_id = '$news1_id '");
        return $deleterecord;
    }



    // เพิ่มข่าว 2
    public function insert2($newsName2, $img2, $img22, $img23, $img24, $img25, $img26, $NewsMsg2, $note2, $modi_user2)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_2(newsName2, img2, img22, img23, img24, img25, img26, NewsMsg2, note2, modi_user2) 
            VALUES('$newsName2', '$img2', '$img22', '$img23', '$img24', '$img25', '$img26', '$NewsMsg2', '$note2', '$modi_user2')");
        return $result;
    }

    public function fetchdata2()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_2");
        return $result;
    }

    public function fetchonerecord2($news2_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_2 WHERE news2_id = '$news2_id'");
        return $result;
    }

    public function update2($newsName2, $img2, $img22, $img23, $img24, $img25, $img26, $NewsMsg2, $note2, $modi_user2, $news2_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_2 SET 
                newsName2 = '$newsName2',
                img2 = '$img2',
                img22 = '$img22',
                img23 = '$img23',
                img24 = '$img24',
                img25 = '$img25',
                img26 = '$img26',
                NewsMsg2 = '$NewsMsg2',
                note2 = '$note2',
                modi_user2 = '$modi_user2'
                WHERE news2_id = '$news2_id'
            ");
        return $result;
    }

    public function delete2($news2_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM news_2 WHERE news2_id = '$news2_id '");
        return $deleterecord;
    }



    // เพิ่มข่าว 3
    public function insert3($newsName3, $img3, $img32, $img33, $img34, $img35, $img36, $NewsMsg3, $note3, $modi_user3)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_3(newsName3, img3, img32, img33, img34, img35, img36, NewsMsg3, note3, modi_user3) 
        VALUES('$newsName3', '$img3', '$img32', '$img33', '$img34', '$img35', '$img36', '$NewsMsg3', '$note3', '$modi_user3')");
        return $result;
    }

    public function fetchdata3()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_3");
        return $result;
    }

    public function fetchonerecord3($news3_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_3 WHERE news3_id = '$news3_id '");
        return $result;
    }

    public function update3($newsName3, $img3, $img32, $img33, $img34, $img35, $img36, $NewsMsg3, $note3, $modi_user3, $news3_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_3 SET 
                newsName3 = '$newsName3',
                img3 = '$img3',
                img32 = '$img32',
                img33 = '$img33',
                img34 = '$img34',
                img35 = '$img35',
                img36 = '$img36',
                NewsMsg3 = '$NewsMsg3',
                note3 = '$note3',
                modi_user3 = '$modi_user3'
                WHERE news3_id = '$news3_id '
            ");
        return $result;
    }

    public function delete3($news3_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM news_3 WHERE news3_id = '$news3_id '");
        return $deleterecord;
    }



    // เพิ่มข่าว 4
    public function insert4($newsName4, $img4, $img42, $img43, $img44, $img45, $img46, $NewsMsg4, $note4, $modi_user4)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_4(newsName4, img4, img42, img43, img44, img45, img46, NewsMsg4, note4, modi_user4) 
            VALUES('$newsName4', '$img4', '$img42', '$img43', '$img44', '$img45', '$img46', '$NewsMsg4', '$note4', '$modi_user4')");
        return $result;
    }

    public function fetchdata4()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_4");
        return $result;
    }

    public function fetchonerecord4($news4_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_4 WHERE news4_id = '$news4_id '");
        return $result;
    }

    public function update4($newsName4, $img4, $img42, $img43, $img44, $img45, $img46, $NewsMsg4, $note4, $modi_user4, $news4_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_4 SET 
                newsName4 = '$newsName4',
                img4 = '$img4',
                img42 = '$img42',
                img43 = '$img43',
                img44 = '$img44',
                img45 = '$img45',
                img46 = '$img46',
                NewsMsg4 = '$NewsMsg4',
                note4 = '$note4',
                modi_user4 = '$modi_user4'
                WHERE news4_id = '$news4_id '
            ");
        return $result;
    }

    public function delete4($news4_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM news_4 WHERE news4_id = '$news4_id '");
        return $deleterecord;
    }



    // เพิ่มข่าว 5
    public function insert5($newsName5, $img5, $img52, $img53, $img54, $img55, $img56, $NewsMsg5, $note5, $modi_user5)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_5(newsName5, img5, img52, img53, img54, img55, img56, NewsMsg5, note5, modi_user5) 
            VALUES('$newsName5', '$img5', '$img52', '$img53', '$img54', '$img55', '$img56', '$NewsMsg5', '$note5', '$modi_user5')");
        return $result;
    }

    public function fetchdata5()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_5");
        return $result;
    }

    public function fetchonerecord5($news5_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM news_5 WHERE news5_id = '$news5_id'");
        return $result;
    }

    public function update5($newsName5, $img5, $img52, $img53, $img54, $img55, $img56, $NewsMsg5, $note5, $modi_user5, $news5_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_5 SET 
                newsName5 = '$newsName5',
                img5 = '$img5',
                img52 = '$img52',
                img53 = '$img53',
                img54 = '$img54',
                img55 = '$img55',
                img56 = '$img56',
                NewsMsg5 = '$NewsMsg5',
                note5 = '$note5',
                modi_user5 = '$modi_user5'
                WHERE news5_id = '$news5_id '
            ");
        return $result;
    }

    public function delete5($news5_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM news_5 WHERE news5_id = '$news5_id '");
        return $deleterecord;
    }
}
