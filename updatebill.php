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

    if(isset($_GET['bill_id'])) {
        $bill_id = $_GET['bill_id'];

        $sql = "SELECT * FROM bill WHERE bill_id='$bill_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <center>
                <h3>แก้ไขbill</h3>
                <form action="billupdate.php" method="post">
                    <input type="hidden" name="bill_id" value="<?php echo $row_data['bill_id']; ?>">
                    <label for="customer_id">รหัสลูกค้า:</label>
                    <input type="text" name="customer_id" value="<?php echo $row_data['customer_id']; ?>"><br><br>
                    <label for="employee_id">รหัสพนักงานขาย:</label>
                    <input type="text" name="employee_id" value="<?php echo $row_data['employee_id']; ?>"><br><br>
                    <label for="lot_num">เลขล็อต:</label>
                    <input type="text" name="lot_num" value="<?php echo $row_data['lot_num']; ?>"><br><br>
                    <input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
                </form>
                <br><br><a href="bill.php">กลับ</a>
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
