<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $lot_num = $_POST['lot_num'];
    $AmountOfMilk = $_POST['AmountOfMilk'];
    $Quality = $_POST['Quality'];
    $Price = $_POST['Price'];
    $Price_mem = $_POST['Price_mem'];

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
  
    $sql = "UPDATE cow SET AmountOfMilk='$AmountOfMilk', Quality='$Quality', Price='$Price', Price_mem='$Price_mem' WHERE lot_num='$lot_num'";
    mysqli_query($conn, $sql) or die("อัปเดตข้อมูลในตาราง cow มีข้อผิดพลาดเกิดขึ้น");

    header("location: cow.php");
    echo '<br><br><a href="cow.php">กลับหน้า bookList1.php</a>';
    mysqli_close($conn);
    echo '</center>';
?>
</body>
</html>
