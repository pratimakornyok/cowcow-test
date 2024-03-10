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
  
    $sql = "insert into customer(customer_id, customer_name, customer_address, customer_phone, customer_type) values ('$customer_id', '$customer_name', '$customer_address', '$customer_phone','$customer_type')";
    mysqli_query($conn, $sql) or die("insert ลงตาราง cow มีข้อผิดพลาดเกิดขึ้น");
    header("location: customer.php");
    echo '<br><br><a href="insertcustomer.php">กลับหน้า bookList1.php</a>';
    mysqli_close($conn);
    echo '</center>';
?>
</body>
</html>