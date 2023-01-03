<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'clp');

class DB_con
{

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    // เข้าสู่ระบบ
    public function login($username, $pass)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "SELECT * FROM member WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $queryP = "SELECT * FROM member WHERE username='$username' AND pass='$pass'";
            $resultP = mysqli_query($conn, $queryP);
            if (mysqli_num_rows($resultP)) {

                // Query the database to retrieve the data
                $query = "SELECT * FROM member WHERE username='$username'";
                $result = mysqli_query($conn, $query);

                // Fetch the row data
                $row = mysqli_fetch_assoc($result);

                // Set the cookie with the retrieved data
                setcookie("fname", $row['fname'], time() + 3600);
                setcookie("lname", $row['lname'], time() + 3600);
                setcookie("username", $row['username'], time() + 3600);

                echo "<script>alert('เช้าสู่ระบบเรียบร้อย !');</script>";
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
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "SELECT * FROM member WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('ชื่อบัญชีผู้ใช้ถูกใช้งานไปแล้ว กรุณาใช้ชื่ออื่น');</script>";
        } else {
            if (strlen($pass) < 8) {
                echo "<script>alert('รหัสต้องมีความยาวอย่างน้อย 8 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
            } else {
                if (!preg_match("/[A-Z]/", $pass)) {
                    echo "<script>alert('รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษตัวใหญ่อย่างน้อย 1 ตัว กรุณาลองใหม่อีกครั้ง');</script>";
                } else {
                    //  แบบเข้ารหัส
                    // $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
                    // $result = mysqli_query($this->dbcon, "INSERT INTO member(fname, lname, username, pass) 
                    //     VALUES('$fname', '$lname', '$username', '$hashedPassword')");
                    // return $result;

                    //  แบบไม่เข้ารหัส
                    $result = mysqli_query($this->dbcon, "INSERT INTO member(fname, lname, username, pass) 
                        VALUES('$fname', '$lname', '$username', '$pass')");
                    return $result;
                }
            }
        }
    }

    public function fetchdataMember()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM member");
        return $result;
    }

    public function fetchonerecordMember($member_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE member_id = '$member_id'");
        return $result;
    }



    // เพิ่มข่าว 1
    public function insert($newsName1, $img1, $NewsMsg1, $note1, $modi_user1)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_1(newsName1, img1, NewsMsg1, note1, modi_user1) 
            VALUES('$newsName1', '$img1', '$NewsMsg1', '$note1', '$modi_user1')");
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

    public function update($newsName1, $img1, $NewsMsg1, $note1, $modi_user1, $news1_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_1 SET 
                newsName1 = '$newsName1',
                img1 = '$img1',
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
    public function insert2($newsName2, $img2, $NewsMsg2, $note2, $modi_user2)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_2(newsName2, img2, NewsMsg2, note2, modi_user2) 
            VALUES('$newsName2', '$img2', '$NewsMsg2', '$note2', '$modi_user2')");
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

    public function update2($newsName2, $img2, $NewsMsg2, $note2, $modi_user2, $news2_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_2 SET 
                newsName2 = '$newsName2',
                img2 = '$img2',
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
    public function insert3($newsName3, $img3, $NewsMsg3, $note3, $modi_user3)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_3(newsName3, img3, NewsMsg3, note3, modi_user3) 
            VALUES('$newsName3', '$img3', '$NewsMsg3', '$note3', '$modi_user3')");
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

    public function update3($newsName3, $img3, $NewsMsg3, $note3, $modi_user3, $news3_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_3 SET 
                newsName3 = '$newsName3',
                img3 = '$img3',
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
    public function insert4($newsName4, $img4, $NewsMsg4, $note4, $modi_user4)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_4(newsName4, img4, NewsMsg4, note4, modi_user4) 
            VALUES('$newsName4', '$img4', '$NewsMsg4', '$note4', '$modi_user4')");
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

    public function update4($newsName4, $img4, $NewsMsg4, $note4, $modi_user4, $news4_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_4 SET 
                newsName4 = '$newsName4',
                img4 = '$img4',
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
    public function insert5($newsName5, $img5, $NewsMsg5, $note5, $modi_user5)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO news_5(newsName5, img5, NewsMsg5, note5, modi_user5) 
            VALUES('$newsName5', '$img5', '$NewsMsg5', '$note5', '$modi_user5')");
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

    public function update5($newsName5, $img5, $NewsMsg5, $note5, $modi_user5, $news5_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE news_5 SET 
                newsName5 = '$newsName5',
                img5 = '$img5',
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
