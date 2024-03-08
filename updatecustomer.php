<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลวัว</title>
</head>
<body>
    <?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password, $dbName);
    if (!$conn) {
        die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8mb4");

    if(isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];

        $sql = "SELECT * FROM customer WHERE customer_id='$customer_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <center>
                <h3>แก้ไขcustomer</h3>
                <form action="customerupdate.php" method="post">
                    <input type="hidden" name="customer_id" value="<?php echo $row_data['customer_id']; ?>">
                    <label for="customer_name">ปริมาณนม:</label>
                    <input type="text" name="customer_name" value="<?php echo $row_data['customer_name']; ?>"><br><br>
                    <label for="customer_address">เกรด:</label>
                    <input type="text" name="customer_address" value="<?php echo $row_data['customer_address']; ?>"><br><br>
                    <label for="customer_phone">ราคา:</label>
                    <input type="text" name="customer_phone" value="<?php echo $row_data['customer_phone']; ?>"><br><br>
                    <label for="customer_type">ประเภท:</label>
                    <input type="text" name="customer_type" value="<?php echo $row_data['customer_type']; ?>"><br><br>
                    <input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
                </form>
                <br><br><a href="customer.php">กลับ</a>
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
