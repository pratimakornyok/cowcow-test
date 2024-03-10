<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $bill_id = $_POST['bill_id'];
    $customer_id = $_POST['customer_id'];
    $employee_id = $_POST['employee_id'];
    $lot_num = $_POST['lot_num'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password);
    echo '<center>';
    if (!$conn)
        die("ไม่สามารถติดต่อกับ mySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล cowcow ได้");
    mysqli_query($conn,"set character_set_connection=utf8mb4");
    mysqli_query($conn,"set character_set_client=utf8mb4");
    mysqli_query($conn,"set character_set_results=utf8mb4");
  
    $sql = "UPDATE bill SET bill_id='$bill_id', customer_id='$customer_id', employee_id='$employee_id', lot_num='$lot_num' WHERE bill_id='$bill_id'";
    mysqli_query($conn, $sql) or die("อัปเดตข้อมูลในตาราง cow มีข้อผิดพลาดเกิดขึ้น");

    header("location: bill.php");
    echo '<br><br><a href="bill.php">กลับหน้า bookList1.php</a>';
    mysqli_close($conn);
    echo '</center>';
?>
</body>
</html>
