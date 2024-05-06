<?php
$target_dir = "upload/";

$extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);

$timestamp = date("Ymd");

$hashed_filename = $timestamp . '_' . sha1(basename($_FILES["fileToUpload"]["name"])) . '.' . $extension;

$target_file = $target_dir . $hashed_filename;

$uploadOk = 1;

$errorMessage = "";

// Kiểm tra xem tệp đã tồn tại hay chưa
if (file_exists($target_file)) {
    $errorMessage = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Kiểm tra kích thước tệp
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $errorMessage = "Sorry, your file is too large.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    header("Location: files.php?error=$errorMessage");
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        require_once('../../config.php');
        $host = "localhost";
        $user = "root";
        $password = DB_PASSWORD;
        $dbname = "fileupload";
        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $file_name = pathinfo($hashed_filename, PATHINFO_FILENAME);
        $file_path = $target_file;
        $file_size = $_FILES["fileToUpload"]["size"];
        $file_type = $extension;

        $sql = "INSERT INTO tblfile (name, type, upload_date, size) VALUES ('$file_name', '$file_type', NOW(), '$file_size')";

        if ($conn->query($sql) === TRUE) {
   
            header("Location: files.php?success=The file $file_name has been uploaded.");
        } else {
           
            header("Location: files.php?error=Sorry, there was an error uploading your file.");
        }

        
        $conn->close();
    } else {
        
        header("Location: files.php?error=Sorry, there was an error uploading your file.");
    }
}
?>
