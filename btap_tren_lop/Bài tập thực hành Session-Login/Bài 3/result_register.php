function err() {
        echo "<script>
                if (confirm('Tài khoản đã tồn tại!!')) {
                    window.location.href = 'form_register.php';
                } else {
                    // Do something else or simply close the dialog
                }
              </script>";
}
<?php
    require_once('../../config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý đăng ký
        $host = "localhost";
        $user = "root";
        $password = DB_PASSWORD;
        $dbname = "sinhvien";

        $conn = new mysqli($host, $user, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        // Lấy dữ liệu từ biểu mẫu đăng ký
        $MSSV = $_POST['txtMSSV'];
        $HoTen = $_POST['txtHoTen'];
        $Lop = $_POST['txtLop'];
        $Khoa = $_POST['txtKhoa'];
        $SDT = $_POST['txtSDT'];
        $TK = $_POST['txtTK'];
        $MatKhau = sha1($_POST['txtMatKhau']);

        // Kiểm tra xem MSSV đã tồn tại chưa
        $sql_check = "SELECT * FROM tblsinhvien WHERE MSSV = '$MSSV'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            echo "<script>
                if (confirm('Tài khoản đã tồn tại!!')) {
                    window.location.href = 'form_register.php';
                } else {
                    // Do something else or simply close the dialog
                }
              </script>";
            exit();
        }

        // Kiểm tra xem tên tài khoản đã tồn tại chưa
        $sql_check_user = "SELECT * FROM tblusers WHERE TK = '$TK'";
        $result_check_user = $conn->query($sql_check_user);
        if ($result_check_user->num_rows > 0) {
            echo "<script>
                if (confirm('Tài khoản đã tồn tại!!')) {
                    window.location.href = 'form_register.php';
                } else {
                    
                }
              </script>";
            exit();
        }

        $sql = "INSERT INTO tblusers (MSSV, TK, MK) VALUES ('$MSSV', '$TK', '$MatKhau')";
        $sql2 = "INSERT INTO tblsinhvien (MSSV, HoTen, Lop, Khoa, SDT) VALUES ('$MSSV', '$HoTen', '$Lop', '$Khoa', '$SDT')";

        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            echo "<script>
                if (confirm('Đăng ký thành công!! Bạn có thể đăng nhập!!')) {
                    window.location.href = 'form_login.php';
                } else {
                }
              </script>";
        } else {
            echo "<script>
                if (confirm('Đã có lỗi xảy ra!! Hãy đăng ký lại!!')) {
                    window.location.href = 'form_register.php';
                } else {
                    // Do something else or simply close the dialog
                }
              </script>";
        }

        $conn->close();
    }
?>
