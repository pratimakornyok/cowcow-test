<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลวัว</title>
</head>
<body>
    <?php
    // เชื่อมต่อกับฐานข้อมูล MySQL
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password, $dbName);
    if (!$conn) {
        die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8mb4");

    // เช็คว่ามีพารามิเตอร์ lot_num ที่ส่งมาหรือไม่
    if(isset($_GET['lot_num'])) {
        $lot_num = $_GET['lot_num'];

        // ดึงข้อมูลวัวจากฐานข้อมูล
        $sql = "SELECT * FROM cow WHERE lot_num='$lot_num'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        // ตรวจสอบว่ามีข้อมูลวัวหรือไม่
        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <!-- แสดงแบบฟอร์มสำหรับแก้ไขข้อมูล -->
            <center>
                <h3>แก้ไขข้อมูลวัว</h3>
                <form action="cowupdate.php" method="post">
                    <!-- ใช้ input hidden เพื่อส่ง lot_num ไปยังหน้า updatecow.php -->
                    <input type="hidden" name="lot_num" value="<?php echo $row_data['lot_num']; ?>">
                    <label for="AmountOfMilk">ปริมาณนม:</label>
                    <input type="text" name="AmountOfMilk" value="<?php echo $row_data['AmountOfMilk']; ?>"><br><br>
                    <label for="Quality">เกรด:</label>
                    <input type="text" name="Quality" value="<?php echo $row_data['Quality']; ?>"><br><br>
                    <label for="Price">ราคา:</label>
                    <input type="text" name="Price" value="<?php echo $row_data['Price']; ?>"><br><br>
                    <input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
                </form>
                <br><br><a href="cow.php">กลับ</a>
            </center>
    <?php
        } else {
            echo "ไม่พบข้อมูลวัวที่ต้องการแก้ไข";
        }
    } else {
        echo "ไม่พบพารามิเตอร์ lot_num";
    }
    mysqli_close($conn);
    ?>
</body>
</html>
