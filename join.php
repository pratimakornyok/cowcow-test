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

$sql = "SELECT bill.bill_id, bill.customer_id, bill.employee_id, bill.lot_num, cow.Quality, cow.Price, cow.Price_mem, cow.AmountOfMilk FROM bill JOIN cow ON bill.lot_num = cow.lot_num;";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>ข้อมูลบิลและรายการวัว</h3>';
echo '<table width="800" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">รหัสรายการ</th>';
echo '<th width="80">รหัสลูกค้า</th>';
echo '<th width="100">รหัสพนักงานขาย</th>';
echo '<th width="100">เลขล็อต</th>';
echo '<th width="100">เกรด</th>';
echo '<th width="100">ราคาทั่วไป</th>';
echo '<th width="100">ราคาสมาชิก</th>';
echo '<th width="100">ปริมาณนม</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr align="center">';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['bill_id'].'</td>';
    echo '<td>'.$row_data['customer_id'].'</td>';
    echo '<td>'.$row_data['employee_id'].'</td>';
    echo '<td>'.$row_data['lot_num'].'</td>';
    echo '<td>'.$row_data['Quality'].'</td>';
    echo '<td>'.$row_data['Price'].'</td>';
    echo '<td>'.$row_data['Price_mem'].'</td>';
    echo '<td>'.$row_data['AmountOfMilk'].'</td>';
    echo '</tr>';
    $row++;
}

echo '</table>';
mysqli_close($conn);
echo '<br><br><a href="menu1.php">Back to menu</a>';
echo '</center>';
?>
