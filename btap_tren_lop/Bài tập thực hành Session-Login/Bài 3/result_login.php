
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../../config.php');

    $host = "localhost";
    $user = "root";
    $password = DB_PASSWORD;
    $dbname = "sinhvien";

    $conn = new mysqli($host, $user, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ biểu mẫu đăng nhập
    $TK = $_POST['txtTenTaiKhoan'];
    $MK = $_POST['txtMatKhau'];

    // Truy vấn để lấy thông tin tài khoản từ cơ sở dữ liệu
    $sql = "SELECT * FROM tblusers WHERE TK = '$TK'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $hashed_password = $row['MK'];

        
        if (sha1($MK) === $hashed_password) {
            
            echo "<h1 style='color: blue;'>Kết quả đăng nhập</h1>";
            echo "Tài khoản: <span style='color: red;'>$TK</span><br>";
            echo "Mật khẩu: <span style='color: red;'>$MK</span><br>";
            echo "Đăng nhập thành công!";
            echo "<br>";
            echo "<a href='form_login.php'>Quay lại</a>"; 
        } else {
            echo "<script>
                if (confirm('Sai tài khoản hoặc mật khẩu!!')) {
                    window.location.href = 'form_login.php';
                } else {
                    // Do something else or simply close the dialog
                }
              </script>";

        }

    } else {
        echo "<script>
                if (confirm('Sai tài khoản hoặc mật khẩu!!')) {
                    window.location.href = 'form_login.php';
                } else {
                }
              </script>";
    }

    $conn->close();
}
?>
