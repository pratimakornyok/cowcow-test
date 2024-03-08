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

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>พนักงาน</h3>';
echo '<a href="insertemployee.php">เพิ่มพนักงาน</a>';
echo '<table width="500" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">รหัสพนักงาน</th>';
echo '<th width="100">ชื่อพนักงาน</th>';
echo '<th width="100">ที่อยู่</th>';
echo '<th width="100">เบอร์โทร</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr align="center">';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['employee_id'].'</td>';
    echo '<td>'.$row_data['employee_name'].'</td>';
    echo '<td>'.$row_data['employee_address'].'</td>';
    echo '<td>'.$row_data['employee_phone'].'</td>';
    echo '<td><a href="updateemployee.php?employee_id='.$row_data['employee_id'].'">แก้ไข</a></td>';
    echo '<td><a href="employeedelete.php?employee_id='.$row_data['employee_id'].'" onclick="return confirm(\'ยืนยันการลบข้อมูลวัว\')">ลบ</a></td>';
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