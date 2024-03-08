<html>
<head>
    <title>cow</title>
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

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>ลูกค้า</h3>';
echo '<a href="insertcustomer.php">เพิ่มลูกค้า</a>';
echo '<table width="500" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">รหัสลูกค้า</th>';
echo '<th width="100">ชื่อลูกค้า</th>';
echo '<th width="100">ที่อยู่</th>';
echo '<th width="100">เบอร์โทร</th>';
echo '<th width="80">ประเภท</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr align="center">';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['customer_id'].'</td>';
    echo '<td>'.$row_data['customer_name'].'</td>';
    echo '<td>'.$row_data['customer_address'].'</td>';
    echo '<td>'.$row_data['customer_phone'].'</td>';
    echo '<td>'.$row_data['customer_type'].'</td>';
    echo '<td><a href="edit_customer.php?customer_id='.$row_data['customer_id'].'">แก้ไข</a></td>';
    echo '<td><a href="customerdelete.php?customer_id='.$row_data['customer_id'].'" onclick="return confirm(\'ยืนยันการลบข้อมูลวัว\')">ลบ</a></td>';
    echo '</tr>';
    $row++;
}

echo '</table>';
mysqli_close($conn);
echo '<br><br><a href="menu1.php">Back to menu</a>';
echo '</center>';

?>
</body>
</html>