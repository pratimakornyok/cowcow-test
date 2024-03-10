<!DOCTYPE html>
<html>
<head>
    <title>cow</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
        
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            font-family: "Mali", cursive;
            font-weight: 700;
            font-style: normal;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #d85f1b; /* Updated color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #d85f1b; /* Updated color */
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #a73e06; /* Darker shade for hover */
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

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<center>';
echo '<br><h3>พนักงาน</h3>';
echo '<a class="btn" href="insertemployee.php">เพิ่มพนักงาน</a>';
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
echo '<br><br><a href="home.php">Back to menu</a>';
echo '</center>';

?>
</body>
</html>
