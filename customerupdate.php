<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $customer_type = $_POST['customer_type'];

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
  
    $sql = "UPDATE customer SET customer_name='$customer_name', customer_address='$customer_address', customer_phone='$customer_phone',customer_type='$customer_type' WHERE customer_id='$customer_id'";
    mysqli_query($conn, $sql) or die("อัปเดตข้อมูลในตาราง cow มีข้อผิดพลาดเกิดขึ้น");

    header("location: customer.php");
    echo '<br><br><a href="customer.php">กลับหน้า bookList1.php</a>';
    mysqli_close($conn);
    echo '</center>';
?>
</body>
</html>
