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

$sql = "SELECT * FROM bill";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>รายการขาย</h3>';
echo '<a href="insertbill.php">เพิ่มรายการขาย</a>';
echo '<table width="500" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">รหัสรายการขาย</th>';
echo '<th width="100">รหัสลูกค้า</th>';
echo '<th width="100">รหัสพนักงาน</th>';
echo '<th width="100">เลขล็อต</th>';
echo '<th width="80">แก้ไข</th>';
echo '<th width="80">ลบ</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr align="center">';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['bill_id'].'</td>';
    echo '<td>'.$row_data['customer_id'].'</td>';
    echo '<td>'.$row_data['employee_id'].'</td>';
    echo '<td>'.$row_data['lot_num'].'</td>';
    echo '<td><a href="updatebill.php?bill_id='.$row_data['bill_id'].'">แก้ไข</a></td>';
    echo '<td><a href="billelete.php?bill_id='.$row_data['bill_id'].'" onclick="return confirm(\'ยืนยันการลบ\')">ลบ</a></td>';
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