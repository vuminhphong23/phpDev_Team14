<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            width: 40%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: navy;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 150px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004288;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Tour</h2>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "ducanh12@#";
        $database = "travelEasy";
        $con = mysqli_connect($host, $user, $password, $database);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        if (isset($_GET['idTour'])) {
            $idTour = $_GET['idTour'];
        
            // Truy vấn để lấy thông tin tour cần chỉnh sửa
            $query = mysqli_query($con, "SELECT idTour, name, startDay, endDay, cost FROM tblTour WHERE idTour = '$idTour'");
            $row = mysqli_fetch_assoc($query);
        
            // Hiển thị biểu mẫu chỉnh sửa
            echo "<form action='process_edit.php' method='POST'>";
            echo "<input type='hidden' name='idTour' value='" . $row['idTour'] . "'>";
            echo "<input type='text' placeholder='Name' name='name' value='" . $row['name'] . "' required>";
            echo "<input type='date' placeholder='startDay' name='startDay' value='" . $row['startDay'] . "' required>";
            echo "<input type='date' placeholder='endDay' name='endDay' value='" . $row['endDay'] . "' required>";
            echo "<input type='text' placeholder='cost' name='cost' value='" . $row['cost'] . "' required>";
            echo "<input type='submit' value='Update Tour'>";
            echo "</form>";
        }
        

        mysqli_close($con);
        ?>
    </div>
</body>
</html>