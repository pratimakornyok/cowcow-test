<html>
<head>
    <title>cow</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
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
echo '<a href="insertcow.php">เพิ่มรายการวัว</a>';
echo '<table width="500" border="1">';
echo '<tr>';
echo '<th width="50">ลำดับ</th>';
echo '<th width="100">เลขล็อต</th>';
echo '<th width="100">ปริมาณนม</th>';
echo '<th width="100">เกรด</th>';
echo '<th width="100">ราคาสมาชิก</th>';
echo '<th width="100">ราคาทั่วไป</th>';
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
    echo '<td>'.$row_data['Price_mem'].'</td>';
    echo '<td><a href="updatecow.php?lot_num='.$row_data['lot_num'].'">แก้ไข</a></td>';
    echo '<td><a href="cowdelete.php?lot_num='.$row_data['lot_num'].'" onclick="return confirm(\'ยืนยันการลบข้อมูลวัว\')">ลบ</a></td>';
    echo '</tr>';
    $row++;
}

echo '</table>';
mysqli_close($conn);
echo '<br><br><a href="home.php">Back to home</a>';
echo '</center>';

?>
</body>
</html>