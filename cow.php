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

$sql = "SELECT * FROM cow";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>รายการวัว</h3>';
echo '<a href="../project/insertcow.php">เพิ่มรายการวัว</a>';
echo '<table width="500" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">เลขล็อต</th>';
echo '<th width="100">ปริมาณนม</th>';
echo '<th width="100">เกรด</th>';
echo '<th width="100">ราคา</th>';
echo '<th width="80">แก้ไข</th>';
echo '<th width="80">ลบ</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr align="center">';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['lot_num'].'</td>';
    echo '<td>'.$row_data['AmountOfMilk'].'</td>';
    echo '<td>'.$row_data['Quality'].'</td>';
    echo '<td>'.$row_data['Price'].'</td>';
    echo '<td><a href="edit_cow.php?cow_id='.$row_data['lot_num'].'">แก้ไข</a></td>';
    echo '<td><a href="delete_cow.php?cow_id='.$row_data['lot_num'].'" onclick="return confirm(\'ยืนยันการลบข้อมูลวัว\')">ลบ</a></td>';
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
